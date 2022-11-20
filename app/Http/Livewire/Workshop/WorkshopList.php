<?php

namespace App\Http\Livewire\Workshop;

use App\Models\WorkShop;
use Livewire\Component;
use Livewire\WithPagination;

class WorkshopList extends Component
{
    use WithPagination;
    public $search;
    // computed propery
    public function getWorkshopsProperty(){
        return WorkShop::query()
        ->when($this->search,function($workShop){
            $workShop->where('title','like',"%{$this->search}%")
            ->orWhere('description','like',"%{$this->search}%")
            ->orWhere('present_time','like',"%{$this->search}%")
            ->orWhere('present_date','like',"%{$this->search}%");
        })
        ->where('is_present',0)
        ->latest('id')
        ->paginate(10);
    }
    public function render()
    {
        $workshops = $this->workshops;
        return view('livewire.workshop.workshop-list',compact('workshops'));
    }
}
