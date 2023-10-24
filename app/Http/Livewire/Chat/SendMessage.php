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
    
    $this->createdMessage = Message::create([
        'conversation_id' => $this->selectedConversation->id,
        'sender_id' => auth()->id(),
        'receiver_id' => $this->receiverInstance->id,
        'body' => $this->body,

    ]);

    $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
    $this->selectedConversation->save();
    $this->emitTo('chat.chatbox', 'pushMessage', $this->createdMessage->id);
    
      //reshresh coversation list 
      $this->emitTo('chat.chat-list', 'refresh');
      $this->reset('body');

      $this->emitSelf('dispatchMessageSent');
      // dd($this->body);
      # code..
        // Reset the message body
        $this->reset('body');
    }
    

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(Auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
        # code...
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
