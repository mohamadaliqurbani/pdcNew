<?php

namespace App\Http\Livewire\TeacherCompeleteInfo;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Compelete extends Component
{
    use WithPagination;
    public $search;
    // computed property 
    public function getUsersProperty()
    {
        return User::where('role', 'teacher')
            ->when($this->search, function ($user) {
                $user->where(function($user){

                    $user->where('name', 'like', "%{$this->search}%")
                    ->orWhere('lname', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->where('isCompelete', 0)

            ->latest('id')
            ->paginate(20);
    }
    public function render()
    {
        $users = $this->users;
        return view('livewire.teacher-compelete-info.compelete', compact('users'));
    }
}
