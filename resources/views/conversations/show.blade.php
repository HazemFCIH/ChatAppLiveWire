{{--@include('layouts.app')--}}

{{--@section('content')--}}

{{--<h1>Conversations</h1>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="{{ asset('css/conversations/messageStyle.css') }}" rel="stylesheet">

@endsection
@section('content')
    <div class="container py-5 px-4">


        <div class="row rounded-lg overflow-hidden shadow">
        @include('partials.CreateConversation')

        <!-- Users box-->
            <div class="col-5 px-0">
                <div class="bg-white">

                    @livewire('conversations.conversation-users', ['users' => $conversation->users , 'conversation'=>$conversation ])


                    <div class="messages-box">
                        <div class="list-group rounded-0">


                            @livewire('conversations.conversation-list', ['conversations'=>$conversations, 'conversation_inside' => $conversation])


                        </div>
                    </div>
                </div>
            </div>
            <!-- Chat Box-->
            <div class="col-7 px-0">
                <div class="px-4 py-5 chat-box bg-white">
                    @livewire('conversations.conversation-messages', ['conversation'=>$conversation, 'messages' => $conversation->messages])

                </div>
                @livewire('conversations.conversation-replay', ['conversation'=>$conversation])


            </div>
        </div>
    </div>
@endsection
