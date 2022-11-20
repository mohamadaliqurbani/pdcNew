<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AlpineController extends Controller
{
    public function index(){
        return view('alpine');
    }
    public function bk(){
        DB::unprepared('FLUSH TABLE WITH READ LOCK;');
        // return ":g";
        $bck= Artisan::call('backup:run',['--only-db'=>true]);
        DB::unprepared('UNLOCK TABLES');

        return redirect(route('home'))->with('message','بک اپ گیری دتیابیس سیستم موفقانه صورت گرفت');
    }
}
