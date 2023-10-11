<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['subject', 'details', 'created_at', 'deadline'];

    // Define the one-to-many relationship for pictures
    public function pictures()
    {
        return $this->hasMany(NotePicture::class);
    }
}

