<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherJobTraindRequest;
use App\Models\TeacherInfo;
use App\Models\TeacherJobTrainde;
use Illuminate\Http\Request;
class TeacherJobTraindeController extends Controller
{
    public function create(TeacherInfo $teacherInfo)
    {
        return view('TeacherJobTraind.create', compact('teacherInfo'));
    }

    public function store(TeacherJobTraindRequest $request, TeacherInfo $teacherInfo)
    {
        $data = $request->validated();
        $teacherInfo->teacherJobTraind()->create($data);
        return redirect(route('teacher.show',$teacherInfo->user))
        ->with('message','ثبت آموزش های مسلکی مربوط به وظیفه استاد موفقانه بود');
    }
    public function edit(TeacherJobTrainde $teacherJobTrainde)
    {
        return view('TeacherJobTraind.edit', compact('teacherJobTrainde'));
    }
    public function update(TeacherJobTraindRequest $request, TeacherJobTrainde $teacherJobTrainde)
    {
        $data = $request->validated();
        $teacherJobTrainde->update($data);
        return redirect(route('teacher.show',$teacherJobTrainde->teacherInfo->user))
        ->with('message','بروز رسانی آموزش های مسلکی مربوط به وظیفه استاد موفقانه بود');
    }

    public function destroy(Request $request){
        // dd($request->teacherJobTraindId);
        $teacherJobTrainde=TeacherJobTrainde::findOrFail($request->teacherJobTraindId);
        $teacherJobTrainde->delete();
        return redirect(route('teacher.show',$teacherJobTrainde->teacherInfo->user))
        ->with('deletemessage','حذف کردن آموزش های مسلکی مربوط به وظیفه استاد موفقانه بود');
    }
}
