<?php

namespace App\Http\Controllers;

use App\Models\MsPicture;
use App\Models\MsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsPostController extends Controller
{
    public function index()
    {
        $posts = MsPost::with(['user', 'pictures'])->get();
        return view('post', compact('posts'));
    }

    public function show($id)
    {
        $post = MsPost::with(['user', 'pictures', 'comments.user'])->findOrFail($id);
        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = MsPost::create([
            'UserID' => Auth::id(),
            'Title' => $request->title,
            'Description' => $request->description,
            'PostTime' => now(),
        ]);

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

        return redirect()->back()->with('success', 'Post added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsPost $msPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $post = MsPost::findOrFail($id);
        $post->Title = $request->title;
        $post->Description = $request->description;
        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = MsPost::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
