<?php

namespace App\Http\Controllers;

use App\Models\MsCart;
use App\Models\MsPicture;
use App\Models\MsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = MsProduct::with(['pictures', 'user'])->latest()->paginate(5);
        // $product = MsProduct::with(['pictures', 'user'])->where('ProductID', 4)->first();
        // dd($product->pictures->count());
        return view('shop.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'ProductName' => 'required|string|max:255',
            'ProductDescription' => 'required|string',
            'ProductPrice' => 'required',
            'Quantity' => 'required',
            'ProductImages.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = MsProduct::create([
            'UserID' => Auth::id(),
            'ProductName' => $request->ProductName,
            'ProductDescription' => $request->ProductDescription,
            'ProductPrice' => $request->ProductPrice,
            'Quantity' => $request->Quantity
        ]);

        if ($request->hasFile('ProductImages')) {
            foreach ($request->file('ProductImages') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('product_images', 'public');
                    MsPicture::create([
                        'ProductID' => $product->ProductID,
                        'PictureData' => $path,
                    ]);
                } else {
                    MsPicture::create([
                        'ProductID' => $product->ProductID,
                        'PictureData' => 'Unsuccessful',
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MsProduct $msProduct)
    {
        $msProduct->load('pictures', 'user');
        return view('shop.show', ['product' => $msProduct]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = MsProduct::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = MsProduct::findOrFail($id);

        $product->ProductName = $request->ProductName;
        $product->ProductDescription = $request->ProductDescription;
        $product->ProductPrice = $request->ProductPrice;
        $product->Quantity = $request->Quantity;

        if ($request->hasFile('ProductImages')) {
            foreach ($request->file('ProductImages') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('product_images', 'public');
                    MsPicture::create([
                        'ProductID' => $product->ProductID,
                        'PictureData' => $path,
                    ]);
                } else {
                    MsPicture::create([
                        'ProductID' => $product->ProductID,
                        'PictureData' => 'Unsuccessful',
                    ]);
                }
            }
        }
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsProduct $msProduct)
    {
        $msProduct->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function updateQuantities (array $cartItems) {
        foreach ($cartItems as $item) {
            // Find the cart item by its CartID
            $cart = MsCart::with('product')->find($item['CartID']);
            // Check if the cart item exists and has a related product
            if ($cart && $cart->product) {
                // Subtract the cart quantity from the product quantity
                $cart->product->Quantity -= $item['Quantity'];
                // Save the updated product
                $cart->product->save();
            }
        }
    }
}
