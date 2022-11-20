<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('department.index');
    }

    public function update(Department $department, DepartmentRequest $request)
    {
        $data = $request->validated();
        $department->update($data);
        return back()->with('message','بروز رسانی موفقانه صورت گرفت');
    }
}
