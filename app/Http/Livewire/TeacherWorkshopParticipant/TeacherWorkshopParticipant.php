<?php

namespace App\Http\Livewire\TeacherWorkshopParticipant;

use App\Models\WorkShop;
use Livewire\Component;

class TeacherWorkshopParticipant extends Component
{
    public $teacherinfo;
    public function render()
    {
        $participants=[];
        $id=null;
        if(auth()->user()->role=="teacher"){
            $id=auth()->user()->id;
        }else if($this->teacherinfo->user!=null){
            $id=$this->teacherinfo->user->id;
        }else{
            $id=$this->teacherinfo->deActivedUser->id;
        }
        if ($this->teacherinfo != null) {
            $participants = WorkShop::whereHas('participant', function ($participant)use($id) {
                $participant
                    ->where('user_id', $id);
            })->get();
        }

        return view('livewire.teacher-workshop-participant.teacher-workshop-participant', compact('participants'));
    }
}
