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
        <div class="col-span-2">
            <!-- إنشاء منشور -->
            <div class="bg-white rounded-lg shadow p-4 mb-4">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/40" alt="صورة الملف الشخصي" class="w-10 h-10 rounded-full">
                    <input type="text" placeholder="What's on your mind?" class="bg-gray-100 rounded-full py-2 px-4 w-full">
                </div>
                <div class="border-t mt-4 pt-4">
                    <div class="flex justify-between">
                        <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Photo/Video</span>
                        </button>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Post</button>
                    </div>
                </div>
            </div>

            <!-- المنشورات -->
            <div class="space-y-4">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/40" alt="صورة الملف الشخصي" class="w-10 h-10 rounded-full">
                            <div>
                                <h3 class="font-semibold">Username</h3>
                                <p class="text-gray-500 text-sm">2 hours ago</p>
                            </div>
                        </div>
                        <p class="mt-4">This is an example post on the social media platform.</p>
                        <img src="https://via.placeholder.com/600x400" alt="صورة المنشور" class="mt-4 rounded-lg w-full">

                        <div class="flex items-center justify-between mt-4 pt-4 border-t">
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                <span>Like</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span>Comment</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
