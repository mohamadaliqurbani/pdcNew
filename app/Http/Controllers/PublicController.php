<?php

namespace App\Http\Controllers;

use App\Models\scientificWork;
use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function workshops(){

        $workshops=DB::table('work_shops')->where('is_present',0)->latest('id')->get();
    //    $workshops= WorkShop::where('is_present',0)->latest('id')->get();
        return view('workshop',compact('workshops'));
    }
    public function workshopShow(WorkShop $workShop){
        // dd($workShop->load('presentor.presentorable'));
        $workShop=$workShop->load(['presentor','presentor.presentorable','outSidePresentor']);
       return view('workshopShow',compact('workShop'));
    }

    public function allScientificWork(){
        // $scientificWorks=DB::table('scientific_works')
        // ->join('users','scientific_works.scientificable_id','users.id')
        // ->select('users.name','users.lname','users.image','users.id')
        // ->groupBy('scientificable_id')
        // ->latest('scientific_works.id')
        // ->get();
        $scientificWorks=DB::table('users')
        ->whereIn('id',function($scientificWork){
            $scientificWork->select('scientificable_id')->from('scientific_works');
        })
        ->select('users.name','users.lname','users.image','users.id')
        ->groupBy('id')
        ->get();
        return view('publicallScientificWork',compact('scientificWorks'));
    }

    public function user($user){
        $user=User::withTrashed()->findOrFail($user);
        return view('userScientificWork',compact('user'));
    }
}
