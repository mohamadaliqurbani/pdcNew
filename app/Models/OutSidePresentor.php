<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutSidePresentor extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function workShop(){
        return $this->belongsTo(WorkShop::class);
    }
}
