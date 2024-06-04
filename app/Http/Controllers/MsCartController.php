<?php

namespace App\Http\Controllers;

use App\Models\MsCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = MsCart::with('product')->where('UserID', auth()->id())->get();

        return view('cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $ProductID)
    {
        // Create cart for that User
        MsCart::create([
            'UserID' => auth()->id(),
            'ProductID' => $ProductID,
            'Quantity' => $request->quantity
        ]);

        // Redirect to User's Cart
        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MsCart $msCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsCart $msCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MsCart $msCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsCart $cart)
    {
        $cart->delete();
        return back()->with('delete', 'your post was deleted');
    }

    public function deleteAll(array $cartIds) {
        foreach ($cartIds as $cartId) {
            $cart = MsCart::where('CartID', $cartId)->first();
            $cart->delete();
        }
    }
}
