<?php

namespace App\Http\Livewire\EmployeeActiveAccount;

use App\Models\User;
use Livewire\Component;

class ListEmployeeActiveAccount extends Component
{
    public $search;
    public $userDelete;
    protected $listeners=['fetchToDelete'];
    public function fetchToDelete(User $user){
        $this->userDelete=$user;
    }
    public function delete(){
        $this->userDelete->delete();
    }
    public function render()
    {
        $users = User::when($this->search, function ($user) {
            $user->where(function ($user) {
                $user->where("name", "like", "%{$this->search}%")
                    ->orWhere("lname", "like", "%{$this->search}%")
                    ->orWhere("email", "like", "%{$this->search}%");
            });
        })
            ->where('role', "employee")
            ->get();
        return view('livewire.employee-active-account.list-employee-active-account', compact('users'));
    }
}
