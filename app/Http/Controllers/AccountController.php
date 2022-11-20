<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }
  public function  teacherActive(){
      return view('teacherActive.index');
  }

  public function deActivting(User $user){
    DB::beginTransaction();

    $employee=Employee::where('user_id',$user->id);
    $employee->deleted_user=1;
    if($employee->save()){
      $user->delete();
      DB::commit();
    }else{
      DB::rollBack();
    }
    return back();
  }

  public function deActive(){
    return view('teacherDeActive.index');
  }
  public function employeeActive(){
    return view('employeeActive.index');
  }

  public function deActiveEmployee(){
    return view('employeeDeActive.index');
  }

  public function adminActive(){
    return view('adminActive.index');
  }
  public function adminDeActive(){
    return view('adminDeActive.index');
  }
}
