<?php

namespace App\Http\Controllers;

use App\Models\MsFriend;
use App\Models\MsMessage;
use App\Models\MsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MsMessageController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $friends = MsFriend::where(function ($query) use ($userId) {
            $query->where('UserID', $userId)
                  ->orWhere('FriendID', $userId);
        })->where('Status', 'accepted')->get();

        $friendRequests = MsFriend::where('FriendID', $userId)
                                  ->where('Status', 'pending')
                                  ->get();

        $sentFriendRequests = MsFriend::where('UserID', $userId)->where('Status', 'pending')->get();

        return view('chat', compact('friends', 'friendRequests', 'sentFriendRequests'));
    }

    public function sendMessage(Request $request)
    {
        $message = MsMessage::create([
            'ReceiverID' => $request->input('receiver_id'),
            'SenderID' => Auth::id(),
            'message' => $request->input('message'),
            'Status' => 'unread',
        ]);

        return redirect()->back();
    }

    public function fetchMessages($friendId)
    {
        $userId = Auth::id();

        try {
            $messages = MsMessage::with('sender')->where(function ($query) use ($userId, $friendId) {
                $query->where('SenderID', $userId)
                      ->where('ReceiverID', $friendId);
            })->orWhere(function ($query) use ($userId, $friendId) {
                $query->where('SenderID', $friendId)
                      ->where('ReceiverID', $userId);
            })->get();

            return response()->json($messages);
        } catch (\Exception $e) {
            Log::error('Error fetching messages: '.$e->getMessage());
            return response()->json(['error' => 'Error fetching messages'], 500);
        }
    }

    public function addFriend(Request $request)
    {
        $friendId = $request->input('friend_id');
        $userId = Auth::id();

        $friend = MsUser::find($friendId);
        if (!$friend) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $existingFriend = MsFriend::where(function ($query) use ($userId, $friendId) {
            $query->where('UserID', $userId)->where('FriendID', $friendId)
                  ->orWhere('UserID', $friendId)->where('FriendID', $userId);
        })->first();

        if ($existingFriend) {
            if ($existingFriend->Status == 'pending') {
                return redirect()->back()->with('error', 'Friend request is already pending.');
            } else {
                return redirect()->back()->with('error', 'You are already friends.');
            }
        }

        MsFriend::create([
            'UserID' => $userId,
            'FriendID' => $friendId,
            'Status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Friend request sent successfully.');
    }

    public function acceptFriend(Request $request, $friendListId)
    {
        $friendRequest = MsFriend::find($friendListId);
        if ($friendRequest && $friendRequest->FriendID == Auth::id() && $friendRequest->Status == 'pending') {
            $friendRequest->update(['Status' => 'accepted']);
            return redirect()->back()->with('success', 'Friend request accepted.');
        }
        return redirect()->back()->with('error', 'Invalid friend request.');
    }
}
