@extends('layouts.app')


<div class="container mx-auto pt-20 px-4">
    <h2 class="text-2xl font-bold mb-4">Friend Requests</h2>
    <div class="bg-white rounded-lg shadow p-4">
        @if($friendRequests->isEmpty())
            <p>No friend requests at the moment.</p>
        @else
            @foreach($friendRequests as $request)
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $request->sender->profile_photo) }}" class="w-10 h-10 rounded-full mr-2">
                        <span class="font-semibold">{{ $request->sender->name }}</span>
                    </div>
                    <div>
                        <form action="{{ route('friend.request.accept', $request->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:text-blue-600">Accept</button>
                        </form>
                        <form action="{{ route('friend.request.decline', $request->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-600">Decline</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
