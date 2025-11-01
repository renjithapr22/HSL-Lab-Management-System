<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Order Confirmation</h2>
    </x-slot>

    <div class="p-6 text-center">
        <div class="text-green-600 text-lg font-semibold mb-4">
            ✅ Order placed successfully!
        </div>
        <p class="text-gray-600">Inventory updated and confirmation recorded.</p>
        <a href="{{ route('orders.create') }}" class="mt-4 inline-block bg-blue-600 px-4 py-2 rounded-md"> + Place Another Order</a>
    </div>
</x-app-layout>
