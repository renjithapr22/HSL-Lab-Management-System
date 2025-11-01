<div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Inventory Usages</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Product</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Purchased Quantity</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Order Id</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Order Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Transaction Type</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventoryUsages as $item)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->quantity }}</td>
                            <td class="px-4 py-2">{{ $item->order->order_number }}</td>
                            <td class="px-4 py-2">{{ $item->order->status }}</td>
                            <td class="px-4 py-2">{{ $item->transaction_type }}</td>                            
                            <td class="px-4 py-2">{{ $item->reorder_level }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No inventory records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $inventoryUsages->links() }}
        </div>
    </div>
</x-app-layout>

</div>
