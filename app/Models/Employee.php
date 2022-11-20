<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function awearness(){
        return $this->morphMany(Awearness::class,'awearnesseable');
    }
    public function participants()
    {
        return $this->morphMany(Participant::class, 'participantable');
    }
    public function presentors()
    {
        return $this->morphMany(Presentor::class, 'presentorable');
    }
    public function scientificWork(){
        return $this->morphMany(scientificWork::class,'scientificable');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function suggestion()
    {
        return $this->morphMany(Suggestion::class, 'suggestionable');
    }

    public function deActivedUser()
    {
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }
}
