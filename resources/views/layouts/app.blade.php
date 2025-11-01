<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'HCL Labs') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex">

            <!-- 🧭 Sidebar -->
            <aside class="w-64 bg-white shadow-md">
                <div class="p-6 border-b">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/lab-logo.png') }}" style="width:80px;height:80px;" alt="Lab Logo" class="h-10 mx-auto">
                    </a>
                </div>

                <nav class="mt-6 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block px-6 py-2 text-gray-700 hover:bg-gray-100">🏠 Dashboard</a>

                    <h3 class="px-6 mt-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Admin</h3>

                    <a href="{{ route('manufacturers.index') }}" class="block px-6 py-2 hover:bg-gray-100">🏭 Manufacture</a>
                    <a href="{{ route('product.index') }}" class="block px-6 py-2 hover:bg-gray-100">📦 Product</a>
                    <a href="{{ route('providers.index') }}" class="block px-6 py-2 hover:bg-gray-100">👩‍⚕️ Providers</a>
                    <a href="{{ route('provider-staff.index') }}" class="block px-6 py-2 hover:bg-gray-100">👨‍💼 Provider Staff</a>
                    <a href="{{ route('patients.index') }}" class="block px-6 py-2 hover:bg-gray-100">🧑‍🤝‍🧑 Patients</a>
                    <a href="{{ route('orders.index') }}" class="block px-6 py-2 hover:bg-gray-100">🧾 Orders</a>
                    <a href="{{ route('order-items.index') }}" class="block px-6 py-2 hover:bg-gray-100">📦 Order Items</a>
                    <a href="{{ route('inventory.index') }}" class="block px-6 py-2 hover:bg-gray-100">📋 Inventory</a>
                    <a href="{{ route('inventory-usage.index') }}" class="block px-6 py-2 hover:bg-gray-100">⚙️ Inventory Usage</a>
                    <a href="{{ route('subscriptions.index') }}" class="block px-6 py-2 hover:bg-gray-100">💳 Subscription</a>

                    <div class="border-t mt-4"></div>

                    <form method="POST" action="{{ route('logout') }}" class="px-6 py-2">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">🚪 Logout</button>
                    </form>
                </nav>
            </aside>

            <!-- 📄 Main Content -->
            <div class="flex-1">
                <!-- Header -->
                <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                    <h2 class="font-semibold text-lg text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
                    <span class="text-sm text-gray-600">👋 {{ Auth::user()->name }}</span>
                </header>

                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
