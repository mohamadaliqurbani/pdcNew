<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function calloge(){
        return $this->belongsTo(Calloge::class);
    }
    public function teachers(){
        return $this->hasMany(TeacherInfo::class);
    }
    public function departmentOfTeacher(){
        return $this->hasMany(DepartmentOfTeacher::class);
    }
}
