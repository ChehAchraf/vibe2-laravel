@extends('layouts.app')
<div class="container mx-auto pt-20 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- القائمة الجانبية -->
        <div class="hidden md:block" style="max-width: 220px">
            <div class="bg-white rounded-lg shadow p-4">
                <ul class="space-y-2">
                    <li class="hover:bg-gray-100 p-2 rounded-lg cursor-pointer">Home</li>
                    <li class="hover:bg-gray-100 p-2 rounded-lg cursor-pointer">Profile</li>
                    <li class="hover:bg-gray-100 p-2 rounded-lg cursor-pointer">Messages</li>
                    <li class="hover:bg-gray-100 p-2 rounded-lg cursor-pointer">Groups</li>
                    <li class="hover:bg-gray-100 p-2 rounded-lg cursor-pointer">Settings</li>
                </ul>
            </div>
        </div>

        <!-- تدفق المنشورات -->
        <div class="col-span-2 ">
            @if(session('success'))
                <div class="p-2 bg-green-600 text-white rounded-l mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <!-- إنشاء منشور -->
            <div class="bg-white rounded-lg shadow p-4 mb-4">
                <form id="postForm" action="{{route('post.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <img src="{{asset('Storage/' . $user->profile_photo)}}" alt="صورة الملف الشخصي" class="w-10 h-10 rounded-full">
                        <input name="content" type="text" placeholder="What's on your mind?" class="bg-gray-100 rounded-full py-2 px-4 w-full">
                    </div>
                    <div id="imagePreview" class="mt-4 hidden">
                        <img id="selectedImage" src="" alt="Preview" class="max-w-full h-auto rounded-lg">
                        <button type="button" onclick="removeImage()" class="mt-2 text-red-500 hover:text-red-700">
                            Remove Image
                        </button>
                    </div>
                    <div class="border-t mt-4 pt-4">
                        <div class="flex justify-between">
                            <label class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded cursor-pointer">
                                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" onchange="previewImage(event)">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Photo/Video</span>
                            </label>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Post</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                function previewImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('selectedImage').src = e.target.result;
                            document.getElementById('imagePreview').classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    }
                }

                function removeImage() {
                    document.getElementById('imageInput').value = '';
                    document.getElementById('imagePreview').classList.add('hidden');
                }
            </script>
            <!-- المنشورات -->
                <div id="posts-container">
                    @include('partials.posts', ['posts' => $posts])
                </div>
                <div class="text-center mt-4 mb-4 ">
                    <button
                        class="bg-blue-500 text-white py-2 px-4 rounded"
                        hx-get="{{ route('posts.loadMore', ['offset' => count($posts)]) }}"
                        hx-target="#posts-container"
                        hx-swap="beforeend"
                        hx-trigger="click"
                        id="load-more-btn"
                    >
                        load more 😁
                    </button>
                </div>
                </body>
                </html>
        </div>
    </div>
</div>
