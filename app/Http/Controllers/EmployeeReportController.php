<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeReportController extends Controller
{
    public function index(Employee $employee){
        return view('employeeWorkshopReport.report',compact('employee'));
    }
}
