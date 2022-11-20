<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopGraphReportController extends Controller
{
    public function month(){
        return view('workShopGraphies.Monthly');
    }

    public function year(){
        return view('workShopGraphies.Yearly');
    }

    public function noneGraphMonthlyReport(){
        return view('workShopNoneGraphies.noneGraphMonthlyReport');
    }

    public function noneGraphYearlyReport(){
        return view('workShopNoneGraphies.noneGraphYearlyReport');
    }
}