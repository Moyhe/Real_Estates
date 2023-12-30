<?php

namespace App\Livewire;

use App\Models\SupplyEstates;
use Livewire\Component;
use Jorenvh\Share\ShareFacade as Share;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

class Home extends Component
{

    #[Title('Real Estate Home Page')]
    public function render()
    {

        $estates = SupplyEstates::all();

        return view('livewire.home', compact('estates'));
    }
}
