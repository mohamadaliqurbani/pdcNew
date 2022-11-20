<?php

namespace App\Http\Livewire\TeacherWorkshopPresent;

use App\Models\WorkShop;
use Livewire\Component;

class TeacherWorkshopPresent extends Component
{
    public $teacherinfo;
    public function render()
    {
        $presents=[];
        if($this->teacherinfo!=null){
        
            $presents = WorkShop::whereHas('presentor', function ($present) {
                $present->where('presentorable_type', 'App\Models\TeacherInfo')
                ->where('presentorable_id', $this->teacherinfo->id);
            })->get();
        }
        return view('livewire.teacher-workshop-present.teacher-workshop-present',compact('presents'));
    }
}
