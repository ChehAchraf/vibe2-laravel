@extends('layouts.main')

<div class="min-h-screen flex flex-col py-12 px-4 sm:px-6 lg:px-8">
    <!-- Header with Logo -->
    <div class="text-center mb-8">
        <h1 class="vibe-logo text-6xl font-bold mb-2">Vibe</h1>
    </div>

    <!-- Sign Up Form Card -->
    <div class="max-w-md w-full mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-8 py-6">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Create a new account</h2>
            <p class="text-center text-gray-600 mb-8">It's quick and easy.</p>

            <form class="space-y-6" method="POST" action="{{route('create.user')}}">
                @csrf
                <div class="grid grid-cols-1 ">
                    <div>
                        <input type="text" 
                               name ="name"
                               required 
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                               placeholder="Full name">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="email"
                           name="email" 
                           required 
                           class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Email address">
                    @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <input type="text"
                           name="nickname" 
                           required 
                           class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="nickname">
                    @error('nickname')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" 
                           required 
                           name="password"
                           class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="password">
                    @error('password')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="password" 
                           required 
                           name="password_confirmation"
                           class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="password confirmation">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
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
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Terms -->
                <div class="text-xs text-gray-500">
                    By clicking Sign Up, you agree to our <a href="#" class="text-blue-600 hover:underline">Terms</a>, 
                    <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a> and 
                    <a href="#" class="text-blue-600 hover:underline">Cookies Policy</a>.
                </div>

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                        Sign Up
                    </button>
                </div>
            </form>

            <div class="text-center mt-6">
                <a href="login.html" class="text-blue-600 hover:underline text-sm font-medium">
                    Already have an account?
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Links -->
    <div class="max-w-md mx-auto mt-8 text-center">
        <div class="flex flex-wrap justify-center gap-x-4 gap-y-2 text-xs text-gray-500">
            <a href="#" class="hover:underline">About</a>
            <a href="#" class="hover:underline">Help</a>
            <a href="#" class="hover:underline">Privacy</a>
            <a href="#" class="hover:underline">Terms</a>
            <a href="#" class="hover:underline">Cookies</a>
            <a href="#" class="hover:underline">Blog</a>
            <a href="#" class="hover:underline">Careers</a>
        </div>
        <div class="mt-4 text-xs text-gray-500">
            <p>Vibe © 2024</p>
        </div>
    </div>
</div>