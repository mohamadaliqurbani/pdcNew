<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
    public function index(){
        return view('employee');
    }
    public function participate(){
        $employee=auth()->user()->employee;
        return view('employeeWorkShopReports.employeeWorkshopParticipate',compact('employee'));
    }
    public function present(){
        $employee=auth()->user()->employee;
        return view('employeeWorkShopReports.employeeWorkShopPresent',compact('employee'));
    }
}
