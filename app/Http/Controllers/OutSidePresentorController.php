<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOutSidePresentor;
use App\Http\Requests\UpdateOutSidePresentor;
use App\Models\OutSidePresentor;
use App\Models\WorkShop;
use Illuminate\Support\Str;

class OutSidePresentorController extends Controller
{
    public function index()
    {
        return view('outSidePresentor.index');
    }
    public function create(WorkShop $workshop)
    {
        return view('outSidePresentor.create', compact('workshop'));
    }
    public function store(StoreOutSidePresentor $request, WorkShop $workshop)
    {
        $data = $request->validated();
        $extension = $request->file('image')->getClientOriginalExtension();
        $imageName = Str::random() . '.' . $extension;
        $request->file('image')->move('asset/upload/outside', $imageName);
        $data['image'] = $imageName;
        $workshop->outSidePresentor()->create($data);
        return redirect(route('outSidePresentor.index'));
    }

    public function show(OutSidePresentor $outsidepresentor){
        
        return view('outSidePresentor.show', compact('outsidepresentor'));
    }
    public function edit(OutSidePresentor $outsidepresentor)
    {
        return view('outSidePresentor.edit', compact('outsidepresentor'));
    }

    public function update(UpdateOutSidePresentor $request, OutSidePresentor $outsidepresentor)
    {
        // dd($outsidepresentor);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = Str::random() . '.' . $extension;
            $request->file('image')->move('asset/upload/outside', $imageName);
            $data['image'] = $imageName;
        }
        // dd($data);
        $outsidepresentor->update($data);
        return redirect(route('outSidePresentor.index'))->with('message','بروز رسانی موفقانه صورت گرفت');
    }
}
