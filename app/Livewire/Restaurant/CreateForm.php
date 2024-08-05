<?php

namespace App\Livewire\Restaurant;

use Livewire\Component;
use App\Models\Restaurant;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    public $name;
    public $address;
    public $phone_number;
    public $city_id;
    public $description;
    public $logo;
    public $cities = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'phone_number' => 'required|numeric',
        'city_id' => 'required|numeric|exists:cities,id',
        'description' => 'required|string',
        'logo' => 'required|image',
    ];

    public function removeLogo()
    {
        $this->logo = null;
    }

    public function save()
    {
        $this->validate();

        $city = City::find($this->city_id);

        Restaurant::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'city_id' => $this->city_id,
            'description' => $this->description,
            'logo' => $this->logo->store('logos', 'public'),
            'user_id' => auth()->id(),
        ]);
        Session::flash('alert', [
            'message' => 'Restaurant created successfully',
            'text-color' => 'text-green-800',
            'text-color-dark' => 'text-green-400'
        ]);

        return redirect()->to('restaurant');
    }

    public function mount()
    {
        $this->cities = City::all();
    }

    public function render()
    {
        return view('livewire.restaurant.create-form');
    }
}
