<?php

namespace App\Http\Controllers;

use App\Models\MsProduct;
use Illuminate\Http\Request;

class MsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = MsProduct::with(['pictures', 'user'])->latest()->paginate(2);
        // $product = MsProduct::with(['pictures', 'user'])->where('ProductID', 4)->first();
        // dd($product->pictures->count());
        return view('shop', ['products' => $products]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MsProduct $msProduct)
    {
        //
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
}
