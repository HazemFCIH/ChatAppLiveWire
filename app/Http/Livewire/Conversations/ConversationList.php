<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;
    public $conversation_inside;
    public function getListeners()
    {
        return [
            'echo-private:User.'.auth()->id().',Conversations\\ConversationUpdated' =>'updateConversationFromBroadCast',
            'echo-private:User.'.auth()->id().',Conversations\\ConversationCreated' =>'CreateConversationFromBroadCast',
        ];
    }
    public function CreateConversationFromBroadCast($payload){
        return $this->conversations->prepend(Conversation::find($payload['conversation']['id']));
    }
    public function updateConversationFromBroadCast($payload){
       if($conversation = $this->conversations->find($payload['conversation']['id'])){
           $conversation->fresh();
           $this->conversation_inside->fresh();
       }
    }


    public function mount(Collection $conversations,Conversation $conversation_inside){
        $this->conversations =$conversations;
        $this->conversation_inside =$conversation_inside;
    }
    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
