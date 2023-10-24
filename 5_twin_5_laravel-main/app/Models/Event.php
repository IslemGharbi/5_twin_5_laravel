<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // app/Models/Event.php

protected $fillable = ['title', 'description', 'start_date', 'end_date', 'location', 'task','image'];

public function tasks()
{
    return $this->belongsToMany(Task::class, 'event_task', 'event_id', 'task_id');
}

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(EventReservation::class);
    }
    

   

}
