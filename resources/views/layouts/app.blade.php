<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        
        <div class="flex min-h-screen">
            
            <!-- Sidebar (সাইডবার) -->
            <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:flex flex-col shadow-xl">
                <div class="h-16 flex items-center justify-center border-b border-gray-700">
                   
                    <a href="{{route('dashboard')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                         <h1 class="text-2xl font-bold text-indigo-400">Admin Panel</h1>
                    </a>
                </div>
                
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <!-- Dashboard Link -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 bg-gray-800 text-white rounded-lg transition-colors hover:bg-indigo-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>

                    <!-- Category Link -->
                    <a href="{{route('category.index')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Categories
                    </a>

                    <!-- Food Items Link -->
                    <a href="{{route('food.index')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Food Items
                    </a>

                    <!-- Orders Link -->
                    <a href="{{route('admin.orders')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        Orders
                    </a>
<!-- contact Link -->
                     <a href="{{route('admin.messages')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        Contact Message
                    </a>
                    <!-- reservations Link -->


                     <a href="{{route('admin.reservations')}}" class="flex items-center px-4 py-3 text-gray-300 rounded-lg transition-colors hover:bg-gray-800 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        reservations Message
                    </a>

                </nav>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                
                <!-- Top Navigation Bar -->
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto">
                    {{ $slot }}
                </main>
                
            </div>
            
        </div>



        <!-- ... existing code ... -->
            </main>
        </div>

        <!-- New Order Notification Script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // পেজ লোড হওয়ার সময় সর্বশেষ অর্ডারের আইডিটি সেভ করে রাখছি
            let latestOrderId = {{ \App\Models\Order::max('id') ?? 0 }};

            // প্রতি ১০ সেকেন্ড পরপর ব্যাকএন্ডে চেক করবে নতুন অর্ডার এলো কিনা
            setInterval(function() {
                fetch("{{ route('admin.check.order') }}")
                    .then(response => response.json())
                    .then(data => {
                        // যদি ডেটাবেসের আইডি আমাদের সেভ করা আইডির চেয়ে বড় হয়, তারমানে নতুন অর্ডার এসেছে!
                        if (data.id > latestOrderId) {
                            latestOrderId = data.id; // নতুন আইডিটি আপডেট করে নিলাম
                            
                            // একটি সুন্দর পপআপ (Toast) নোটিফিকেশন দেখাবে
                            Swal.fire({
                                title: 'New Order Received! 🍔',
                                text: 'Customer: ' + data.customer + ' (Order #' + data.id + ')',
                                icon: 'success',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 10000, // ১০ সেকেন্ড স্ক্রিনে থাকবে
                                timerProgressBar: true,
                            });

                            // সাথে একটি সুন্দর সাউন্ড বাজবে!
                            let audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
                            audio.play();
                        }
                    })
                    .catch(error => console.log('Checking for orders...'));
            }, 10000); 
        </script>
    </body>
</html>
        
