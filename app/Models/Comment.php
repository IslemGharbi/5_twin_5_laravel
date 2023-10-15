<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function gig(){
        return $this->belongsTo(Gig::class);        
    }
    public function order(){
        return $this->belongsTo(Order::class);        
    }
    public function user(){
        return $this->belongsTo(User::class);        
    }
    public function freelancer(){
        return $this->belongsTo(Freelancer::class);        
    }
}
