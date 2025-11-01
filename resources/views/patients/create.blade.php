<div>
    <x-app-layout>
    <x-slot name="header">
        Add Patient
    </x-slot>

    <div class="bg-white shadow p-6 rounded-lg">
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Full Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full border rounded p-2">
            </div>
            <button class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
</x-app-layout>

</div>
