<div>
   <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Provider</h2>
    </x-slot>

    <div class="p-6 max-w-lg mx-auto">
        <form action="{{ route('providers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                <input type="text" name="specialization" id="specialization" value="{{ old('specialization') }}" required
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('specialization') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm">
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('providers.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>

</div>
