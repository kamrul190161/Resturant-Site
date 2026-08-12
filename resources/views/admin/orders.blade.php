<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Orders') }}
            </h2>
            <span class="bg-red-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                {{ $orders->count() }} Orders
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- স্ট্যাটাস আপডেট হলে সাকসেস মেসেজ দেখানোর জন্য -->
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
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">#ID</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Customer Name</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Phone</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Ordered Items</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Total</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Status</th>
                                <th class="border-b border-gray-200 dark:border-gray-700 py-4 px-4 bg-gray-50 dark:bg-gray-700 font-bold text-sm uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 font-bold text-indigo-600 dark:text-indigo-400">#{{ $order->id }}</td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">{{ $order->customer_name }}<br><span class="text-xs text-gray-500">{{ $order->delivery_address }}</span></td>
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">{{ $order->customer_phone }}</td>
                                
                                <!-- Ordered Items Column -->
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">
                                    <ul class="list-disc pl-4 text-sm text-gray-600 dark:text-gray-300">
                                        @foreach($order->orderItems as $item)
                                            <li><span class="font-bold">{{ $item->quantity }}x</span> {{ $item->food_name }}</li>
                                        @endforeach
                                        
                                        @if($order->orderItems->isEmpty())
                                            <span class="text-xs text-red-400">No items (Old order)</span>
                                        @endif
                                    </ul>
                                </td>

                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 font-bold">${{ $order->total_amount }}</td>
                                
                                <!-- Status Change Dropdown (এখানে পরিবর্তন করা হয়েছে) -->
                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4">
                                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="flex items-center gap-2 m-0">
                                        @csrf
                                        <select name="status" class="text-sm border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white py-1.5 px-2">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-red text-xs font-bold py-1.5 px-3 rounded transition-colors shadow-sm">
                                            Update
                                        </button>
                                    </form>
                                </td>

                                <td class="border-b border-gray-200 dark:border-gray-700 py-3 px-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $order->created_at->format('d M, Y h:i A') }}
                                </td>
                            </tr>
                            @endforeach
                            
                            @if($orders->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-8">
                                    No orders found yet!
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>