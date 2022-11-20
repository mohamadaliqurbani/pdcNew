<?php

namespace App\Http\Livewire\AllWorkshop;

use App\Models\WorkShop;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllWorkshop extends Component
{
    public $selectworkshop=null;
    public $search;
    protected $listeners=["signleworkShop"];
    public function signleworkShop($workshop){
        $this->selectworkshop=$workshop;
        // dd($this->workshop);
    }
    public function render()
    {
        // $workshop_id=null;
        // $teachers=DB::table('teachers')
        // ->join('users','users.id','teachers.id')
        // ->join('departements','departements.id','teachers.departement_id')
        // ->select("teachers.*",'users.name','users.email','departements.dep_name')
        
        //     ->whereNotIn('teachers.id',function($query)use($workshop_id){
        //         $query->select('participantable_id')->from('participants')
        //         ->where('workshop_id','=',$workshop_id);
        //     })
        // ->get();
    //     $workshops=DB::table('work_shops')
    //     ->select('work_shops.*')
    //     ->whereNotIn('work_shops.id',function($quer){
    //         $quer->select('work_shop_id')->from('participants')
    //         ->where('user_id','=',auth()->user()->id);
    //     })
    //     ->where('is_present',0)
    //    ->get();
        // dd($workshops);
        $workshops=WorkShop::where('is_present',0)->whereNotIn('id',function($participant){
            $participant->select('work_shop_id')->from('participants')
            ->where('user_id','=',auth()->user()->id);
        })
        ->when($this->search,function($workshop){
            $workshop->where(function($workshop){
                $workshop->where('title','like',"%{$this->search}%");
            });
        })
        ->get();

        
       
        return view('livewire.all-workshop.all-workshop',compact('workshops'));
    }
}
