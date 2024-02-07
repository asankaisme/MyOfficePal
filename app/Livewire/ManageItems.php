<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;

class ManageItems extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $assets = Asset::where('assetName', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.manage-items', compact('assets'));
    }
}
