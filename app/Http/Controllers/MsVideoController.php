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
            'videos' => MsVideo::all()
        ]);
    }

    public function showShorts()
    {
        // Fetch only videos with VideoType 'shorts'
        $videos = MsVideo::where('VideoType', 'shorts')->get();
        // dd($videos);
        return view('short', compact('videos'));
    }
    public function like(MsVideo $video)
    {
        $video->increment('Like');
        return response()->json(['success' => true]);
    }

    public function dislike(MsVideo $video)
    {
        $video->increment('Dislike');
        return response()->json(['success' => true]);
    }

    public function share(MsVideo $video)
    {
        // Implement the share logic, e.g., generating a shareable link
        return response()->json(['success' => true]);
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
