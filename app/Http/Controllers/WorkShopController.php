<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class WorkShopController extends Controller
{
    public function index(){
        return view('workshop.index');
    }

    public function create(){
        return view('workshop.create');
    }

    public function store(StoreWorkshopRequest $request){
        $data=$request->validated();
        // dd($data);
        WorkShop::create($data);
        return redirect(route('workshop.index'))->with('message',' ثبت کردن  موفقانه صورت گرفت');
      
    }
    public function edit(WorkShop $workShop){
        return view('workshop.edit',compact('workShop'));
    }

    public function update(StoreWorkshopRequest $request,WorkShop $workShop){
        // dd($workShop);
        $data=$request->validated();
        // dd($data);
        $workShop->update($data);
        return redirect(route('workshop.index'))->with('message','بروز رسانی موفقانه صورت گرفت');
    }

    public function show(WorkShop $workShop){
       
        // dd($workShop->load('presentor.presentorable'));
        return view('workshop.show',compact('workShop'));
    }

    public function presented(){
        return view('presentedWorkshop.index');
        
    }

    public function destroy(Request $request){
            // dd($request->workshopId);
            $workShop=WorkShop::findOrFail($request->workshopId);
            $workShop->delete();
            return back()->with('deletemessage','حذف ورکشاپ موفقانه صورت گرفت');
    }

    public function maskAsPresent(WorkShop $workShop){
        // dd($workShop);
        $workShop->update(['is_present'=>true]);
        $workShop->save();
        return back()->with('message','ورکشاپ انتخاب شده موفقانه به بخش ارایه شده انتقال شد');
    }
}
