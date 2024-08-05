<x-app-layout>
    <x-slot name="header" class="flex">
      <div class="flex flex-row justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(!$restaurant)
            {{ __('Restaurant') }}
            @else
            <div class="flex flex-row h-full w-full items-center gap-2 ">
                    <div class="rounded" >
                        <span class="block rounded-full w-10 h-10 bg-cover bg-no-repeat bg-center border border-white"
                        style="background-image: url('{{ $restaurant->logo }}');"">
                        </span>
                    </div>
                    {{$restaurant->name}}
            </div>
            @endif
        </h2>
        @if(!$restaurant)
        <x-anchor-button href="{{ route('restaurant.create') }}">
            {{ __('Create') }}
        </x-anchor-button>
        @endif
      </div>
 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
                @if(!$restaurant)
                 
                <div class="text-white font-medium text-2xl w-full justify-center items-center flex">
                    <p>You haven't registered a restaurant yet. 😢</p>
                </div>
                @else
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <x-dashboard-link title="Menus" content="Manage your menu items" href="#" />
                <x-dashboard-link title="Restaurant" content="Update your restaurant details" href="#" />
                <x-dashboard-link title="Orders" content="View your orders" href="#" />
                <x-dashboard-link title="Reviews" content="View and respond to reviews" href="#" />
                <x-dashboard-link title="Settings" content="Update your account settings" href="#" />
                <x-dashboard-link title="Delete" content="Completely close your restaurant" href="#" />
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
