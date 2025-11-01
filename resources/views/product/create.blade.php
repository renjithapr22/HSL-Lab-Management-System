<div>
   <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Product</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('product.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Manufacturer</label>
                <select name="manufacturer_id" id="manufacturer_id" required class="w-full border-gray-300 rounded-md">
                    <option value="">-- Select manufacturers --</option>
                    @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                <input type="text" name="sku" id="sku" value="{{ old('sku') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('sku') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="text" name="stock" id="stock" value="{{ old('stock') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('stock') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('providers.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>

</div>
