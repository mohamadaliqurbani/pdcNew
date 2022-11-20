<?php

namespace App\Http\Livewire\OutSidePresentor;

use App\Models\OutSidePresentor;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public function getOutSidePresentorsProperty(){
        return OutSidePresentor::with('workShop')
        ->when($this->search,function($utSidePresentor){
            $utSidePresentor->where('name','like',"%{$this->search}%")
            ->orWhere('lname','like',"%{$this->search}%")
            ->orWhere('education','like',"%{$this->search}%")
            ->orWhere('email','like',"%{$this->search}%")
            ->orWhere('phone','like',"%{$this->search}%")
            ->orWhere('gender','like',"%{$this->search}%");
        })
        ->latest('id')
        ->paginate(20);
    }
    public function render()
    {
        $outSidePresentors=$this->OutSidePresentors;
        return view('livewire.out-side-presentor.index',compact('outSidePresentors'));
    }
}
