<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public function deActived(){
        return $this->withTrashed();
    }
    public function participants(){
        return $this->hasMany(Participant::class);
    }
    public function suggestion()
    {
        return $this->morphMany(Suggestion::class, 'suggestionable');
    }
    public function teacherInfo()
    {
        return $this->hasOne(TeacherInfo::class);
    }
    public function employee(){
        return $this->hasOne(Employee::class);
    }
    public function scientificWork()
    {
        return $this->morphMany(scientificWork::class, 'scientificable');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'lname',
        'image',
        'gender',
        'role',
        'password',
        'isCompelete',

    ];
    // protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
