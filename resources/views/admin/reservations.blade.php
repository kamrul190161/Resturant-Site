<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Table Reservations') }}
            </h2>
            <span class="bg-indigo-500 text-white text-sm font-bold px-3 py-1 rounded-full shadow-sm">
                {{ $reservations->where('status', 'pending')->count() }} Pending
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 shadow-sm">
                    <span class="block sm:inline font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Date & Time</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Customer Details</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Guests</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Special Request</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600 text-right">Status Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $res)
                            <tr class="hover:bg-gray-50 transition-colors">
                                
                                <td class="border-b border-gray-200 py-3 px-4">
                                    <div class="font-bold text-indigo-600">{{ \Carbon\Carbon::parse($res->date)->format('d M, Y') }}</div>
                                    <div class="text-sm font-medium text-gray-600"><i class="far fa-clock mr-1"></i>{{ $res->time }}</div>
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4">
                                    <div class="font-bold text-gray-800">{{ $res->name }}</div>
                                    <div class="text-sm text-gray-600"><i class="fas fa-phone-alt text-xs mr-1"></i>{{ $res->phone }}</div>
                                    <div class="text-sm text-gray-500">{{ $res->email }}</div>
                                </td>

                                <td class="border-b border-gray-200 py-3 px-4 font-bold text-gray-700">
                                    <i class="fas fa-user-friends text-gray-400 mr-1"></i> {{ $res->guests }}
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4 max-w-xs">
                                    <p class="text-sm text-gray-600 truncate" title="{{ $res->special_requests }}">
                                        {{ $res->special_requests ?? 'None' }}
                                    </p>
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4 text-right">
                                    <form action="{{ route('admin.reservations.status', $res->id) }}" method="POST" class="flex items-center justify-end gap-2 m-0">
                                        @csrf
                                        <select name="status" class="text-sm border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 py-1.5 px-2 
                                            {{ $res->status == 'pending' ? 'bg-yellow-50 text-yellow-700' : '' }}
                                            {{ $res->status == 'confirmed' ? 'bg-green-50 text-green-700' : '' }}
                                            {{ $res->status == 'cancelled' ? 'bg-red-50 text-red-700' : '' }}
                                        ">
                                            <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                        <button type="submit" class="bg-gray-800 hover:bg-black text-white text-xs font-bold py-1.5 px-3 rounded shadow-sm">
                                            Update
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-8 font-medium">
                                    No table reservations yet!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>