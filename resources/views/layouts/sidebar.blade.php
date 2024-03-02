<aside x-data="{ open: false }" class="bg-white border-r border-gray-100 w-64">
    <!-- Sidebar Content -->
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center justify-center h-16">
            <a href="{{ route('dashboard') }}">
                <h5>LOGO</h5>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 d-flex flex-column overflow-y-auto p-4 d-grid gap-4">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('master')" :active="request()->routeIs('master')">
                {{ __('Master Pengguna') }}
            </x-nav-link>
            <!-- Add more navigation links as needed -->
        </div>
    </div>


</aside>
