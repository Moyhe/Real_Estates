<?php

namespace App\Livewire\Forms;

use App\Models\Estate;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;


class PostForm extends Form
{
    #[Validate('required|min:0|max:999999')]
    public $area = 0;

    public $order_type = '';

    public $estate_type = '';

    #[Validate('required')]
    public $latitude = '';

    #[Validate('required')]
    public $longitude = '';

    #[Validate('required')]
    public $city = '';

    #[Validate('required')]
    public $street = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('file|max:2048|mimes:png,jpg,jpeg,video/avi,video/mpeg,video/quicktime,video/mp4')]
    public $photo;


    public function rules()
    {
        return [
            'estate_type' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'order_type' => [
                'required',
                Rule::exists('order_types', 'id'),
            ],
        ];
    }


    public function store()
    {

        $this->validate();

        Estate::create([
            'user_id' => auth()->user() ? auth()->user()->id : $this->randomIds(),
            'orderType_id' => $this->estate_type,
            'category_id' => $this->estate_type,
            'description' => $this->description,
            'street' => $this->street,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'city' => $this->city,
            'area' => $this->area,
            'thumbnails' => $this->photo->store('photos')
        ]);

        $this->reset();
    }

    private function randomIds(): float
    {
        return floor(rand(1, 9));
    }
}
