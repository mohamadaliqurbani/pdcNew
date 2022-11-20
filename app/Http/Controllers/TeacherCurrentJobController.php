<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCurrentJobRequest;
use App\Models\TeacherCurrentJob;
use App\Models\TeacherInfo;
use Illuminate\Http\Request;

class TeacherCurrentJobController extends Controller
{
    public function create(TeacherInfo $teacherInfo)
    {
        return view('teacherCurrentJob.create', compact('teacherInfo'));
    }

    public function store(TeacherCurrentJobRequest $request, TeacherInfo $teacherInfo)
    {
        // dd($teacherInfo);
        $data = $request->validated();
        $teacherInfo->teacherCurrentJob()->create($data);
        return redirect(route('teacher.show', $teacherInfo->user))
        ->with('message','  ثبت معلومات وظیفه فعلی استاد موفقانه صورت گرفت');
    }

    public function edit(TeacherCurrentJob $teacherCurrentJob)
    {
        return view('teacherCurrentJob.edit', compact('teacherCurrentJob'));
    }

    public function update(TeacherCurrentJobRequest $request, TeacherCurrentJob $teacherCurrentJob)
    {
        
        $data=$request->validated();
        // dd($data);
        $teacherCurrentJob->update($data);
        return redirect(route('teacher.show', $teacherCurrentJob->teacherInfo->user))
        ->with('message',' بروز رسانی معلومات وظیفه فعلی استاد موفقانه صورت گرفت');
    }

    public function destory(Request $request){
        // dd($request->teacherCurrentJobId);
        $teacherCurrentJob=TeacherCurrentJob::findOrFail($request->teacherCurrentJobId);
        $teacherCurrentJob->delete();
        return redirect(route('teacher.show', $teacherCurrentJob->teacherInfo->user))
        ->with('deletemessage',' حذف کردن معلومات وظیفه فعلی استاد موفقانه صورت گرفت');
    }
}
