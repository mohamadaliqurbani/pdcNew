<?php

namespace App\Http\Controllers;

use App\Models\scientificWork;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherScientificWork extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('teacherScientificWork.index');
    }

    public function employeeIndex(){
        return view('EmployeeScientificWork.index');
    }
    public function show($user)
    {
        // dd($scientificwork->scientificable->id);
      

    //    $scientifi= $scientificwork->whereHashMoph('scientificable',[User::class],function($query)use($id){
    //         $query->where('scientificable_id',$id) ;
    //     });
    //     dd($scientifi);
        $scientificworks=scientificWork::whereHasMorph('scientificable',[User::class],function($query)use($user){
            $query->where('scientificable_id',$user) ;
        })
        
        ->get();
        // dd($scientificworks);
        // dd("sdsak");

        // $user->load('scientificWork');
        // /*
        //     dd(scientificWork::whereHasMorph('scientificable',[User::class],function($query)use($user){
        //         $query->where('scientificable_id',$user->id);
        //     })->get());
        // */
        return view('scientificWork.show', compact('scientificworks'));
    }
}
