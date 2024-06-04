<?php

namespace App\Http\Controllers;

use App\Models\MsVideo;
use App\Models\MsProduct;
use Illuminate\Http\Request;

class MsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videos', [
            'videos' => MsVideo::all()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $VideoID)
    {
        return view('video', [
            'video' => MsVideo::findOrFail($VideoID),
            'videos' => MsVideo::all(),
            'products' => MsProduct::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsVideo $msVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MsVideo $msVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsVideo $msVideo)
    {
        //
    }
}
