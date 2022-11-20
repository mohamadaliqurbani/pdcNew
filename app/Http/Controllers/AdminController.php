<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function admin(){
       return view('auth.register');
   }
   public function employee(){
       return view('auth.register');
   }

   public function allWorkshop(){
      return view('AllWorkshop.index');
   }
}
