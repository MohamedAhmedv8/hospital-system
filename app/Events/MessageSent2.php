<?php

namespace App\Events;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use App\Models\Conversation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent2 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;
    public $receiver;
    public $conversation;

    public function __construct(Doctor $sender, Message $message, Conversation $conversation, Patient  $receiver)
    {
        dd('2');
        $this->sender = $sender;
        $this->message = $message;
        $this->receiver = $receiver;
        $this->conversation = $conversation;
    }

    public function broadcastWith()
    {
        return [
            'sender_email' => $this->sender->email,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'receiver_email' => $this->receiver->email,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat2.' . $this->receiver->id);
    }
}
