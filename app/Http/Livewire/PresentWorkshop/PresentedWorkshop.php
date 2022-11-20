<?php

namespace App\Http\Livewire\PresentWorkshop;

use App\Models\WorkShop;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class PresentedWorkshop extends Component
{

    use WithPagination;
    public $search;
    public $firstDate;
    public $secondDate;
    public $searchBetweenTwoDate = null;
    public function getWorkshopsProperty()
    {
        return WorkShop::query()
            ->when($this->search, function ($workshop) {
                $workshop->where('title', 'like', "%{$this->search}%")
                    ->orWhere('present_time', 'like', "%{$this->search}%")
                    ->orWhere('present_date', 'like', "%{$this->search}%");
            })
            ->latest('id')
            ->where('is_present', 1)
            ->whereYear('present_date', Carbon::now()->year)
            ->paginate(20);
        // ->get();
    }
    public function dateBetweenSearch()
    {
        $this->searchBetweenTwoDate = 'search';
        if ($this->firstDate !== null && $this->secondDate !== null) {
            // dd("dskfjs");
            return WorkShop::whereBetween('present_date', [$this->firstDate, $this->secondDate])
                // ->withCount('id')
                ->latest('id')
                ->paginate(20);
        } else {
            return [];
        }
    }
    public function render()
    {
        $workshops = null;
        if ($this->searchBetweenTwoDate != null) {
            $workshops = $this->dateBetweenSearch();
            // dd($workshop);
        } else {

            $workshops = $this->Workshops;
        }
        return view('livewire.present-workshop.presented-workshop', compact('workshops'));
    }
}
