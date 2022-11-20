<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherSericeDurationRequest;
use App\Models\TeacherInfo;
use App\Models\TeacherServicesDuration;
use Illuminate\Http\Request;

class TeacherServicesDurationController extends Controller
{
     public function create(TeacherInfo $teacherInfo)
     {
          return view('teacherServiceDuration.create', compact('teacherInfo'));
     }
     public function store(TeacherSericeDurationRequest $request, TeacherInfo $teacherInfo)
     {
          $data = $request->validated();
          $teacherInfo->teacherServiceDuration()->create($data);
          return redirect(route('teacher.show', $teacherInfo->user))
               ->with('message', 'ثبت ادوار خدمت موفقانه بود');
     }

     public function edit(TeacherServicesDuration $teacherServicesDuration)
     {
          //    dd($teacherServicesDuration);
          return view('teacherServiceDuration.edit', compact('teacherServicesDuration'));
     }

     public function update(TeacherSericeDurationRequest $request, TeacherServicesDuration $teacherServicesDuration)
     {
          $data = $request->validated();
          $teacherServicesDuration->update($data);
          return redirect(route('teacher.show', $teacherServicesDuration->teacherInfo->user))
               ->with('message', 'بروز رسانی ادوار خدمت موفقانه بود');
     }

     public function destroy(Request $request)
     {
          // dd($request->teacherServiceDurationId);
          $teacherServicesDuration = TeacherServicesDuration::findOrFail($request->teacherServiceDurationId);
          $teacherServicesDuration->delete();
          return redirect(route('teacher.show', $teacherServicesDuration->teacherInfo->user))
          ->with('deletemessage', 'حذف کردن  ادوار خدمت موفقانه بود');
     }
}
