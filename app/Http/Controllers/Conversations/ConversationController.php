<?php

namespace App\Http\Controllers\Conversations;

use App\Events\Conversations\ConversationUpdated;
use App\Events\Conversations\MessageAdded;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }// end constructor

    public function index(){
        return view('conversations.index');
    }// end index
    public function show(Conversation $conversation , Request $request){
        $this->authorize('show',$conversation);
       // broadcast(new ConversationUpdated($conversation));

        $request->user()->conversations()->updateExistingPivot($conversation->id, [
            'read_at' => now(),
        ]);

         return view('conversations.show',compact('conversation'));

    } //end show
    public function create(Request $request){
        return view('conversations.create');
    }// end create
    public function store(){

    } // end store
}
