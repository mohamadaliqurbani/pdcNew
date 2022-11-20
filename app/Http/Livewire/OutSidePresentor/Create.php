<?php

namespace App\Http\Livewire\OutSidePresentor;

use Livewire\Component;

class Create extends Component
{
    public $workshop;
    public function render()
    {
        return view('livewire.out-side-presentor.create');
    }
}
