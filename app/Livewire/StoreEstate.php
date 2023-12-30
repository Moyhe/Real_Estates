<?php

namespace App\Livewire;

use App\Models\SupplyEstates;
use Livewire\Component;
use Jorenvh\Share\ShareFacade as Share;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;



class StoreEstate extends Component
{

    #[Title('Store Estate')]
    public function render()
    {
        $estates = SupplyEstates::all();
        return view('livewire.store-estate', compact('estates'));
    }
}
