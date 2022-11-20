<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShop extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function outSidePresentor(){
        return $this->hasMany(OutSidePresentor::class);
    }
    public function participant(){
        return $this->hasMany(Participant::class);
    }
    public function presentor(){
        return $this->hasMany(Presentor::class);
    }
}
