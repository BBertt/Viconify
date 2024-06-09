<?php

namespace App\Http\Controllers;

use App\Models\MsCart;
use App\Models\MsProduct;
use Illuminate\Http\Request;

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
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('post_images', 'public');
                    MsPicture::create([
                        'PostID' => $post->PostID,
                        'PictureData' => 'storage/' . $path,
                    ]);
                } else {
                    MsPicture::create([
                        'PostID' => $post->PostID,
                        'PictureData' => 'Unsuccessful',
                    ]);
                }
            }
        }
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
    public function edit(MsProduct $msProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MsProduct $msProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsProduct $msProduct)
    {
        //
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
