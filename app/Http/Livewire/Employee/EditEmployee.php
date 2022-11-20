<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\User;
use Livewire\Component;

class EditEmployee extends Component
{
    public $user;
    public function mount()
    {
        $this->user = User::findOrfail($this->user);
        
    }
    public function render()
    {
        return view('livewire.employee.edit-employee');
    }
}
