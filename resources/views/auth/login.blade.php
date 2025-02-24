@extends('layouts.main')

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl w-full space-y-8 flex items-center justify-between">
        <!-- Left Side - Brand Info -->
        <div class="w-1/2 pr-12">
            <h1 class="text-7xl font-bold text-blue-600 mb-8" style="font-family: 'Segoe UI', sans-serif;">
                Vibe
            </h1>
            <h2 class="text-3xl leading-9 font-medium text-gray-700">
                Connect with friends and share your vibe with the world.
            </h2>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-[396px]">
            <div class="bg-white p-8 rounded-xl shadow-md">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <input type="email" 
                               required 
                               class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                               placeholder="Email address">
                    </div>
                    <div>
                        <input type="password" 
                               required 
                               class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                               placeholder="Password">
                    </div>

                    <div>
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            Log In
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="#" class="text-blue-600 hover:underline text-sm">
                            Forgot password?
                        </a>
                    </div>

                    <div class="border-t border-gray-300 pt-6">
                        <button type="button" 
                                class="group relative w-fit mx-auto flex justify-center py-3 px-8 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                            Create New Account
                        </button>
                    </div>
                </form>
            </div>

            <div class="text-center mt-4 text-sm">
                <p>
                    <a href="#" class="font-bold hover:underline">Create a Page</a> 
                    for a celebrity, brand or business.
                </p>
            </div>
        </div>
    </div>
</div>