<?php

namespace App\Http\Livewire\WorkshopParticipantPresentor;

use App\Models\Employee;
use App\Models\TeacherInfo;
use App\Models\User;
use App\Models\WorkShop;
use Livewire\Component;
use Livewire\WithPagination;

class ListParticipantOrPresentor extends Component
{
    use WithPagination;
    protected $employeesAsPresentor = [];
    protected $teachersAsPresentor = [];
    public $workshop;
    public $presentorSelectedTtype;
    public $participantSelectedType;
    public $showTeachers = false;
    public $showEmployees = false;
    public $showOutSide = false;
    public $teacherParticipant = false;
    public $employeeParticipant = false;
    public $search;
    // public function updatedSearch(){
    //     dd($this->search);
    // }
    public function fetchPresentor($type = 0, WorkShop $workshop)
    {
        $this->teacherParticipant = false;
        $this->employeeParticipant = false;
        $this->workshop = $workshop;
        $this->presentorSelectedTtype = $type;


        if ($type == 1) {
            $this->showTeachers = true;
            $this->showEmployees = false;
            $this->showOutSide = false;
        } else if ($type == 2) {
            $this->showEmployees = true;
            $this->showTeachers = false;
            $this->showOutSide = false;
        } else if ($type == 3) {
            $this->showTeachers = false;
            $this->showEmployees = false;
            $this->showOutSide = true;
        } else if ($type == 0) {
            $this->showEmployees = false;
            $this->showTeachers = false;
            $this->showOutSide = false;
        }

        // when the search input is out empty and the type is changing so we have to reset the search property
        $this->reset('search');
    }

    public function fetchParticipant($type = 0)
    {
        $this->showEmployees = false;
        $this->showTeachers = false;
        $this->showOutSide = false;
        $this->participantSelectedType = $type;
        if ($type == 't1') {
            $this->teacherParticipant = true;
            $this->employeeParticipant = false;
        } else if ($type == 'e2') {
            $this->teacherParticipant = false;
            $this->employeeParticipant = true;
        }
        $this->reset('search');
    }


    public function userTeacherToParticipate()
    {
    }
    // teacher info computed property
    public function getTeacherInfosProperty()
    {
        if ($this->participantSelectedType == 't1') {
            // dd("if block");
            return TeacherInfo::with('user', 'departmentOfTeacher')
                ->whereNotIn('user_id', function ($participant) {
                    $participant->select('user_id')->from('participants')
                        ->where('work_shop_id', $this->workshop->id);
                })
                ->when($this->search, function ($teacherInfo) {
                    // searching for user name ,last name,email via relationship in users entity
                    $teacherInfo->where('fname', 'like', "%{$this->search}%")
                    ->orWhere('phone', 'like', "%{$this->search}%")
                    ->orWhereHas('user', function ($user) {
                        $user->where('name', 'like', "%{$this->search}%")
                            ->orWhere('lname', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                        // searching for department name  via relationship in departments entity

                    });
                    // ->orWhereHas('departmentOfTeacher', function ($department) {
                    //     $department->where(function($department){

                    //         $department->where('name', "like", "%{$this->search}%");
                    //     });
                    //     // searching for father name,phone in teacherinfos department
                    // });
                })
                // ordering by in decs manar
                ->latest('id')
                // paginating by 20
                ->paginate(20);
        } else if ($this->presentorSelectedTtype == 1) {
            // dd("else block");
            return TeacherInfo::with('user', 'departmentOfTeacher')
                ->whereNotIn('id', function ($presentor) {
                    $presentor->select('presentorable_id')->from('presentors')
                        ->where('presentorable_type', 'App\Models\TeacherInfo')
                        ->where('work_shop_id', $this->workshop->id);
                })
                ->when($this->search, function ($teacherInfo) {
                    // searching for user name ,last name,email via relationship in users entity
                    $teacherInfo->whereHas('user', function ($user) {
                        $user->where('name', 'like', "%{$this->search}%")
                            ->orWhere('lname', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                        // searching for department name  via relationship in departments entity

                    })
                    ->orWhereHas('departmentOfTeacher', function ($department) {
                        $department->where('name', "like", "%{$this->search}%");
                        // searching for father name,phone in teacherinfos department
                    })
                    ->orWhere('fname', 'like', "%{$this->search}%")
                        ->orWhere('phone', 'like', "%{$this->search}%");
                })
                // ordering by in decs manar
                ->latest('id')
                // paginating by 20
                ->paginate(20);
        }
    }
    // employee computed property

    public function getEmployeesProperty()
    {
        if ($this->participantSelectedType == 'e2') {
            // dd("if block");
            return Employee::query()
                ->whereNotIn('user_id', function ($participant) {
                    $participant->select('user_id')->from('participants')
                        ->where('work_shop_id', $this->workshop->id);
                })
                ->when($this->search, function ($employee) {
                    $employee->where('jop_posistion', 'like', "%{$this->search}%")
                            ->orWhere('emp_phone', 'like', "%{$this->search}%")
                            ->orWhere('education_degree', 'like', "%{$this->search}%");
                   
                })
                ->latest('id')
                ->paginate(20);;
        } else if ($this->presentorSelectedTtype == 2) {

            
            return Employee::query()
                ->whereNotIn('id', function ($presentor) {
                    $presentor->select('presentorable_id')->from('presentors')
                        ->where('presentorable_type', 'App\Models\Employee')
                        ->where('work_shop_id', $this->workshop->id);
                })
                ->when($this->search, function ($employee) {
                    $employee->where('jop_posistion', 'like', "%{$this->search}%")
                        ->orWhere('emp_phone', 'like', "%{$this->search}%")
                        ->orWhereHas('user',function($user){
                            $user->where('name','like',"%{$this->search}%")
                            ->orWhere('lname', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%")
                            ;
                        })
                        ;
                })
                ->latest('id')
                ->paginate(20);;
        }
    }
    public function render()
    {

        $teacherInfos =  $this->teacherInfos;
        $employees = $this->employees;

        return view('livewire.workshop-participant-presentor.list-participant-or-presentor', compact('teacherInfos', 'employees'));
    }
}
