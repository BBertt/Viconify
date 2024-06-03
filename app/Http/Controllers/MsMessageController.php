<?php

namespace App\Http\Controllers;

use App\Models\MsFriend;
use App\Models\MsMessage;
use App\Models\MsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsMessageController extends Controller
{
    public function index()
    {
        $friends = MsFriend::where('UserID', Auth::id())->get();
        return view('chat', compact('friends'));
    }

    public function fetchMessages(Request $request)
    {
        $friendListId = $request->input('friend_list_id');
        $messages = MsMessage::where('FriendListID', $friendListId)
                    ->with('sender')
                    ->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = MsMessage::create([
            'FriendListID' => $request->input('friend_list_id'),
            'SenderID' => Auth::id(),
            'Message' => $request->input('message'),
            'Status' => 'sent',
        ]);

        return response()->json($message);
    }

    public function addFriend(Request $request)
    {
        $friendId = $request->input('friend_id');
        $userId = Auth::id();

        // Check if the user exists
        $friend = MsUser::find($friendId);
        if (!$friend) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Check if they are already friends
        $existingFriend = MsFriend::where('UserID', $userId)
            ->where('FriendID', $friendId)
            ->first();

        if ($existingFriend) {
            return redirect()->back()->with('error', 'You are already friends.');
        }

        // Add the friend
        MsFriend::create([
            'UserID' => $userId,
            'FriendID' => $friendId,
            'Status' => 'accepted'
        ]);

        return redirect()->back()->with('success', 'Friend added successfully.');
    }
}
