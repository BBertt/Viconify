<?php

namespace App\Http\Controllers;

use App\Models\MsVideo;
use Illuminate\Http\Request;

class MsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = MsVideo::where('VideoType', 'shorts')->get();
        return view('shorts', compact('videos'));
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
    public function show(MsVideo $msVideo)
    {
        
    }

    public function like($id)
    {
        // Increment the like count
        $video = MsVideo::findOrFail($id);
        $video->increment('Like');
        return back();
    }
    public function dislike($id)
    {
        // Increment the dislike count
        $video = MsVideo::findOrFail($id);
        $video->increment('Dislike');
        return back();
    }

    public function firstShort()
    {
        // Get the first video of type 'shorts'
        $video = MsVideo::where('VideoType', 'shorts')->first();

        if (!$video) {
            // Handle the case where there are no short videos
            return view('shorts')->with('message', 'No short videos available.');
        }

        $video->increment('Views');
        return view('shorts', compact('video'));
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
