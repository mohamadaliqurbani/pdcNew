<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    
   use WithPagination;
   public $search;
   
   public function getEmployeesProperty(){
       return Employee::with('user')
       ->when($this->search,function($employee){
           $employee->where("jop_posistion","like","%{$this->search}%")
           ->orWhere("emp_phone","like","%{$this->search}%")
           ->orWhere("education_degree","like","%{$this->search}%")
           ->orWhereHas('user',function($user){
               $user->where(function($user){
                   $user->where('name','like',"%{$this->search}%")
                   ->orWhere('lname','like',"%{$this->search}%")
                   ->orWhere('email','like',"%{$this->search}%")
                   ;
               });
           })
           ;
       })
       ->latest('id')
       ->paginate(20);
   }
    public function render()
    {
        $employees=$this->employees;
        return view('livewire.employee.employee-list',compact('employees'));
    }
}
