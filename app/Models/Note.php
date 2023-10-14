<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'details', 'created_at', 'deadline'];

    // Define the one-to-many relationship for pictures
    public function pictures()
    {
        return $this->hasMany(NotePicture::class);
    }
}

