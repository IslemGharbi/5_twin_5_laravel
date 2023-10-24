<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Rules\NoBadWordsRule; // Import the custom validation rule

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

    public function resetComponent()
    {
        $this->selectedConversation = null;
        $this->receiverInstance = null;
    }

    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
    
        // Define the validation rules for the message body
     $rules = [
        'body' => ['required', new NoBadWordsRule],
    ];

    $messages = [
        'body.required' => 'The message body is required.',
        'body.no_bad_words' => 'The message contains inappropriate words.',
    ];

    $this->validate($rules, $messages);
    
        // ... the rest of your code ...
    
        // Reset the message body
        $this->reset('body');
    }
    

    public function dispatchMessageSent()
    {
        // Broadcast the message sent event
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
