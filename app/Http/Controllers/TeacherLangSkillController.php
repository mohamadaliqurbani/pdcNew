<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherLangSkillRequest;
use App\Models\TeacherInfo;
use App\Models\TeacherLangSkill;
use Illuminate\Http\Request;

class TeacherLangSkillController extends Controller
{
    public function create(TeacherInfo $teacherInfo)
    {
        return view('teacherLangSkill.create', compact('teacherInfo'));
    }
    public function store(TeacherLangSkillRequest $request, TeacherInfo $teacherInfo)
    {
        $data = $request->validated();
        $teacherInfo->teacherLangSKill()->create($data);
        return redirect(route('teacher.show', $teacherInfo->user))
            ->with('message', ' ثبت مهارت در زبان های بین المللی موفقانه بود');
    }

    public function edit(TeacherLangSkill $teacherLangSkill)
    {
        return view('teacherLangSkill.edit', compact('teacherLangSkill'));
    }

    public function update(TeacherLangSkillRequest $request, TeacherLangSkill $teacherLangSkill)
    {
        $data = $request->validated();
        $teacherLangSkill->update($data);
        return redirect(route('teacher.show', $teacherLangSkill->teacherInfo->user))
            ->with('message', 'بروز رسانی مهارت در زبان های بین المللی موفقانه');
    }
    public function destroy(Request $request){
        // dd($request->teacherLangSKillId);
        $teacherLangSkill=TeacherLangSkill::findOrFail($request->teacherLangSKillId);
        $teacherLangSkill->delete();
        return redirect(route('teacher.show', $teacherLangSkill->teacherInfo->user))
        ->with('deletemessage', 'حذف کردن مهارت در زبان های بین المللی موفقانه');
    }
}
