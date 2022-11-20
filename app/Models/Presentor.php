<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentor extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function presentorable(){
        return $this->morphTo();
    }

    public function workShop(){
        return $this->belongsTo(WorkShop::class);
    }
}
