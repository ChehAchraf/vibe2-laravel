@foreach($posts as $post)
    <div class="space-y-4">
        <div class="bg-white rounded-lg shadow mb-4">
            <div class="p-4">
                <div class="flex items-center space-x-4">
                    <img src="{{asset('Storage/' . $post->user->profile_photo )}}" alt="صورة الملف الشخصي" class="w-10 h-10 rounded-full">
                    <div>
                        <h3 class="font-semibold">{{$post->user->name}}</h3>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="mt-4">{{$post->content}}</p>
                @if($post->image)
                    <img src="{{asset('storage/' . $post->image)}}" alt="صورة المنشور" class="mt-4 rounded-lg w-full">
                @endif

                <div class="flex items-center justify-between mt-4 text-gray-500 text-sm">
                    <div class="flex items-center">
                        <span class="flex items-center">
                            <span class="bg-blue-500 p-1 rounded-full">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                </svg>
                            </span>
                            <span class="ml-2">{{ $post->likes()->count() }} Likes</span>
                        </span>
                    </div>
                    <div>
                        <span>24 Comments · 4 Shares</span>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4 pt-4 border-t">
                    @include('components.like-button', ['post' => $post, 'likes_count' => $post->likes()->count()])
                    <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded flex-1 justify-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Comment</span>
                    </button>
                    <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded flex-1 justify-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                        <span>Share</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
