<?php

namespace App\Http\Livewire\TeacherActiveAccount;

use App\Models\User;
use Livewire\Component;

class ListTeacherAcctiveAccount extends Component
{

    public $search;
    public $userDelete=null;
    protected $listeners=['delete'];
    public function delete(User $user){
        $this->userDelete=$user;
        // dd($this->user);
    }
    // computed propery
    public function getUsersProperty()
    {
        return User::with(['teacherInfo', 'teacherInfo.departmentOfTeacher'])
        ->where('isCompelete', 1)
        ->where('role','teacher')
            ->when($this->search, function ($user) {
                $user->where('name', "like", "%{$this->search}%")
                    ->where('email', "like", "%{$this->search}%")
                    ->orWhereHas('teacherInfo.departmentOfTeacher',function($departmentOfTeacher){
                        $departmentOfTeacher->where('name','like',"%{$this->search}%");
                    });
            })
            ->get();
    }
    public function render()
    {
        $users = $this->users;
        return view('livewire.teacher-active-account.list-teacher-acctive-account', compact('users'));
    }
}
