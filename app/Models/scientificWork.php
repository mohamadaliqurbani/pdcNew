<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class scientificWork extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scientificable(){
        return $this->morphTo()->withoutGlobalScope(SoftDeletingScope::class);
    }
}
