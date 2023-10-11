<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class NotePicture extends Model
{
    use MediaAlly;

    protected $fillable = ['note_id', 'public_id', 'url'];

    // Define the relationship to the Note model
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}