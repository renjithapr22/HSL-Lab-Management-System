<div>
   <x-app-layout>
        <x-slot name="header">
            Patients
        </x-slot>

        <div class="bg-white shadow p-6 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Patient List</h2>
            <p>Display all patient records here.</p>
            <a href="{{ route('patients.create') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">
                + Add Patient
            </a>
        </div>
    </x-app-layout>

</div>
