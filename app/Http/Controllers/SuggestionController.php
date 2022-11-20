<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        return view('suggestion.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required']);
     
        $request->user()->suggestion()->create($data);
        return redirect(route('suggestion.index'));
    }

    public function update(Request $request, Suggestion $suggestion)
    {
        $data = $request->validate(['title' => 'required']);
        $suggestion->update($data);
        return back();
    }

    public function suggestionEmployee(){
        return view('suggestion.employeeSuggestion');
    }
}
