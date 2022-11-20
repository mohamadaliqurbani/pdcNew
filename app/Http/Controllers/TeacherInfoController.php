<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherInfoRequest;
use App\Http\Requests\TeacherInfoUpdateRequest;
use App\Models\Department;
use App\Models\DepartmentOfTeacher;
use App\Models\TeacherInfo;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TeacherInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function create(User $user)
    {
        $departments = Department::latest('id')->get();
        return view('teacherInfo.create',compact('departments','user'));
    }

    public function store(TeacherInfoRequest $teacherInfoRequest, User $user){
       DB::beginTransaction();
        $data=$teacherInfoRequest->validated();
        // dd($data);
        $teacherInfo=$user->teacherInfo()->create($data);
        $data=$teacherInfoRequest->validate(['department_id'=>'required']);
     
        if($teacherInfoRequest->department_id==null){
            DB::rollBack();
        }else{
            $teacherInfo->departmentOfTeacher()->create(['department_id'=>$teacherInfoRequest->department_id]);
            $user->isCompelete=true;
            $user->save();
            DB::commit();
        }
        return redirect(route('teacher.index'))->with('message','معلومات اولیه استاد انتخاب شده تکمیل شد');

        // remain message
    }
    public function edit(TeacherInfo $teacherInfo){
        $departments = Department::latest('id')->get();

       return view('teacherInfo.edit',compact('teacherInfo','departments'));
    }

    public function update(TeacherInfoUpdateRequest $teacherInfoUpdateRequest ,TeacherInfo $teacherInfo){
        $data = $teacherInfoUpdateRequest->validated();
       
        $teacherInfo->update($data);
        if($teacherInfo->departmentOfTeacher!=null){

            if($teacherInfo->departmentOfTeacher->department_id!==$teacherInfoUpdateRequest->department_id){
                $teacherInfo->departmentOfTeacher()->update(['department_id'=>$teacherInfoUpdateRequest->department_id]);
            }
        }else{
            $teacherInfo->departmentOfTeacher()->create(['department_id'=>$teacherInfoUpdateRequest->department_id]); 
        }
        
        return redirect(route('teacher.show',$teacherInfo->user));

    }
}
