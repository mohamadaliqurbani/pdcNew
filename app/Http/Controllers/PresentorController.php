<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TeacherInfo;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class PresentorController extends Controller
{
    public function teacherInfo(Request $request, WorkShop $workShop)
    {
        // dd($request->teacher_id);

        if ($request->teacher_id != null) {
            foreach ($request->teacher_id as $key => $teacherInfoId) {

                $teacherInfo = TeacherInfo::findOrFail($teacherInfoId);
                $teacherInfo = $teacherInfo->presentors()->create(['work_shop_id' => $workShop->id]);
            }
            return back()->with('message', 'افزودن ارایه  از بخش استادان موفقانه صورت گرفت.');
        }
    }
    // 

    public function employee(Request $request, WorkShop $workShop)
    {
        // dd($request->employee_id);
        if ($request->employee_id != null) {
            foreach ($request->employee_id as $key => $employeeId) {

                $employee = Employee::findOrFail($employeeId);
                // $Employee = $teacherInfo->presentors()->create(['work_shop_id' => $workShop->id]);
                $employee = $employee->presentors()->create(['work_shop_id' => $workShop->id]);
            }
            return back()->with('message', 'افزودن ارایه  از بخش کارمندان موفقانه صورت گرفت.');
        } else {
            return "please select a record";
        }

       
    }
}
