<?php

namespace App\Http\Controllers\Conversations;

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
        $conversations = auth()->user()->conversations;
        return view('conversations.index',compact('conversations'));
    }// end index
    public function show(Conversation $conversation , Request $request){
        $conversations = auth()->user()->conversations;
        return view('conversations.show',compact('conversation','conversations'));

    } //end show
}
