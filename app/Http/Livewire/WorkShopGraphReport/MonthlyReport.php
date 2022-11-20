<?php

namespace App\Http\Livewire\WorkShopGraphReport;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MonthlyReport extends Component
{

    public  $fullyears;
    public  $workshops;

    public function mount()
    {
        $fullyears = DB::table('work_shops')
            ->selectRaw('count(id) as totalworkshop ,monthname(present_date) as month')
            ->whereYear('present_date',Carbon::now()->year)
            ->groupByRaw('month')
            ->get();

        $year = array();
        $workshop = array();
        foreach ($fullyears as $key => $value) {
            array_push($year, $value->month);
        }

        $this->fullyears = $year;

        foreach ($fullyears as $key => $value) {
            array_push($workshop, $value->totalworkshop);
        }
        $this->workshops = $workshop;



    }
    public function render()
    {

        return view('livewire.work-shop-graph-report.monthly-report');
    }
}
