<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer Messages') }}
            </h2>
            <span class="bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full shadow-sm">
                {{ $messages->where('is_read', 0)->count() }} Unread
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
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Status</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Sender Info</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Message Details</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600">Date</th>
                                <th class="border-b-2 border-gray-200 py-4 px-4 bg-gray-50 text-sm font-bold uppercase text-gray-600 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                            <!-- নতুন মেসেজ হলে হালকা নীল ব্যাকগ্রাউন্ড দেখাবে -->
                            <tr class="hover:bg-gray-50 transition-colors {{ $msg->is_read == 0 ? 'bg-blue-50' : '' }}">
                                
                                <td class="border-b border-gray-200 py-3 px-4">
                                    @if($msg->is_read == 0)
                                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded shadow-sm">New</span>
                                    @else
                                        <span class="bg-gray-200 text-gray-600 text-xs font-bold px-2 py-1 rounded">Read</span>
                                    @endif
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4">
                                    <div class="font-bold text-gray-800">{{ $msg->name }}</div>
                                    <div class="text-sm text-indigo-600"><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></div>
                                    @if($msg->phone)
                                        <div class="text-sm text-gray-500 mt-1"><i class="fas fa-phone-alt text-xs mr-1"></i>{{ $msg->phone }}</div>
                                    @endif
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4 max-w-md">
                                    @if($msg->subject)
                                        <p class="font-bold text-sm mb-1 text-gray-700">Sub: {{ $msg->subject }}</p>
                                    @endif
                                    <p class="text-sm text-gray-600 whitespace-pre-wrap">{{ $msg->message }}</p>
                                </td>

                                <td class="border-b border-gray-200 py-3 px-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $msg->created_at->format('d M, Y h:i A') }}
                                </td>
                                
                                <td class="border-b border-gray-200 py-3 px-4 text-right">
                                    @if($msg->is_read == 0)
                                    <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST" class="m-0 inline-block">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-1.5 px-3 rounded transition-colors shadow-sm whitespace-nowrap">
                                            Mark as Read
                                        </button>
                                    </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic"><i class="fas fa-check-double mr-1"></i>Seen</span>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-8 font-medium">
                                    No messages received yet!
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