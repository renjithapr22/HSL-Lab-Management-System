<div>
    <div>
   <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Orders</h2>
        </x-slot>

        <div class="p-6">
            <div class="flex justify-end mb-4">
                <a href="{{ route('orders.create') }}" class="px-4 py-2 bg-blue-600 rounded-lg">+ New Order</a>
            </div>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm uppercase">
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Order Id</th>
                        <th class="px-4 py-2 border-b">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $or)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b">{{ $or->order_number }}</td>
                            <td class="px-4 py-2 border-b">{{ $or->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>


</div>

</div>
