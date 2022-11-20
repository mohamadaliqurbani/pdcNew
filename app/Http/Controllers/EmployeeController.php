<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }
    public function compelete(){
        return view('employeeIncompelete.index');
    }
    public function create(User $user)
    {
        
        return view('employee.create',compact('user'));
    }

    public function store(StoreEmployeeRequest $request,User $user)
    {
        // dd($user);
        $data = $request->validated();
        $user->employee()->create($data);
        $user->isCompelete=true;
        $user->save();
        return redirect(route('employee.index'));
    }
    public function edit($user)
    {
        return view('employee.edit', compact('user'));
    }

    public function infoEdit(Employee $employee){
        return view('employee.infoedit',compact('employee'));
    }
    public function show(Employee $employee)
    {
        $employee=$employee->load('user');
        return view('employee.show', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        // dd($data);
        // if ($request->hasFile('emp_image')) {
        //     // dd($employee->emp_image);
        //     if ($employee->emp_image != null) {

        //         $path = public_path('/asset/upload/emp/' . $employee->emp_image);
        //         $delet = unlink($path);
        //         if ($delet) {
        //             $extension = $request->file('emp_image')->getClientOriginalExtension();
        //             $imgname = Str::random() . $extension;
        //             $request->file('emp_image')->move('asset/upload/emp', $imgname);
        //             $data['emp_image'] = $imgname;
        //             // dd("delete file done");
        //         } else {
        //             dd("not delete");
        //         }
        //     } else {
        //         $extension = $request->file('emp_image')->getClientOriginalExtension();
        //         $imgname = Str::random() . $extension;
        //         $request->file('emp_image')->move('asset/upload/emp', $imgname);
        //         $data['emp_image'] = $imgname;
        //     }
        // }
        $employee->update($data);
        return redirect(route('employee.index'))->with('message','بروز رسانی معلومات کارمند موفقانه بود');

    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employee.index'));
    }
}
