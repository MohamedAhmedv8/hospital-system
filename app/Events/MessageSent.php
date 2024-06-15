<?php

namespace App\Events;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;
    public $receiver;
    public $conversation;

    public function __construct(Patient $sender, Message $message, Conversation $conversation, Doctor $receiver)
    {
        dd('1');
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
        return new PrivateChannel('chat.' . $this->receiver->id);
    }
}
