<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'description', 'pdf_file',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
