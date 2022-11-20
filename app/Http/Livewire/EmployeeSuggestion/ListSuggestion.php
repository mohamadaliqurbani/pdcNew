<?php

namespace App\Http\Livewire\EmployeeSuggestion;

use App\Models\Suggestion;
use App\Models\User;
use Livewire\Component;

class ListSuggestion extends Component
{

    public function render()
    {
        $suggessions=    Suggestion::whereHasMorph('suggestionable', [User::class], function ($suggestionable) {
            $suggestionable->where('role', 'employee');
        })
            ->latest('id')
            ->get();
        return view('livewire.employee-suggestion.list-suggestion',compact('suggessions'));
    }
}
 