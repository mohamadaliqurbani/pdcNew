<?php

namespace App\Http\Livewire\EmployeeWorkshopParticipate;

use App\Models\Participant;
use App\Models\WorkShop;
use Livewire\Component;

class EmployeeWorkshopParticipate extends Component
{
    public $employee;
    public function render()
    {
        // $paricipants=WorkShop::whereHas('participant',function($participant){
        //     $participant->where('participantable_type','App\Models\Employee')
        //     ->where('participantable_id',$this->employee->id);
        // })
        // ->get();
        $paricipants=Participant::with('workShop')
        ->where('user_id',auth()->user()->id)->get();
        return view('livewire.employee-workshop-participate.employee-workshop-participate',compact('paricipants'));
    }
}
