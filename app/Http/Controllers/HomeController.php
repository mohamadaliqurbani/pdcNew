<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allteachers=User::where('role','teacher')->count();
        $allemployeeis=User::where('role','employee')->count();
        $workshops=WorkShop::where('is_present',1)->count();
        return view('home',compact('allteachers','allemployeeis','workshops'));
    }

    public function adminAccount(){
        return view('admin.register');
    }

}
