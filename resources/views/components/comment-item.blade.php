<div class="flex items-start space-x-2">
    <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" class="w-8 h-8 rounded-full">
    <div class="flex-1 bg-gray-100 rounded-lg p-2">
        <div class="font-semibold text-sm">{{ $comment->user->name }}</div>
        <div class="text-sm">{{ $comment->content }}</div>
        <div class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</div>
    </div>
</div> 