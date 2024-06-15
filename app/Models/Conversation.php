<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['sender_email', 'receiver_email', 'last_time_message'];
    public function scopecheckConversation($query, $auth_email, $receiver_email)
    {
        return $query->where('sender_email', $auth_email)
            ->where('receiver_email', $receiver_email)->orWhere('receiver_email', $auth_email)->where('sender_email', $receiver_email);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
