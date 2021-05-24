<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConversationReplay extends Component
{
    use WithFileUploads;
    public $body = '';
    public $attachment = '';
    public $attachment_name = '';
    public $conversation = '';
    public function mount(Conversation $conversation){
        $this->conversation = $conversation;
    }
protected $rules = [
    'body' => 'required',
    'attachment' => 'nullable|file|mimes:png,jpg,jpeg,gif,wav,mp3,mp4|max:102400',
];
    public function reply(){
        $this->validate(
        );
    }
    public function render()
    {
        return view('livewire.conversations.conversation-replay');
    }
}
