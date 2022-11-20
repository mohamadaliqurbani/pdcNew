<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentOfTeacher extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function teacherInfo(){
        return $this->belongsTo(TeacherInfo::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
