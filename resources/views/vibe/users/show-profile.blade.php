@extends('layouts.app')

<!-- Profile Header -->
<div class="relative">
    <!-- Cover Photo -->
    <div class="h-96 w-full overflow-hidden">
        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Cover Photo" class="w-full object-cover h-full">
        <button class="absolute bottom-5 right-5 bg-white px-4 py-2 rounded-lg shadow hover:bg-gray-50">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Edit Cover Photo
                </span>
        </button>
    </div>

    <!-- Profile Info -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="-mt-24 sm:-mt-32 sm:flex sm:items-end sm:space-x-5">
            <div class="relative group">
                <img class="h-48 w-48 rounded-full ring-4 ring-white object-cover" src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Picture">
                <button class="absolute bottom-2 right-2 bg-gray-800 p-2 rounded-full text-white opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </button>
            </div>
            <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="sm:hidden md:block mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">{{$user->name}}</h1>
                    <p class="text-gray-500">1.2K Friends</p>
                </div>
                <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <a href="{{route('show.edit.form')}}" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Navigation -->
<div class="bg-white shadow">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex space-x-8 py-4">
            <button class="text-gray-900 border-b-2 border-blue-500 px-3 py-2 text-sm font-medium">Posts</button>
            <button class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">About</button>
            <button class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Friends</button>
            <button class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Photos</button>
            <button class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Videos</button>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-4">Bio</h2>
                    <p>
                        {{$user->bio}}
                    </p>
                </div>
            </div>
            <!-- Intro Card -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-4">Intro</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Works at Tech Company</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>Studied at University</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Lives in New York</span>
                        </div>
                    </div>
                    <button class="w-full mt-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded">
                        Edit Details
                    </button>
                </div>
            </div>

            <!-- Photos Card -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Photos</h2>
                        <a href="#" class="text-blue-600 hover:text-blue-800">See All Photos</a>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                        <img src="https://via.placeholder.com/150" class="rounded-lg hover:opacity-75 transition-opacity cursor-pointer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="lg:col-span-2">
            <!-- Create Post -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="p-4">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-10 h-10 rounded-full">
                        <input type="text" placeholder="What's on your mind?" class="bg-gray-100 rounded-full py-2 px-4 w-full">
                    </div>
                    <div class="border-t mt-4 pt-4">
                        <div class="flex justify-between">
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span>Live Video</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Photo/Video</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Feeling/Activity</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts -->
            <div class="space-y-6">
                <!-- Sample Post -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-10 h-10 rounded-full">
                            <div>
                                <h3 class="font-semibold">John Doe</h3>
                                <p class="text-gray-500 text-sm">2 hours ago · <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg></p>
                            </div>
                        </div>
                        <p class="mt-4">Just another beautiful day! 🌞</p>
                        <img src="https://via.placeholder.com/600x400" class="mt-4 rounded-lg w-full">

                        <!-- Interaction Stats -->
                        <div class="flex items-center justify-between mt-4 text-gray-500 text-sm">
                            <div class="flex items-center">
                                    <span class="flex items-center">
                                        <span class="bg-blue-500 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                            </svg>
                                        </span>
                                        <span class="ml-2">142 Likes</span>
                                    </span>
                            </div>
                            <div>
                                <span>24 Comments · 4 Shares</span>
                            </div>
                        </div>

                        <!-- Interaction Buttons -->
                        <div class="flex items-center justify-between mt-4 pt-4 border-t">
                            <button class="flex items-center space-x-2 hover:bg-gray-100 p-2 rounded flex-1 justify-center">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                                <span>Like</span>
                            </button>
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
        </div>
    </div>
</div>
