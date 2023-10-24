<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function freelancer(){
        return $this->belongsTo(Freelancer::class);
    }
    public function ratings()
{
    return $this->hasMany(SkillRating::class);
}
public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

}