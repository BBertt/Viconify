<?php

namespace App\Http\Controllers;

use App\Models\MsCart;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
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
    public function store(Request $request, $transactionId)
    {
        $cartItems = $request->input('products', []);

        foreach ($cartItems as $item) {
            $cart = MsCart::with('product')->find($item['CartID']);
            // Create a transaction detail record for each cart item
            TransactionDetail::create([
                'TransactionID' => $transactionId,
                'ProductID' => $cart->product->ProductID,
                'Quantity' => $item['Quantity'],
                'Price' => $cart->product->ProductPrice,
                'TransactionStatus' => 'Pending'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        //
    }

    public function updateStatus($transactionID, $productID) 
    {
        // Find the transaction detail
        $detail = TransactionDetail::where('TransactionID', $transactionID)->where('ProductID', $productID)->first();

            
            // Update the status
            $detail->TransactionStatus = "Success";
            // dd($detail);
            $detail->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Transaction status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        //
    }
}
