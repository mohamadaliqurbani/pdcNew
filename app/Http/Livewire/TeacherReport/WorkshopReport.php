<?php

namespace App\Http\Livewire\TeacherReport;

use App\Models\scientificWork;
use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class WorkshopReport extends Component
{

    public $teacherinfo;

    // public function mount(){
    //     $workshop = WorkShop::with('participant')
    //     ->whereHas('participant',function($participant){
    //         $participant->where('participantable_type','=','App\Models\TeacherInfo')
    //         ->where('participantable_id','=',$this->teacherinfo->id);
    //     })->get();
    //     dd($workshop);
    // }
    public function render()
    {

        // dd($this->teacherinfo->deActivedUser);
        $id=null;
        $this->teacherinfo->user==null?$id=$this->teacherinfo->deActivedUser->id:$id=$this->teacherinfo->user->id;
        // dd($id);
        $scientificworks=scientificWork::whereHasMorph('scientificable',[User::class],function($query)use($id){
            $query->where('scientificable_id',$id) ;
        })
        
        ->get();
       
        // dd($scientificworks);
        return view('livewire.teacher-report.workshop-report',compact('scientificworks'));
    }
}
