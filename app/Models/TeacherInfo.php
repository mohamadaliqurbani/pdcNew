<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherInfo extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function awearness(){
        return $this->morphMany(Awearness::class,'awearnesseable');
    }
 
    public function presentors(){

        return $this->morphMany(Presentor::class,'presentorable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deActivedUser()
    {
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }
    public function departmentOfTeacher(){
        return $this->hasOne(DepartmentOfTeacher::class);
    }
    public function teacherCurrentJob(){
        return $this->hasMany(TeacherCurrentJob::class);
    }
    public function teacheEdictionInfo(){
        return $this->hasOne(TeacherEducationInfo::class);
    }
    public function teacherJobTraind(){
        return $this->hasMany(TeacherJobTrainde::class);
    }
    public function teacherLangSKill(){
        return $this->hasMany(TeacherLangSkill::class);
    }

    public function teacherReview(){
        return $this->hasMany(TeacherReview::class);
    }

    public function teacherReward(){
        return $this->hasMany(TeacherReward::class);
    }
    public function teacherEduDegree(){
        return $this->hasOne(TeacherReview::class)->latest('id')->limit(1);
    }

    public function teacherServiceDuration(){
        return $this->hasMany(TeacherServicesDuration::class);
    }
}
