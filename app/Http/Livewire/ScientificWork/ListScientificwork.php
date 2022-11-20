<?php

namespace App\Http\Livewire\ScientificWork;

use App\Models\Employee;
use App\Models\scientificWork;
use App\Models\User;
use Livewire\Component;

class ListScientificwork extends Component
{

    public function render()
    {
        $Model=null;
        $Admin=null;
        $condition=null;
        if(auth()->user()->role=='teacher'){
            $Model=User::class;
            $condition=auth()->user()->id;
        }elseif(auth()->user()->role=='employee'){
            $Model=Employee::class;
            $condition=auth()->user()->employee->id;

        }
        $scientificWorks=scientificWork::whereHasMorph('scientificable',[User::class],function($query)use($condition){
            $query->where('scientificable_id',auth()->user()->id);
        })
        ->latest('id')
        ->get();
        return view('livewire.scientific-work.list-scientificwork',compact('scientificWorks'));
    }
}
