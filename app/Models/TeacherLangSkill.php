<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLangSkill extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function teacherInfo(){
        return $this->belongsTo(TeacherInfo::class);
    }
}
