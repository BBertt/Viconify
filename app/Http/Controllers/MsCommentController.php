<?php

namespace App\Http\Controllers;

use App\Models\MsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsCommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        try {
            $request->validate([
                'comment' => 'required|string|max:255',
            ]);

            MsComment::create([
                'PostID' => $postId,
                'UserID' => Auth::id(),
                'Comments' => $request->comment,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
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
     * Display the specified resource.
     */
    public function show(MsComment $msComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsComment $msComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MsComment $msComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsComment $msComment)
    {
        //
    }
}
