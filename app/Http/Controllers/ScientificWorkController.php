<?php

namespace App\Http\Controllers;

use App\Http\Requests\scientificWorkRequest;
use App\Http\Requests\updateScientificWorkRequest;
use App\Models\scientificWork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScientificWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['teacher'],['employee'])->except('showScientificWork');
    }
    public function index()
    {
        return view('scientificWork.index');
    }

    public function create()
    {
        return view('scientificWork.create');
    }

    public function store(scientificWorkRequest $request)
    {
        
        $data = $request->validated();
        // dd($data);
        $pdfExtension = $request->file('file_work')->getClientOriginalExtension();
        $name = rand(99, 100) . time() . '_' . $request->title . '.' . $pdfExtension;
        
        $request->file('file_work')->move('asset/upload/pdfs', $name);
        $data['file_work'] = $name;
        if ($request->hasFile('cover_photo')) {
            $imageExtension = $request->file('cover_photo')->getClientOriginalExtension();
            $imageName = Str::random() . '.' . $imageExtension;
            $request->file('cover_photo')->move('asset/upload/image', $imageName);
            $data['cover_photo'] = $imageName;
        }
        $request->user()->scientificWork()->create($data);

        return redirect(route('scientific.index'));
    }

    public function showScientificWork(scientificWork $scientificWork){
        // dd($scientificWork);
        return view('scientificWork.showScientificWork',compact('scientificWork'));
    }
    public function edit(scientificWork $scientificWork)
    {
        return view('scientificWork.edit', compact('scientificWork'));
    }

    public function update(updateScientificWorkRequest $request, scientificWork $scientificWork)
    {
        $data=$request->validated();
        // dd($data);
        if ($request->hasFile('cover_photo')) {
            if ($scientificWork->cover_photo != null) {
                $path = public_path('asset/upload/image/' . $scientificWork->cover_photo);
                if (!unlink($path)) {
                    return back();
                }
            }
            $imageExtension = $request->file('cover_photo')->getClientOriginalExtension();
            $imageName = Str::random() . '.' . $imageExtension;
            $request->file('cover_photo')->move('asset/upload/image', $imageName);
            $data['cover_photo'] = $imageName;
        }

        if ($request->hasFile('file_work')) {
            $path = public_path('asset/upload/pdfs/' . $scientificWork->file_work);
            if (!unlink($path)) {
                return back();
            } else {

                $pdfExtension = $request->file('file_work')->getClientOriginalExtension();
                $name = rand(99, 100) . time() . '_' . $request->title . '.' . $pdfExtension;
                $request->file('file_work')->move('asset/upload/pdfs', $name);
                $data['file_work'] = $name;
            }
        }
        $data['dicribesion']=trim($data['dicribesion']);
        $scientificWork->update($data);
       
        return redirect(route('scientific.index'));
    }
}
