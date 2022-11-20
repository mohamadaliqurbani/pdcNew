<?php

namespace App\Http\Livewire\WorkShopGraphReport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
class YearlyReport extends Component
{
    public  $fullyears;
    public  $workshops;

    public function mount()
    {
        $fullyears = DB::table('work_shops')
            ->selectRaw('count(id) as totalworkshop ,year(present_date) as year')
          
            ->groupByRaw('year')
            ->get();

        $year = array();
        $workshop = array();
        foreach ($fullyears as $key => $value) {
            array_push($year, $value->year);
        }

        $this->fullyears = $year;

        foreach ($fullyears as $key => $value) {
            array_push($workshop, $value->totalworkshop);
        }
        $this->workshops = $workshop;



    }
    public function render()
    {
        return view('livewire.work-shop-graph-report.yearly-report');
    }
}
