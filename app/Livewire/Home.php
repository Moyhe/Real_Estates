<?php

namespace App\Livewire;

use Livewire\Component;
use Jorenvh\Share\ShareFacade as Share;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

class Home extends Component
{
    #[Title('Real Estate Home Page')]
    public function render()
    {
        $share = Share::page('https://www.opensuse.org/', 'real estate information', ['class' => 'text-white', 'target' => '_blank'])
            ->telegram()
            ->whatsapp();

        return view('livewire.home', compact('share'));
    }
}