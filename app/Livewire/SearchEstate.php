<?php

namespace App\Livewire;

use App\Livewire\Forms\SearchForm;
use App\Models\Category;
use App\Models\OrderType;
use Illuminate\Database\Eloquent\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SearchEstate extends Component
{
    use LivewireAlert;

    public SearchForm $form;

    public Collection $categories;
    public Collection $orders;

    public function search()
    {
        // dd($this->form);
        $this->form->storeEstate();


        $this->alert('success', 'your estate stored successfully', [], '/estate/create');
    }
}
