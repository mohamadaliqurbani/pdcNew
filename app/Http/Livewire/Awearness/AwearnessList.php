<?php

namespace App\Http\Livewire\Awearness;

use App\Models\Employee;
use App\Models\TeacherInfo;
use App\Models\WorkShop;
use Livewire\Component;
use Livewire\WithPagination;

class AwearnessList extends Component
{
    use WithPagination;
    public $workshop;
    public $teachers = false;
    public $employee = false;
    public $search;


    public function fetchTeachers()
    {
        $this->teachers = true;
        $this->employee = false;
    }

    public function employees()
    {
        $this->employee = true;
        $this->teachers = false;
    }

    public function getTeacherInfosProperty()
    {
        return TeacherInfo::whereNotIn('id', function ($query) {
            $query->select('awearnesseable_id')->from('awearnesses')
                ->where('awearnesseable_type', 'App\Models\TeacherInfo')
                ->where('work_shop_id', $this->workshop->id);
        })
            ->with('user', 'departmentOfTeacher')
            ->when($this->search, function ($teacherInfos) {
                $teacherInfos->whereHas('user', function ($user) {
                    $user->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                })
                    // ->orWhereHas('departmentOfTeacher', function ($department) {
                    //     $department->where('name', "like", "%{$this->search}%");
                    // })
                    ->orWhere('fname', "like", "%{$this->search}%")
                    ->orWhere('phone', "like", "%{$this->search}%");
            })
            ->latest('id')
            ->paginate(20);
    }

    public function getEmployeesProperty()
    {
        return Employee::whereNotIn('id', function ($query) {
            $query->select('awearnesseable_id')->from('awearnesses')
                ->where('awearnesseable_type', 'App\Models\Employee')

                ->where('work_shop_id', $this->workshop->id);
        })
            ->when($this->search, function ($employee) {
              
                   
                    $employee->where('jop_posistion', 'like', "%{$this->search}%")
                    ->orWhere('emp_phone', 'like', "%{$this->search}%")
                    ->orWhere('education_degree', 'like', "%{$this->search}%")
                    ->orWHereHas('user',function($user){
                        $user->where('name','like',"%{$this->search}%")
                        ->orWhere('lname','like',"%{$this->search}%")
                        ->orWhere('email','like',"%{$this->search}%")
                      
                        ;
                    })
                   
                    ;
            })
            ->latest('id')
            ->paginate(20);
    }
    public function render()
    {
        $teacherInfos = null;
        $employees = null;
        if ($this->teachers) {
            $teacherInfos = $this->teacherInfos;
        } else if ($this->employee) {
            $employees = $this->employees;
        }

        return view('livewire.awearness.awearness-list', compact('teacherInfos', 'employees'));
    }
}
