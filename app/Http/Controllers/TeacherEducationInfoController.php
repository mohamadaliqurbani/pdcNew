<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherEductionInfoRequest;
use App\Models\TeacherEducationInfo;
use App\Models\TeacherInfo;
use Illuminate\Http\Request;

class TeacherEducationInfoController extends Controller
{
    public function create(TeacherInfo $teacherInfo){
        return view('teacherEductionInfo.create',compact('teacherInfo'));
    }
    public function store(TeacherEductionInfoRequest $request,TeacherInfo $teacherInfo){
        // dd($teacherInfo);
        $data=$request->validated();
        $teacherInfo->teacheEdictionInfo()->create($data);
        return redirect(route('teacher.show', $teacherInfo->user));
    }
    public function edit(TeacherEducationInfo $teacherEducationInfo){
        return view('teacherEductionInfo.edit',compact('teacherEducationInfo'));
    }
    public function update(TeacherEductionInfoRequest $request,TeacherEducationInfo $teacherEducationInfo){
        $data=$request->validated();
        $teacherEducationInfo->update($data);
        return redirect(route('teacher.show', $teacherEducationInfo->teacherInfo->user))
        ->with('message','بروز رسانی معلومات تحصلی استاد موفقانه صورت گرفت');
    }

    public function destroy(Request $request){
        // dd($request->teacheEdictionInfoId);
        $teacherEducationInfo=TeacherEducationInfo::findOrFail($request->teacheEdictionInfoId);
        $teacherEducationInfo->delete();
        return redirect(route('teacher.show', $teacherEducationInfo->teacherInfo->user))
        ->with('deletemessage','حذف کردن معلومات تحصلی استاد موفقانه صورت گرفت');
    }
}

