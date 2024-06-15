<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    protected $listeners = ['refresh-me' => '$refresh'];
    public $conversations;
    public $auth_email;
    public $receiverUser;
    public $selected_conversation;

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function getUsers(Conversation $conversation, $request)
    {
        if ($conversation->sender_email == $this->auth_email) {
            $this->receiverUser = Doctor::firstWhere('email', $conversation->receiver_email);
        } else {
            $this->receiverUser = Patient::firstWhere('email', $conversation->sender_email);
        }
        if (isset($request)) {
            return $this->receiverUser->$request;
        }
    }

    public function chatUserSelected(Conversation $conversation, $receiver_id)
    {
        $this->selected_conversation = $conversation;
        $this->receiverUser = Doctor::find($receiver_id);
        if (Auth::guard('patient')->check()) {
            $this->dispatch('user-selected', $this->selected_conversation, $this->receiverUser);
        } elseif ((Auth::guard('doctor')->check())) {
            $this->dispatch('user-selected', $this->selected_conversation, $this->receiverUser);
        }
        $this->dispatch('update-message', $this->selected_conversation, $this->receiverUser);
    }

    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->auth_email)->orWhere('receiver_email', $this->auth_email)
            ->orderBy('last_time_message', 'DESC')->get();
        return view('livewire.chat.chat-list');
    }
}
