<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description', 'due_date', 'status', 'priority'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_task', 'task_id', 'event_id');
    }
    
}


