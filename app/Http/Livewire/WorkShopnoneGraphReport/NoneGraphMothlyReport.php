<?php

namespace App\Http\Livewire\WorkShopnoneGraphReport;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NoneGraphMothlyReport extends Component
{
    public function render()
    {

        $monthlyWorkshops = DB::table('work_shops')
            ->selectRaw('count(id) as totalworkshop ,monthname(present_date) as month')
            ->whereYear('present_date', Carbon::now()->year)
            ->groupByRaw('month')
            ->paginate(10);
        return view('livewire.work-shopnone-graph-report.none-graph-mothly-report', compact('monthlyWorkshops'));
    }
}
