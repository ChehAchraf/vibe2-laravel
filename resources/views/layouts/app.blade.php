<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
    <script>
        document.body.addEventListener('htmx:configRequest', function(event) {
            event.detail.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        });
    </script>
    @vite(['resources/css/style.css'])
</head>
<body class="bg-gray-100">
<!-- شريط التنقل -->
<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="text-blue-600 text-2xl font-bold">Logo</a>
                <div class="relative mx-4">
                    <input type="text" placeholder="Search..." class="bg-gray-100 rounded-full py-2 px-4 w-64">
                    <button class="absolute left-3 top-2">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <img src="https://via.placeholder.com/40" alt="صورة الملف الشخصي" class="w-8 h-8 rounded-full">
                </button>
            </div>
        </div>
    </div>
</nav>

@section('content')

@endsection
</body>
</html>
