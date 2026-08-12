<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Food Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- enctype="multipart/form-data" is REQUIRED for uploading images -->
                <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Food Name -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Food Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" required placeholder="e.g. Chicken Burger">
                        </div>

                        <!-- Category Selection -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Category <span class="text-red-500">*</span></label>
                            <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Price ($) <span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" name="price" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" required placeholder="e.g. 12.99">
                        </div>

                        <!-- Food Image -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Food Image</label>
                            <input type="file" name="image" class="w-full border border-gray-300 rounded-md shadow-sm p-1.5 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 bg-white" accept="image/*">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" placeholder="Write a short description about this food..."></textarea>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition-colors duration-300">
                            Save Food Item
                        </button>
                        <a href="{{ route('food.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-md transition-colors duration-300">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>