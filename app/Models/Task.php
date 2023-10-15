<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description', 'due_date', 'status', 'priority'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    
}
