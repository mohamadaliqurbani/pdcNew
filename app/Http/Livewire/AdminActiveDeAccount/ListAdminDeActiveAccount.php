<?php

namespace App\Http\Livewire\AdminActiveDeAccount;

use App\Models\User;
use Livewire\Component;

class ListAdminDeActiveAccount extends Component
{
    public $search;
    public $deletedUser;
    protected $listeners=['fetchToRestore'];
    public function fetchToRestore($user){
        // dd
        $this->deletedUser=User::onlyTrashed()->findOrFail($user);
    
    }
    public function restore(){
        // dd($this->deletedUser);
        $this->deletedUser->restore();
    }
    public function render()
    {
        $users=User::onlyTrashed()->where('role','admin')
        ->when($this->search,function($user){
            $user->where(function($user){
                $user->where('name','like',"%{$this->search}%")
                ->orWhere('lname','like',"%{$this->search}%")
                ->orWhere('email','like',"%{$this->search}%");
            });
        })
        ->get();
        return view('livewire.admin-active-de-account.list-admin-de-active-account',compact('users'));
    }
}
