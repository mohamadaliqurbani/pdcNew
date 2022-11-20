<?php

namespace App\Http\Controllers;

use App\Mail\SendDemoMail;
use App\Models\Employee;
use App\Models\TeacherInfo;
use App\Models\WorkShop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AwearnessController extends Controller
{
    public function index(WorkShop $workshop)
    {
        // dd($workshop);
        return view('awearness.index', compact('workshop'));
    }

    public function teacher(Request $request, WorkShop $workshop)
    {
        $Message = null;
        // dd($request->teacherinfo_id);
        $maildata = [
            'title' => 'آگاهی برگذاری ورکشاپ از طرف مرکز انکشاف مسلکی',
            'workShopTitle' => $workshop->title,
            'id'=>$workshop->id

        ];
        if ($request->teacherinfo_id != null) {
            foreach ($request->teacherinfo_id as $key => $teacherInfoId) {
                $teacherInfo = TeacherInfo::findOrFail($teacherInfoId);
                // dd($teacherInfo->user->email);
                try {
                    Mail::to($teacherInfo->user->email)->send(new SendDemoMail($maildata));
                    $teacherInfo->awearness()->create(['work_shop_id' => $workshop->id]);
                    $Message='اطلاع رسانی موفقانه صورت گرفت';
                } catch (Exception $e) {
                    $Message = $e->getMessage();
                }
            }
        }
     
        return back()->with('message',$Message);
    }

    public function employee(Request $request, WorkShop $wokrshop)
    {
        $Message = null;
        // dd($request->teacherinfo_id);
        $maildata = [
            'title' => 'آگاهی برگذاری ورکشاپ از طرف مرکز انکشاف مسلکی',
            'workShopTitle' => $wokrshop->title,
            'description' => $wokrshop->description,

        ];
        if ($request->employee_id != null) {
            foreach ($request->employee_id as $key => $employee_id) {
                $employee = Employee::findOrFail($employee_id);
                try {
                    Mail::to($employee->user->email)->send(new SendDemoMail($maildata));
                    $employee->awearness()->create(['work_shop_id' => $wokrshop->id]);
                    $Message='اطلاع رسانی موفقانه صورت گرفت';
                } catch (Exception $e) {
                    $Message = $e->getMessage();
                }
            }
        }
    
        return back()->with('message',$Message);
    }
}
