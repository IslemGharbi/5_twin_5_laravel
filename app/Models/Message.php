<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable =[
        'sender_id',
        'receiver_id',
        'conversation_id',
        'read',
        'type',
        'body',
    ];

    public function user(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
}
