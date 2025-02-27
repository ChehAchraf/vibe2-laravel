<div class="flex items-center space-x-2">
    <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded flex-1 justify-center"
            hx-post="{{ route('like.toggle', $post->id) }}"
            hx-trigger="click"
            hx-target="closest div">
        <svg class="w-6 h-6 {{ $post->isLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}" 
             fill="{{ $post->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" 
             stroke="currentColor" 
             viewBox="0 0 24 24">
            <path stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
        </svg>
        <span>{{ $likes_count }} {{ Str::plural('Like', $likes_count) }}</span>
    </button>
</div> 