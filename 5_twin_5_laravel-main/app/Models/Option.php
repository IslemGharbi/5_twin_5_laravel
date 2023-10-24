<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function gig(){
        return $this->belongsTo(Gig::class);        
    }

    public function order(){
        return $this->hasMany(Order::class);        
    }
}
