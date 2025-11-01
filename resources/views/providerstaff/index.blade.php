<div>
<x-app-layout>
    <div class="max-w-6xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Provider Staff</h2>

        <a href="{{ route('provider-staff.create') }}"
           class="bg-blue-600 px-4 py-2 rounded">+ Add Staff</a>

        <table class="min-w-full mt-6 bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Provider</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staff as $member)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $member->name }}</td>
                        <td class="px-4 py-2">{{ $member->role }}</td>
                        <td class="px-4 py-2">{{ $member->provider->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $member->phone }}</td>
                        <td class="px-4 py-2">{{ $member->email }}</td>
                        <td class="px-4 py-2">
                            <form method="POST" action="{{ route('provider-staff.destroy', $member) }}">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline"
                                        onclick="return confirm('Delete this staff?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-2 text-center text-gray-500">No staff found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

</div>
