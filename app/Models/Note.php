<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Note extends Model

{
    use HasFactory;
    protected $fillable = ['subject', 'details', 'created_at', 'deadline'];

    // Define the one-to-many relationship for pictures
    public function pictures()
    {
        return $this->hasMany(NotePicture::class);
    }

    public function sendDeadlineNotifications()
    {
        if ($this->deadline->isToday() || $this->deadline->isTomorrow()) {
            $this->notify(new DeadlineNotification($this));
        }
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}

