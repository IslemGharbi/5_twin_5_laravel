<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    public function freelancer(){
        return $this->belongsTo(Freelancer::class);        
    }

    public function category(){
        return $this->belongsTo(Category::class);        
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class);        
    }

    public function thumbnail(){
        return $this->hasMany(Thumbnail::class);        
    }

    public function option(){
        return $this->hasMany(Option::class);        
    }

    public function order(){
        return $this->hasMany(Order::class);        
    }
    
    public function comment(){
        return $this->hasMany(Comment::class);        
    }
   
}
