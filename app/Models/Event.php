<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // app/Models/Event.php

protected $fillable = ['title', 'description', 'start_date', 'end_date', 'location', 'task'];

public function tasks()
{
    return collect(json_decode($this->task))->map(function ($task) {
        return new Task((array) $task);
    });
}
    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }



   

}
