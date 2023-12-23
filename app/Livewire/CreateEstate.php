<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Category;
use App\Models\OrderType;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;

class CreateEstate extends Component
{

    use WithFileUploads, LivewireAlert;


    #[Computed]
    public function categories()
    {
        return Category::all();
    }

    #[Computed]
    public function orders()
    {
        return OrderType::all();
    }


    public PostForm $form;


    public function save()
    {
        // dd($this->form);
        $this->form->store();

        $this->alert('success', 'your estate stored successfully', [], '/estate/create');
    }
}
