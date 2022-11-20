<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Participant;
use App\Models\TeacherInfo;
use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(WorkShop $workshop)
    {

        return view('workshopParticipantPresentor.index', compact('workshop'));
    }
// adding teacher as participants;
    public function teacherInfo(Request $request, WorkShop $workShop)
    {
        // dd("teacher");
        if ($request->teacher_id != null) {
            foreach ($request->teacher_id as $key => $teacherInfoId) {
                $user=User::findOrFail($teacherInfoId);
                Participant::create(['work_shop_id'=>$workShop->id,'user_id'=>$user->id]);
                // $user->participants()->create();
            }
            return back()->with('message','افزودن اشتراک کننده از بخش استادان موفقانه صورت گرفت.');
        }
    }
    // adding employee as participants
    public function employee(Request $request,WorkShop $workShop){
        if($request->employee_id!=null){
            // dd($request->employee_id);
            foreach ($request->employee_id as $key => $employeeId) {
                // $employee=User::findOrFail($employeeId);
                // $employee->participants()->create(['work_shop_id'=>$workShop->id,'user_id'=>$employee->user->id]);
                $employee=Employee::findOrFail($employeeId);
                Participant::create(['work_shop_id'=>$workShop->id,'user_id'=>$employee->user->id]);
            }
            return back()->with('message','افزودن اشتراک کننده از بخش کارمندان موفقانه صورت گرفت.');

        }
    }

    // when a loged in user when to participate to workshop this singleParticipant will be called
    public function singleParticipant(WorkShop $workShop){
        // dd($workShop->id);
        Participant::create
        (
            [
                'work_shop_id'=>$workShop->id,
                'user_id'=>auth()->user()->id
            ]
        );
        // $workShop->participant()->create(['user_id',auth()->user()->id]);
        return back();
    }
}
