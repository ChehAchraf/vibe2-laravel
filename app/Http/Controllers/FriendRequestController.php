<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function store(User $user)
    {
        $sender = auth()->user();
        
        // Check if a request already exists
        $existingRequest = FriendRequest::where(function($query) use ($user, $sender) {
            $query->where('sender_id', $sender->id)
                  ->where('receiver_id', $user->id);
        })->orWhere(function($query) use ($user, $sender) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', $sender->id);
        })->first();

        if ($existingRequest) {
            // If the logged-in user is the receiver of a pending request
            if ($existingRequest->receiver_id === $sender->id && $existingRequest->status === 'pending') {
                $existingRequest->update(['status' => 'accepted']);
                return view('components.friend-button', ['user' => $user]);
            }
            // If it's an existing friendship or a request to be cancelled
            $existingRequest->delete();
            return view('components.friend-button', ['user' => $user]);
        }

        // Create new friend request
        FriendRequest::create([
            'sender_id' => $sender->id,
            'receiver_id' => $user->id,
            'status' => 'pending'
        ]);

        return view('components.friend-button', ['user' => $user]);
    }

    public function index()
    {
        $user = auth()->user();
        $friendRequests = FriendRequest::where('receiver_id', $user->id)
                                        ->where('status', 'pending')
                                        ->with('sender')
                                        ->get();

        return view('vibe.users.friend-requests', compact('friendRequests'));
    }

    public function decline($id)
    {
        $friendRequest = FriendRequest::findOrFail($id);
        $friendRequest->delete();

        return redirect()->back()->with('success', 'Friend request declined.');
    }

    public function accept($id)
    {
        $friendRequest = FriendRequest::findOrFail($id);
        
        // Update the status to accepted
        $friendRequest->update(['status' => 'accepted']);

        return redirect()->route('friend.requests')->with('success', 'Friend request accepted.');
    }
} 