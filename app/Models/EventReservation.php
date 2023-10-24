<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    protected $fillable = ['user_id', 'event_id'];

    // Assurez-vous que le nom de la table correspond à celui que vous avez défini dans la migration.
    protected $table = 'event_reservations';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}