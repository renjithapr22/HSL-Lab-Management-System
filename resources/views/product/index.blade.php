<div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Product</h2>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('product.create') }}" class="px-4 py-2 bg-blue-600 rounded-lg">+ Add Product</a>
        </div>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead>
                <tr class="bg-gray-100 text-left text-sm uppercase">
                    <th class="px-4 py-2 border-b">#</th>
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">SKU</th>
                    <th class="px-4 py-2 border-b">Price</th>
                    <th class="px-4 py-2 border-b">Stock</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $pdt)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border-b">{{ $pdt->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $pdt->sku }}</td>
                        <td class="px-4 py-2 border-b">{{ $pdt->price }}</td>
                        <td class="px-4 py-2 border-b">{{ $pdt->stock }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

</div>
