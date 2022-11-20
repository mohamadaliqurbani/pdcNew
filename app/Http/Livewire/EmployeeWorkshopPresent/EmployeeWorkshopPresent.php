<?php

namespace App\Http\Livewire\EmployeeWorkshopPresent;

use App\Models\WorkShop;
use Livewire\Component;

class EmployeeWorkshopPresent extends Component
{
    public $employee;
    public function render()
    {
        $presents = WorkShop::whereHas('presentor',function($presentor){
            $presentor->where('presentorable_type','App\Models\Employee')
            ->where('presentorable_id',$this->employee->id);
        })
        ->get();
        return view('livewire.employee-workshop-present.employee-workshop-present',compact('presents'));
    }
}
