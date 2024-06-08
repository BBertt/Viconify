<?php

namespace App\Http\Controllers;

use App\Models\MsVideo;
use App\Models\MsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4800',
        ]);

        // dd('Video file:', [
        //     'original_name' => $request->file('video_file')->getClientOriginalName(),
        //     'mime_type' => $request->file('video_file')->getMimeType(),
        //     'size' => $request->file('video_file')->getSize(),
        //     'error' => $request->file('video_file')->getError(),
        // ]);

        $path = null;
        if ($request->hasFile('video_file')) {
            $uploadedFile = $request->file('video_file');
            if ($uploadedFile && $uploadedFile->isValid()) {
                $path = $uploadedFile->store('videos', 'public');
            }
        }
        $videoPath = $path ? 'storage/' . $path : 'Unsuccessfull';
        $path = null;
        if ($request->hasFile('video_image')) {
            $uploadedFile = $request->file('video_image');
            if ($uploadedFile && $uploadedFile->isValid()) {
                $path = $uploadedFile->store('videos', 'public');
            }
        }
        $imagePath = $path ? 'storage/' . $path : 'Unsuccessfull';
        MsVideo::create([
            'UserID' => Auth::id(),
            'VideoImage' => $imagePath,
            'VideoLinkEmbedded' => $videoPath,
            'Title' => $request->title,
            'Description' => $request->description,
            'PostTime' => now(),
            'VideoType' => 'Videos',
        ]);
        return redirect()->back()->with('success', 'Video added successfully');
    }

    public function storeshort(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4800',
        ]);

        // dd('Video file:', [
        //     'original_name' => $request->file('video_file')->getClientOriginalName(),
        //     'mime_type' => $request->file('video_file')->getMimeType(),
        //     'size' => $request->file('video_file')->getSize(),
        //     'error' => $request->file('video_file')->getError(),
        // ]);

        $path = null;
        if ($request->hasFile('video_file')) {
            $uploadedFile = $request->file('video_file');
            if ($uploadedFile && $uploadedFile->isValid()) {
                $path = $uploadedFile->store('videos', 'public');
            }
        }
        $videoPath = $path ? 'storage/' . $path : 'Unsuccessfull';
        $path = null;
        if ($request->hasFile('video_image')) {
            $uploadedFile = $request->file('video_image');
            if ($uploadedFile && $uploadedFile->isValid()) {
                $path = $uploadedFile->store('videos', 'public');
            }
        }
        $imagePath = $path ? 'storage/' . $path : 'Unsuccessfull';
        MsVideo::create([
            'UserID' => Auth::id(),
            'VideoImage' => $imagePath,
            'VideoLinkEmbedded' => $videoPath,
            'Title' => $request->title,
            'Description' => $request->description,
            'PostTime' => now(),
            'VideoType' => 'Shorts',
        ]);
        return redirect()->back()->with('success', 'Video added successfully');
    }

    public function destroy($id)
    {
        $video = MsVideo::findOrFail($id);
        $video->delete();

        return redirect()->back()->with('success', 'Video deleted successfully.');
    }

    // Show the edit form for a video
    public function edit($id)
    {
        $video = MsVideo::findOrFail($id);
        return response()->json($video);
    }

    // Update a video
    public function update(Request $request, $id)
    {

        $video = MsVideo::findOrFail($id);
        $video->Title = $request->input('title');
        $video->Description = $request->input('description');
        if ($request->hasFile('video_image')) {
            $path = $request->file('video_image')->store('public/videos');
            $video->VideoImage = str_replace('public/', 'storage/', $path);
        }
        $video->save();

        return redirect()->back()->with('success', 'Video updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show(int $VideoID)
    {
        $video = MsVideo::findOrFail($VideoID);
        $video->increment('Views');
        $user = $video->user;

        $userProducts = $user ? $user->products : collect();
        $remainingProducts = $userProducts->count() < 5 ? MsProduct::where('UserID', '!=', $user->id)->take(5 - $userProducts->count())->get() : collect();

        $mergedProducts = $userProducts->merge($remainingProducts)->take(5);

        return view('video', [
            'video' => $video,
            'videos' => MsVideo::all(),
            'products' => MsProduct::all(),
            'mergedProducts' => $mergedProducts
        ]);
    }


    public function showShorts()
    {
        // Fetch only videos with VideoType 'shorts'
        $videos = MsVideo::where('VideoType', 'Shorts')->get();
        $videoId = null;
        return view('short', compact('videos', 'videoId'));
    }
    public function showShortsById(int $id)
    {
        $videos = MsVideo::all();
        $videoId = MsVideo::findOrFail($id);
        return view('short', compact('videos', 'videoId'));
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
}
