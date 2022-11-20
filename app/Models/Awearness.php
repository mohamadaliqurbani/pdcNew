<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awearness extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function awearnesseable(){
        return $this->morphTo();
    }
}
