<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationMessages extends Component
{
    public $conversation;
    public $conversationId;
    public $messages;
    public function getListeners()
    {
        return[
        'message.created' => 'prependMessage',
            "echo-private:conversations.{$this->conversationId},Conversations\\MessageAdded" => 'prependMessageFromBroadCast',
        ];
    }
    public function prependMessage($id){
        $this->messages->push(Message::find($id));
    }
    public function prependMessageFromBroadCast($payload){
        $this->prependMessage($payload['message']['id']);
    }

    public function mount(Conversation $conversation,Collection $messages){
        $this->conversation = $conversation;
        $this->conversationId =$conversation->id;
        $this->messages = $messages;
    }
    public function render()
    {
        return view('livewire.conversations.conversation-messages');
    }
}
