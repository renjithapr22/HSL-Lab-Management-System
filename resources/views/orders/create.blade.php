<div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Place Wholesale Order</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto space-y-6">
        @if (session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div>
                <label for="provider_id" class="block text-sm font-medium">Select Provider</label>
                <select name="provider_id" id="provider_id" required class="w-full border-gray-300 rounded-md">
                    <option value="">-- Select Provider --</option>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->name }} ({{ $provider->specialization }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium mb-2">Products</label>
                @foreach($products as $product)
                    <div class="flex items-center space-x-2 mb-2">
                        <input type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                        <label class="flex-1">{{ $product->name }} (Stock: {{ $product->stock }})</label>
                        <input type="number" name="products[{{ $product->id }}][quantity]" min="1" placeholder="Qty"
                               class="w-20 border-gray-300 rounded-md">
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md">Place Order</button>
            </div>
        </form>
    </div>
</x-app-layout>

</div>
