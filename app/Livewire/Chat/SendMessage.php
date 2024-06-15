<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;
use App\Events\MessageSent;
use Livewire\Attributes\On;
use App\Events\MessageSent2;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class SendMessage extends Component
{
    public $body;
    public $selected_conversation;
    public $receiverUser;
    public $auth_email;
    public $sender;
    public $createdMessage;
    protected $listeners = ['updateMessage', 'dispatchSentMassage', 'updateMessage2'];

    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->auth_email = Auth::guard('patient')->user()->email;
            $this->sender = Auth::guard('patient')->user();
        } elseif (Auth::guard('doctor')->check()) {
            $this->auth_email = Auth::guard('doctor')->user()->email;
            $this->sender = Auth::guard('doctor')->user();
        }
    }

    // ----------------------------------------------------------------------------------------

    // public function updateMessage2(Conversation $conversation, Patient $receiver)
    // {
    //     $this->selected_conversation = $conversation;
    //     $this->receiverUser = $receiver;
    // }

    // public function dispatchSentMassage()
    // {
    //     // dd(3);
    //     if (Auth::guard('patient')->check()) {
    //         broadcast(new MessageSent(
    //             $this->sender,
    //             $this->createdMessage,
    //             $this->selected_conversation,
    //             $this->receiverUser,
    //         ));
    //     } else {
    //         broadcast(new MessageSent2(
    //             $this->sender,
    //             $this->createdMessage,
    //             $this->selected_conversation,
    //             $this->receiverUser,
    //         ));
    //     }
    // }

    // ----------------------------------------------------------------------------------------
    #[On('update-message')]
    public function updateMessage(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiverUser = $receiver;
    }
    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->auth_email,
            'receiver_email' => $this->receiverUser->email,
            'body' => $this->body,
        ]);
        $this->selected_conversation->last_time_message = $this->createdMessage->created_at;
        $this->selected_conversation->save();
        $this->reset('body');
        $this->dispatch('push-message', $this->createdMessage->id);
        $this->dispatch('refresh-me');

        // $this->dispatch('dispatchSentMassage')->self();
        // $this->dispatch('dispatch-message', new MessageSent(
        //     $this->sender,
        //     $this->createdMessage,
        //     $this->selected_conversation,
        //     $this->receiverUser
        // ));
    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
