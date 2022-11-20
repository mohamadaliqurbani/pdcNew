<?php

namespace App\Http\Livewire\Teacher;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherList extends Component
{
    use WithPagination;
    public $search;
    // computed property 
    public function getUsersProperty()
    {
        return User::query()
            ->with('teacherInfo')

            ->when($this->search, function ($user) {
                $user->where(function($user){
                    $user->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ;

                });
                })
                ->withTrashed()
                ->latest('id')
                ->where('role','teacher')
                ->where('isCompelete',1)
                ->paginate(20);
    }
    public function render()
    {
        $users = $this->users;
        return view('livewire.teacher.teacher-list', compact('users'));
    }
}
