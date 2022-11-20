<?php

namespace App\Http\Livewire\Suggestion;

use App\Models\Employee;
use App\Models\Suggestion;
use App\Models\User;
use Livewire\Component;

class SuggestionList extends Component
{
    public $search;
    public $user = null;
    public $employe = null;
    public $employee = null;
    public $selectedSuggession = null;
    protected $listeners = ['edit'];
    public function edit(Suggestion $suggession)
    {
        $this->selectedSuggession = $suggession;
    }
    public function showForLogedInUser()
    {
        $condition=null;
        if(auth()->user()->role=="teacher"){
            $condition=auth()->user()->id;
        }else if(auth()->user()->role=="employee"){
            $condition=auth()->user()->id;
        }
        return Suggestion::with('suggestionable')
            ->whereHasMorph('suggestionable', [User::class], function ($query) use($condition){
                $query->where('suggestionable_id', $condition);
            })
            ->when($this->search,function($query){
                    $query->where('title','like',"%{$this->search}%");
            })
            ->latest('id')
            ->get();
    }

    public function showForEmployee()
    {
        $this->employe = auth()->user()->employee->id;
        $this->employee = Employee::findOrFail(1)->get();
        return Suggestion::with('suggestionable')
            ->whereHasMorph('suggestionable', [Employee::class], function ($query) {
                $query->where('suggestionable_id', $this->employe);
            })
         ->latest('id')
        ->get();
    }

    public function showForAdmin()
    {
        return Suggestion::whereHasMorph('suggestionable', [User::class], function ($suggestionable) {
            $suggestionable->where('role', 'teacher');
        })
            ->latest('id')
            ->get();
    }
    public function render()
    {

        // dd($this->showForAdmin());
        $suggessions = null;
        if (auth()->user()->role == "admin" || auth()->user()->role == "supperAdmin") {
            $suggessions = $this->showForAdmin();
            // dd($suggessions);
        } else if (auth()->user()->role == "teacher" OR auth()->user()->role == "employee") {
            $suggessions = $this->showForLogedInUser();
        } 
        // dd($suggessions);
        return view('livewire.suggestion.suggestion-list', compact('suggessions'));
    }
}
