<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function suggestionable(){
        return $this->morphTo();
    }
}
