<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    @livewire('admin.users')
                    @livewire('admin.restaurant-owners')
                    @livewire('admin.restaurants')
                    @livewire('admin.sales')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
