<?php

namespace App\Http\Livewire\WorkShopnoneGraphReport;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NoneGraphYearlyReport extends Component
{

    public function render()
    {
        $yearlyWorkshops = DB::table('work_shops')
        ->selectRaw('count(id) as totalworkshop ,year(present_date) as year')
      
        ->groupByRaw('year')
        ->paginate(10);
        return view('livewire.work-shopnone-graph-report.none-graph-yearly-report' ,compact('yearlyWorkshops'));
    }
}
