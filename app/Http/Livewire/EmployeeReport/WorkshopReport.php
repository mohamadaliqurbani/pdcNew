<?php

namespace App\Http\Livewire\EmployeeReport;

use App\Models\Employee;
use App\Models\scientificWork;
use App\Models\User;
use App\Models\WorkShop;
use Livewire\Component;

class WorkshopReport extends Component
{
    public $employee;
 
    public function render()
    {
        // dd($this->employee->id);
        $scientificWorks= scientificWork::whereHasMorph('scientificable',
        [User::class],function($query){
            $query->where('scientificable_id',$this->employee->user->id);
        })
        ->latest('id')
        ->get();
        // $id=null;
        // $this->teacherinfo->user==null?$id=$this->teacherinfo->deActivedUser->id:$id=$this->teacherinfo->user->id;
        // // dd($id);
        // $scientificWorks=scientificWork::whereHasMorph('scientificable',[User::class],function($query)use($id){
        //     $query->where('scientificable_id',$id) ;
        // })
        
        // ->get();
        return view('livewire.employee-report.workshop-report',compact('scientificWorks'));
    }
}
