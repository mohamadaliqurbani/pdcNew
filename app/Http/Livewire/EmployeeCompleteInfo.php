<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeCompleteInfo extends Component
{
    use WithPagination;
    public $search;
    // computed property 
    public function getUsersProperty()
    {
        return User::where('role', 'employee')
            ->where('isCompelete',0)
            ->when($this->search, function ($user) {
                $user->where(function($user){

                    $user->where('name', 'like', "%{$this->search}%")
                    ->orWhere('lname', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
                    
                });
            })
            ->latest('id')
            ->paginate(20);
    }
    public function render()
    {
        $users=$this->users;
        return view('livewire.employee-complete-info',compact('users'));
    }
}
