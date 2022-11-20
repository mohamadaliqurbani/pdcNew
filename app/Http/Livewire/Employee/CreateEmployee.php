<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class CreateEmployee extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.employee.create-employee');
    }
}
