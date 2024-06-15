<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;


class ChatBox extends Component
{

    // protected $listeners = ['load_conversationDoctor', 'load_conversationPatient'];
    public $receiver;
    public $selected_conversation;
    public $receiverUser;
    public $messages;
    public $auth_email;
    public $auth_id;
    public $event_name;
    public $chat_page;
    public $broadcastMessage;

    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->auth_email = Auth::guard('patient')->user()->email;
            $this->auth_id = Auth::guard('patient')->user()->id;
        } elseif (Auth::guard('doctor')->check()) {
            $this->auth_email = Auth::guard('doctor')->user()->email;
            $this->auth_id = Auth::guard('doctor')->user()->id;
        }
    }

    // ----------------------------------------------------------------------------------------
    // public function getListeners()
    // {
    //     if (Auth::guard('patient')->check()) {
    //         $auth_id = Auth::guard('patient')->user()->id;
    //         $this->event_name = "MassageSent2";
    //         $this->chat_page = "chat2";
    //     } else {
    //         $auth_id = Auth::guard('doctor')->user()->id;
    //         $this->event_name = "MassageSent";
    //         $this->chat_page = "chat";
    //     }
    //     return [
    //         "echo-private:$this->chat_page.{$auth_id},$this->event_name" => 'broadcastMassage', 'load_conversationPatient', 'load_conversationDoctor', 'pushMessage'
    //     ];
    // }
    // #[On('broadcastMassage')]
    // public function broadcastMassage($event)
    // {
    //     dd('yes');
    //     $broadcastMessage = Message::find($event['message']);
    //     $broadcastMessage->read = 1;
    //     $this->pushMessage($broadcastMessage->id);
    // }

    // ----------------------------------------------------------------------------------------
    #[On('user-selected')]
    public function load_conversationDoctor(Conversation $conversation, Doctor $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiverUser = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }
    public function load_conversationPatient(Conversation $conversation, Patient $receiver)
    {
        $this->selected_conversation = $conversation;
        $this->receiverUser = $receiver;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
    }
    #[On('push-message')]
    public function pushMessage($id)
    {
        $newMessage = Message::Find($id);
        $this->messages->push($newMessage);
    }
    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
