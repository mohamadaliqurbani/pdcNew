<?php

namespace App\Http\Livewire\TeacherDeActiveAccount;

use App\Models\User;
use Livewire\Component;

class ListTeacherDeActiveAccount extends Component
{
    public $search;
    public $restoreUser=null;
    protected $listeners=['fetchToRestore'];
    public function fetchToRestore( $user){
        $this->restoreUser=$user;
    }
    public function restore(){
        $user = User::onlyTrashed()->findOrFail($this->restoreUser);
        $user->restore();
    }
    public function render()
    {
        $users = User::where('role', 'teacher')
            ->onlyTrashed()
            ->when($this->search, function ($user) {
                $user->where(function ($user) {
                    $user->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhereHas('teacherInfo.department', function ($department) {
                            $department->where('name', 'like', "%{$this->search}%");
                        });
                });
            })
            ->get();
        return view('livewire.teacher-de-active-account.list-teacher-de-active-account', compact('users'));
    }
}
