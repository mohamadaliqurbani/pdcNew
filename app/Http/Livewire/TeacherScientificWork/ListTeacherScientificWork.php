<?php

namespace App\Http\Livewire\TeacherScientificWork;

use App\Models\scientificWork;
use App\Models\User;
use Livewire\Component;

use function PHPSTORM_META\map;

class ListTeacherScientificWork extends Component
{
    public function render()
    {


        $users= User::where('role','teacher')->withTrashed()->whereIn('id',function($query){
            $query->select('scientificable_id')->from('scientific_works')
            ->where('scientificable_type','=','App\Models\User')
            ->groupBy('scientificable_id');
        })
      
        ->get();

        // $users=scientificWork::whereHasMorhp('scientificable',[User::class],function($scientificable){
        //     $scientificable->where('role','teacher');
        // })->withTrashed()->get();
      
        // $teacherScientificWorks=scientificWork::with('scientificable','scientificable.teacherInfo','scientificable.teacherInfo.department')
        // ->whereHasMorph('scientificable',[User::class])
        // ->get();
        return view('livewire.teacher-scientific-work.list-teacher-scientific-work',compact('users'));
    }
}
