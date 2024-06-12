<?php

namespace App\Http\Controllers;

use App\Models\MsCart;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $transactionHeader = TransactionHeader::with('transactionDetails')->where('UserID', Auth::id())->get();

        return view('transaction', compact('transactionHeader'));
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

        $total = 0;
        foreach ($cartItems as $item) {
            $cart = MsCart::with('product')->find($item['CartID']);
            $subTotal = $item['Quantity'] * $cart->product->ProductPrice;
            $total += $subTotal;
        }

        if (Auth::user()->Balance == 0 || $total > Auth::user()->Balance) {
            return redirect()->back()->withErrors(['error' => 'You Currently Do not have enough balance.']);
        }

        $transactionHeader = TransactionHeader::create([
            'UserID' => auth()->id(),
            'TransactionDate' => Carbon::now(),
            'PaymentMethod' => 'Balance'
        ]);
        $transactionId = $transactionHeader->TransactionID;

        // Methods for retreiving specific attributes from an array of items.

        $cartIds = array_map(function($item) {
            return $item['CartID'];
        }, $cartItems);

            // $cartId = array_column($cartItems, 'CartID');

        // Call the update quantity function in ProductController
        $productController = new MsProductController();
        $productController->updateQuantities($cartItems);

        // Call the create function in TransactionDetailController
        $transactionDetailController = new TransactionDetailController();
        $transactionDetailController->store($request, $transactionId);

        // Call the delete function in MsCartController
        $cartController = new MsCartController();
        $cartController->deleteAll($cartIds);

        // Call the update Balance in MsUserController
        $userController = new MsUserController();
        $userController->updateBalance($total);


        // Additional logic for storing transaction header can go here
        return redirect()->route('transaction');

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
