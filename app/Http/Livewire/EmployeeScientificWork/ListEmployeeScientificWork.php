<?php

namespace App\Http\Livewire\EmployeeScientificWork;

use App\Models\Employee;
use App\Models\scientificWork;
use App\Models\User;
use Livewire\Component;

class ListEmployeeScientificWork extends Component
{
    public function render()
    {
        $users= User::where('role','employee')->withTrashed()->whereIn('id',function($query){
            $query->select('scientificable_id')->from('scientific_works')
            ->where('scientificable_type','=','App\Models\User')
            ->groupBy('scientificable_id');
        })
      
        ->get();


        // dd($users);
        return view('livewire.employee-scientific-work.list-employee-scientific-work',compact('users'));
    }
}
