<x-app-layout>
    <x-slot name="header" class="flex">
      <div class="flex flex-row justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Restaurant') }}
        </h2>
   
      </div>
 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('restaurant.create-form')
        </div>
    </div>
</x-app-layout>
