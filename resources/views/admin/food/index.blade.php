<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Food Items List') }}
            </h2>
            <a href="{{ route('food.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">
                + Add New Food
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-sm" role="alert">
                    <span class="block sm:inline font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Image</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Food Name</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Category</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Price</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Status</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($foods as $food)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">
                                    @if($food->image)
                                        <img src="{{ asset('uploads/food/'.$food->image) }}" alt="{{ $food->name }}" class="w-16 h-16 object-cover rounded-md">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 flex items-center justify-center rounded-md text-gray-500 text-xs">No Image</div>
                                    @endif
                                </td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 font-semibold">{{ $food->name }}</td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 text-gray-500">
                                    {{ $food->category->name ?? 'None' }}
                                </td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 font-bold text-green-600">${{ $food->price }}</td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">
                                    @if($food->status == 1)
                                        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Active</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 text-center flex justify-center items-center h-full mt-4">
                                    <a href="{{ route('food.edit', $food->id) }}" class="text-blue-500 hover:text-blue-700 font-bold mr-4">Edit</a>
                                    
                                    <form action="{{ route('food.destroy', $food->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this food item?');" class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>