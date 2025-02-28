<div>
    <form action="{{ route('friend.request', $user->id) }}" method="POST">
        @csrf
        <button type="submit" 
                class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                hx-post="{{ route('friend.request', $user->id) }}"
                hx-target="closest div"
                hx-swap="outerHTML">
            @if($user->hasPendingFriendRequestFrom(auth()->user()))
                Cancel Request
            @elseif($user->hasPendingFriendRequestTo(auth()->user()))
                Accept Request
            @elseif($user->isFriendWith(auth()->user()))
                Remove Friend
            @else
                Add Friend
            @endif
        </button>
    </form>
</div> 