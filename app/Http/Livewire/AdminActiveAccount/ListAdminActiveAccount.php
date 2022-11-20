<?php

namespace App\Http\Livewire\AdminActiveAccount;

use App\Models\User;
use Livewire\Component;

class ListAdminActiveAccount extends Component
{
    public $search;

    protected $listeners=["fetchToDelete"];

    public $userToDelete;
    public function fetchToDelete(User $user){
        $this->userToDelete=$user;
    }
    public function delete(){
        $this->userToDelete->delete();
    }
    public function render()
    {
        $users=User::where('role','admin')
        ->when($this->search,function($user){
            $user->where(function($user){
                $user->where('name','like',"%{$this->search}%")
                ->orWhere('lname','like',"%{$this->search}%")
                ->orWhere('email','like',"%{$this->search}%");
            });
        })
        ->get();
        return view('livewire.admin-active-account.list-admin-active-account' ,compact('users'));
    }
}
