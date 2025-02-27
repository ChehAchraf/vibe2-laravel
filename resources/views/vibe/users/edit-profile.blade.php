@extends('layouts.app')
<div class="container mx-auto px-4 pt-20 pb-12">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Edit Profile</h2>

                <form class="space-y-6" action="{{route('edit.profile')}}" method="POST" enctype="multipart/form-data">
                    @if(session('success'))
                        <div class="bg-green-600 text-white p-4 rounded-xl text-center">
                            {{session('success')}}
                        </div>
                    @endif
                    @csrf
                    @method('PATCH')
                    <!-- Profile Photo -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <div class="flex items-center space-x-6">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                     alt="Current profile photo"
                                     class="w-24 h-24 rounded-full object-cover">
                                <button type="button"
                                        class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-lg hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </button>
                                @error('profile_photo')
                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <input type="file"
                                       class="hidden"
                                       name="profile_photo"
                                       id="profile_photo"
                                       accept="image/*">
                                <label for="profile_photo"
                                       class="cursor-pointer py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Change Photo
                                </label>
                                <p class="mt-1 text-xs text-gray-500">
                                    JPG, GIF or PNG. Max size of 2MB
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text"
                               required
                               name="name"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               value="{{$user->name}}">
                        @error('name')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Nickname -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nickname</label>
                        <input type="text"
                               name="nickname"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               value="{{$user->nickname}}">
                        @error('nickname')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email"
                               required
                               name="email"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               value="{{$user->email}}">
                        @error('email')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Bio -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                            rows="4"
                            name="bio"
                            value="{{$user->bio}}"
                            placeholder="Write something about yourself..."></textarea>
                        <p class="text-xs text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                        @error('bio')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center justify-between border rounded-lg px-3 py-2">
                                <label class="text-sm text-gray-700">Female</label>
                                <input type="radio" name="gender" value="female" class="text-blue-600">
                            </div>
                            <div class="flex items-center justify-between border rounded-lg px-3 py-2">
                                <label class="text-sm text-gray-700">Male</label>
                                <input type="radio" name="gender" value="male" class="text-blue-600">
                            </div>
                            <div class="flex items-center justify-between border rounded-lg px-3 py-2">
                                <label class="text-sm text-gray-700">Custom</label>
                                <input type="radio" name="gender" value="custom" class="text-blue-600">
                            </div>
                        </div>
                        @error('gender')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Change Password</label>
                        <input type="password"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Current password">
                        <input type="password"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="New password">
                        <input type="password"
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Confirm new password">
                        @error('password')
                            <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end space-x-4">
                        <button type="button"
                                class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                                class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
