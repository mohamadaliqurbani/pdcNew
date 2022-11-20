<?php

namespace App\Http\Livewire\Collage;

use App\Models\Calloge;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class CollageList extends Component
{
    use WithPagination;
    public $search;
    public $calloge=null;
    public $data=[];
    public $callogeid=null;
    public $deleteMessage=null;
    protected $listeners = ['edit','delete'];
    public function edit(Calloge $calloge){
      $this->calloge=$calloge;
    }
    public function delete(Calloge $calloge){
        $this->callogeid=$calloge->id;
    }

    // create
    public function createCollage(){
        $validatedData=Validator::make($this->data,[
            "collage_name"=>'required|string|min:2'
        ],
        [
            'collage_name.required'=>'اسم پوهنحی را بنوسید!',
            'collage_name.string'=>'اسم پوهنحی  باید حروف باشد!',
            'collage_name.min'=>'اسم پوهنحی  باید بیشتر از یک حرف باشد!',

        ])->validate();
       Calloge::create($validatedData);
       $this->reset();
    }
    public function destory(Calloge $calloge){
       $calloge->delete();
       $this->reset();
       $this->deleteMessage='عملیه حذف موفقانه صورت گرفت!';
    }
    // computed propery 
    public function getCallogesProperty(){
        return Calloge::query()
        ->when($this->search,function($collages){
             $collages->where('collage_name','like',"%{$this->search}%")
             ->orWhere('created_at','like',"%{$this->search}%");
        })
        ->latest('id')
        ->paginate(5);
    }
    public function render()
    {
        $collages=$this->calloges;
       
        return view('livewire.collage.collage-list',compact('collages'));
    }
}
