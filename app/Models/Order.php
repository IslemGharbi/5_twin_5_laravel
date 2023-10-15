<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
   'deadline' => 'datetime',
];

    public function freelancer(){
        return $this->belongsTo(Freelancer::class);        
    }

    public function user(){
        return $this->belongsTo(User::class);        
    }

    public function option(){
        return $this->belongsTo(Option::class);        
    }

    public function gig(){
        return $this->belongsTo(Gig::class);        
    }

    public function comment(){
        return $this->hasMany(Comment::class);        
    }

     
}
