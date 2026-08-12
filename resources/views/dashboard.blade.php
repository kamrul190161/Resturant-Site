<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Restaurant Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- ওয়েলকাম মেসেজ -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-bold text-lg">
                    👋 Welcome back to Admin Panel!
                </div>
            </div>

            <!-- স্ট্যাটিস্টিক্স কার্ডস (Grid Layout) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- কার্ড ১: Total Categories -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-indigo-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm uppercase font-semibold">Total Categories</div>
                    <div class="text-3xl font-extrabold text-gray-800 dark:text-white mt-2">12</div>
                </div>

                <!-- কার্ড ২: Total Food Items -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-pink-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm uppercase font-semibold">Total Food Items</div>
                    <div class="text-3xl font-extrabold text-gray-800 dark:text-white mt-2">45</div>
                </div>

                <!-- কার্ড ৩: Total Orders -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-gray-500 dark:text-gray-400 text-sm uppercase font-semibold">Total Orders</div>
                    <div class="text-3xl font-extrabold text-gray-800 dark:text-white mt-2">128</div>
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>
