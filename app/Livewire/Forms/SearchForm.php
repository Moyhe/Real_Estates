<?php

namespace App\Livewire\Forms;

use App\Models\SearchEstate;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\On;


class SearchForm extends Form
{


    public $orderType = '';

    public $estateType = '';

    #[Validate('required|min:0')]
    public $minArea = 0;


    #[Validate('required|max:999999')]
    public $maxArea = 0;


    #[Validate('required|min:0')]
    public $minPrice = 0;


    #[Validate('required|max:999999')]
    public $maxPrice = 0;

    #[Validate('required')]
    public $city = '';

    public function rules()
    {
        return [
            'estateType' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'orderType' => [
                'required',
                Rule::exists('order_types', 'id'),
            ],
        ];
    }



    public function storeEstate()
    {

        $this->validate();

        SearchEstate::create([
            'user_id' => auth()->user() ? auth()->user()->id : 1,
            'category_id' => $this->orderType,
            'orderType_id' => $this->estateType,
            'area_from' => $this->minArea,
            'area_to' => $this->maxArea,
            'price_from' => $this->minPrice,
            'price_to' => $this->maxPrice,
            'city' => $this->city,
        ]);

        $this->reset();
    }
}
