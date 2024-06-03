<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $cartItems = $request->input('products', []);

        // Check if there are no cart items
        if (empty($cartItems)) {
            return redirect()->back()->withErrors(['error' => 'There are no items in your cart.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionHeader $transactionHeader)
    {
        //
    }
}
