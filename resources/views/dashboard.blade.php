<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="text-sm text-gray-500 mt-2">
            Role: <span class="font-semibold">{{ auth()->user()->getRoleNames()->first() }}</span>
        </p>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to HCL Labs!") }}
                    <p>Use the sidebar to navigate through modules.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
