<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);        
    }

    public function qualification(){
        return $this->hasMany(Qualification::class);        
    }

    public function employment(){
        return $this->hasMany(Employment::class);        
    }

    public function language(){
        return $this->hasMany(Language::class);        
    }

    public function skill(){
        return $this->hasMany(Skill::class);        
    }

    public function gig(){
        return $this->hasMany(Gig::class);        
    }
    
    public function order(){
        return $this->hasMany(Order::class);        
    }

    public function comment(){
        return $this->hasMany(Comment::class);        
    }
}
