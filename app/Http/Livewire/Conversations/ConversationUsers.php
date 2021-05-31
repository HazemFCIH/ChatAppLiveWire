<?php

namespace App\Http\Livewire\Conversations;

use App\Events\Conversations\ConversationUpdated;
use App\Events\Conversations\UserAdded;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationUsers extends Component
{
    public $users;
    public $conversation;

    public function mount(Collection $users, Conversation $conversation){
        $this->users =$users;
        $this->conversation = $conversation;
    }
    public function getListeners()
    {
        return [
            "echo-private:conversations.{$this->conversation->id},Conversations\\UserAdded" => 'pushUserFromBroadcast',
        ];
    }
    public function pushUserFromBroadcast($payload){
        $this->pushUser($payload['user']['id']);
    }

    public function pushUser($id){
        $this->users->push($user = User::find($id));
        return $user;
    }
    public function addUser($user){

        if ($user['id'] != auth()->id()){
            $this->conversation->users()->syncWithOutDetaching($user['id']);
          $user = $this->pushUser($user['id']);
            broadcast(new  UserAdded($this->conversation,$user))->toOthers();
            broadcast(new ConversationUpdated($this->conversation));
        }

    }
    public function render()
    {
        return view('livewire.conversations.conversation-users');
    }
}
