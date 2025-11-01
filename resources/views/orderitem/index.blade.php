<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Provider Orders</h2>
    </x-slot>

    <div class="p-6 space-y-6">
        {{-- Provider Selection --}}
        <div class="bg-white p-4 rounded-md shadow">
            <form method="GET" action="{{ route('orderitem.index') }}" class="flex items-end space-x-4">
                <div class="flex-1">
                    <label for="provider_id" class="block text-sm font-medium text-gray-700 mb-1">Select Provider</label>
                    <select name="provider_id" id="provider_id" 
                            class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Choose Provider --</option>
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}" 
                                {{ $selectedProviderId == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }} ({{ $provider->specialization }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 rounded-md hover:bg-blue-700">
                    View Orders
                </button>
            </form>
        </div>

        {{-- Order Items Table --}}
        @if ($selectedProviderId)
            <div class="bg-white p-4 rounded-md shadow">
                <h3 class="text-lg font-semibold mb-4">
                    Order Items for: 
                    <span class="text-blue-700">
                        {{ $providers->firstWhere('id', $selectedProviderId)?->name }}
                    </span>
                </h3>

                @if ($orderItems->isEmpty())
                    <p class="text-gray-500">No orders found for this provider.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Order #</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Product</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Quantity</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Unit Price</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Subtotal</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold">Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="px-4 py-2">{{ $item->order->order_number }}</td>
                                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="px-4 py-2">{{ $item->quantity }}</td>
                                        <td class="px-4 py-2">₹{{ number_format($item->price, 2) }}</td>
                                        <td class="px-4 py-2">₹{{ number_format($item->subtotal, 2) }}</td>
                                        <td class="px-4 py-2 text-gray-600 text-sm">
                                            {{ $item->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
