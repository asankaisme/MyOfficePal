<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $totalAssets = 20;

    public function render()
    {
        
        return view('livewire.dashboard');
    }
}
