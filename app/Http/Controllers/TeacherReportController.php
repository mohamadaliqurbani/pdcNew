<?php

namespace App\Http\Controllers;

use App\Models\TeacherInfo;

class TeacherReportController extends Controller
{
    public function index(TeacherInfo $teacherinfo){
        // dd($teacherinfo->user->deleted_at);
        return view('teacherWorkshopReport.report',compact('teacherinfo'));
      
    }
}
