<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calloge extends Model
{
    use HasFactory;
    protected $fillable=['collage_name'];
    public function departements(){
        return $this->hasMany(Department::class);
    }
}
