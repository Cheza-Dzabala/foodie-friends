<x-form-section submit="save">
    <x-slot name="title">
        {{ __('Create Restaurant') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Tell the world about your restaurant') }}
    </x-slot>

    <x-slot name="form">
       
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <input type="file" id="logo" class="hidden" wire:model.live="logo" x-ref="logo" x-on:change="
                    photoName = $refs.logo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    };
                    reader.readAsDataURL($refs.logo.files[0]);
                " />
            <x-label for="logo" value="{{ __('Logo') }}" class="mb-4"/>
            @if($logo)
            <div class="mt-4" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>
            @else 
            <div class="rounded-full h-20 w-20 bg-slate-400 border-white"></div>
            @endif
            <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.logo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>
            @if ($logo)
            <x-secondary-button type="button" class="mt-2" wire:click="removeLogo">
                {{ __('Remove Logo') }}
            </x-secondary-button>
            @endif
            <x-input-error for="logo" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Description') }}" />
            <x-text-area id="description" class="mt-1 block w-full" wire:model="description" />
            <x-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address (Or General Area)') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="number" class="mt-1 block w-full" wire:model="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="city_id" value="{{ __('City') }}" />
            <x-select id="city_id" class="mt-1 block w-full" wire:model="city_id">
                <option value="">Select City</option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </x-select>
            <x-input-error for="city_id" class="mt-2" />
        </div>

        <x-slot name="actions">
            <x-button type="submit">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-slot>
</x-form-section>