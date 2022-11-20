<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherReviewRequest;
use App\Models\TeacherInfo;
use App\Models\TeacherReview;
use Illuminate\Http\Request;

class TeacherReviewController extends Controller
{
    public function create(TeacherInfo $teacherInfo){
        return view('teacherReview.create',compact('teacherInfo'));
    }

    public function store(TeacherReviewRequest $request,TeacherInfo $teacherInfo){
        $data= $request->validated();
        $teacherInfo->teacherReview()->create($data);
        return redirect(route('teacher.show',$teacherInfo->user))
        ->with('message','ثبت معلومات ارزیابی اجراآت موفقانه بود')
        ;
    }

    public function edit(TeacherReview $teacherReview){
        return view('teacherReview.edit',compact('teacherReview'));
    }

    public function update(TeacherReviewRequest $request,TeacherReview $teacherReview){
        $data= $request->validated();
        $teacherReview->update($data);
        return redirect(route('teacher.show',$teacherReview->teacherInfo->user))
        ->with('message','بروز رسانی معلومات ارزیابی اجراآت موفقانه بود');
    }

    public function destroy(Request $request){
        // dd($request->teacherReviewId);
        $teacherReview=TeacherReview::findOrFail($request->teacherReviewId);
        $teacherReview->delete();
        return redirect(route('teacher.show',$teacherReview->teacherInfo->user))
        ->with('deletemessage','حذف کردن  معلومات ارزیابی اجراآت موفقانه بود');
    }
}
