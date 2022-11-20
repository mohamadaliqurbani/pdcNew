<?php

namespace App\Http\Controllers;

use App\Models\WorkShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class landScapeController extends Controller
{
    public function index(){
        // dd($_SERVER['SERVER_ADDR']);
        // $workShop=WorkShop::where('is_present',0)->latest('id')->limit(1)->get();

       $workShop=DB::table('work_shops')->where('is_present',0)->latest('id')->limit(1)->get();
    //    dd($workShop);
        return view('landing',compact('workShop'));
    }
}
