<div>
    <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Manufacturer</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('manufacturers.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Manufacturer Name</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('manufacturers.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>

</div>
