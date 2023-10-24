<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['content'];

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }
}
