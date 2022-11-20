<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher');
    }
    public function dasbhoard()
    {
      
        return view('teacher');
    }

    public function participate(){
      
        $teacherinfo=auth()->user()->teacherInfo==null?'':auth()->user()->teacherInfo;
        $teacherinfo=auth()->user()->teacherInfo;
        return view('teacherWorkShopReports.teacherWorkShopParticipate',compact('teacherinfo'));
    }
    public function present(){
      
        $teacherinfo=auth()->user()->teacherInfo==null?'':auth()->user()->teacherInfo;
        return view('teacherWorkShopReports.teacherWorkShopPresent',compact('teacherinfo'));
    }
}
