<?php

namespace App\Http\Livewire\OutSidePresentor;

use Livewire\Component;

class Edit extends Component
{

    public $outsidepresentor;
    public function mount(){
       
    }
    public function render()
    {
        return view('livewire.out-side-presentor.edit');
    }
}
