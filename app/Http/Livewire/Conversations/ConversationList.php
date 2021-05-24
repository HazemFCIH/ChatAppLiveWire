<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;
    public $conversation_inside;
    public function mount(Collection $conversations,Conversation $conversation_inside){
        $this->conversations =$conversations;
        $this->conversation_inside =$conversation_inside;
    }
    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
