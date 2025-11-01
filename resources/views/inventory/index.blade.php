<div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Inventory Listing</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('inventory.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">+ Add Inventory</a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Product</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Batch No</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Quantity</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Reorder Level</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventoryItems as $item)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->batch_no ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->product->stock }}</td>
                            <td class="px-4 py-2">{{ $item->reorder_level }}</td>
                            <td class="px-4 py-2">
                                @if ($item->quantity <= $item->reorder_level)
                                    <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-md">
                                        Low Stock
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-md">
                                        In Stock
                                    </span>
                                @endif
                            </td>
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
            {{ $inventoryItems->links() }}
        </div>
    </div>
</x-app-layout>

</div>
