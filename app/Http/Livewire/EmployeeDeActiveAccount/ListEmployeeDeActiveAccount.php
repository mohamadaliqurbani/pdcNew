<?php

namespace App\Http\Livewire\EmployeeDeActiveAccount;

use App\Models\User;
use Livewire\Component;

class ListEmployeeDeActiveAccount extends Component
{
    public $search;
    public $restoreUser;
    protected $listeners=['fetchToRestore'];
    public function fetchToRestore( $user){
        $this->restoreUser=$user;
    }
    public function restore(){
        // dd($this->restoreUser);
        $user = User::onlyTrashed()->findOrFail($this->restoreUser);
        $user->restore();
    }



    public function render()
    {
        $users = User::where('role', 'employee')
            ->when($this->search, function ($user) {
                $user->where(function ($user) {
                    $user->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->onlyTrashed()
            ->get();
        return view('livewire.employee-de-active-account.list-employee-de-active-account', compact('users'));
    }
}
