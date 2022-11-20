<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRewardRequest;
use App\Models\TeacherInfo;
use App\Models\TeacherReward;
use Illuminate\Http\Request;

class TeacherRewardController extends Controller
{
    public function create(TeacherInfo $teacherInfo){
        return view('teacherReward.create',compact('teacherInfo'));
    }
    public function store(TeacherRewardRequest $request,TeacherInfo $teacherInfo){
        $data=$request->validated();
        $teacherInfo->teacherReward()->create($data);
        return redirect(route('teacher.show',$teacherInfo->user))
        ->with('message','ثبت مکافات و مجازات موفقانه بود');
    }
    public function edit(TeacherReward $teacherReward){
        return view('teacherReward.edit',compact('teacherReward'));
    }

    public function update(TeacherRewardRequest $request,TeacherReward $teacherReward){
        $data=$request->validated();
        $teacherReward->update($data);
        return redirect(route('teacher.show',$teacherReward->teacherInfo->user))
        ->with('message','بروز رسانی مکافات و مجازات موفقانه بود');

    }

    public function destroy(Request $request){
        // dd($request->teacherRewardId);
        $teacherReward=TeacherReward::findOrFail($request->teacherRewardId);
        $teacherReward->delete();
        return redirect(route('teacher.show',$teacherReward->teacherInfo->user))
        ->with('deletemessage','حذف کردن مکافات و مجازات موفقانه بود');
    }
}
