<div class="comment-section p-4 border-t">
    <!-- Comment Input -->
    <div class="flex items-start space-x-2 mb-4">
        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" class="w-8 h-8 rounded-full">
        <div class="flex-1">
            <form class="flex items-center" 
                  hx-post="{{ route('comments.store', $post->id) }}"
                  hx-target="#comments-container-{{ $post->id }}"
                  hx-swap="beforeend">
                <input type="text" 
                       name="content" 
                       class="flex-1 bg-gray-100 rounded-full px-4 py-2"
                       placeholder="Write a comment...">
                <button type="submit" 
                        class="ml-2 text-blue-500 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Comments List -->
    <div id="comments-container-{{ $post->id }}" class="space-y-4">
        @foreach($post->comments()->latest()->get() as $comment)
            <div class="flex items-start space-x-2">
                <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" class="w-8 h-8 rounded-full">
                <div class="flex-1 bg-gray-100 rounded-lg p-2">
                    <div class="font-semibold text-sm">{{ $comment->user->name }}</div>
                    <div class="text-sm">{{ $comment->content }}</div>
                    <div class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div> 