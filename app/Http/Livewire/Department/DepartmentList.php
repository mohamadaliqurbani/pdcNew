<?php

namespace App\Http\Livewire\Department;

use App\Models\Calloge;
use App\Models\Department;
use App\Models\TeacherInfo;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentList extends Component
{
    use WithPagination;
    public $data = [];
    public $search;
    public $department=null;
    public $departmentId=null;
    public $deleteMessage=null;
    public $message="sfdklsjdfklsdjfksdjfsdjfds";
    protected $listeners = ['edit','delete'];
    public function edit(Department $department){
        // dd($department);
        $this->department=$department;
    }
    public function delete(Department $department){
        $this->departmentId= $department->id;
    }
    public function destory(Department $department){
    //   $departmentId=$department->id;
    //   dd(TeacherInfo::where('department_id',$departmentId)->get());
       $department->delete();
       $this->reset();
       $this->deleteMessage='عملیه حذف موفقانه صورت گرفت!';

    }
    public function update(){
        dd($this->data);
    }
    public function createDepartment()
    {
        // dd($this->data['calloge_id']);
        $calloge = Calloge::findOrFail($this->data['calloge_id']);
        $data = Validator::make(
            $this->data,
            [
                "name" => "required|string|min:2"
            ],
            [
                "name.required" => 'اسم دیپارتمنت را بنوسید',
                "name.string" => 'اسم دیپارتمنت باید حروف باشد',
                "name.min" => 'اسم دیپارتمنت  بیشتر از یک حروف باشد',
            ]

        )->validate();

        $calloge->departements()->create($data);
        $this->reset();
    }

    // computed property
    // feching and searching via when method 
    public function getDepartmentsProperty()
    {
        return Department::with('calloge')
            ->when($this->search, function ($department) {
                $department->whereHas('calloge', function ($department) {
                    $department->where('name', 'like', "%{$this->search}%")
                        ->orwhere('collage_name', 'like', "%{$this->search}%");
                });
            })
            ->latest('id')
            ->paginate(20);
    }
    public function render()
    {
        $calloges = Calloge::latest('id')->get();
        $departments = $this->departments;
        return view('livewire.department.department-list', compact('calloges', 'departments'));
    }
}
