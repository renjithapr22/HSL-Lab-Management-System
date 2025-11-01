<div>
<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Add Provider Staff</h2>

        <form method="POST" action="{{ route('provider-staff.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Provider</label>
                <select name="provider_id" class="border rounded w-full p-2" required>
                    <option value="">-- Select Provider --</option>
                    @foreach ($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1">Name</label>
                <input type="text" name="name" class="border rounded w-full p-2" required>
            </div>

            <div>
                <label class="block mb-1">Role</label>
                <input type="text" name="role" class="border rounded w-full p-2">
            </div>

            <div>
                <label class="block mb-1">Phone</label>
                <input type="text" name="phone" class="border rounded w-full p-2">
            </div>

            <div>
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="border rounded w-full p-2">
            </div>

            <div>
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded">Save</button>
                <a href="{{ route('provider-staff.index') }}" class="text-gray-600 ml-2">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>

</div>
