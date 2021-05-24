<div>
    @forelse($conversations as $conversation)
    <a href="{{route('conversations.show',$conversation)}}" class="list-group-item list-group-item-action {{$conversation->uuid  == $conversation_inside->uuid ? ' active' : ''}} text-white rounded-0">
        <div class="media"><img src="{{asset('img/avatar.png')}}" alt="{{$conversation->name != '' ? $conversation->name : $conversation->users->pluck('name')->join(',')}}" width="50" class="rounded-circle">
            <div class="media-body ml-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0 text-black-50">{{$conversation->name != '' ? $conversation->name : $conversation->users->pluck('name')->join(',')}}</h6><small class="small font-weight-bold text-black-50">
                        {{$conversation->last_message_at ?? \Carbon\Carbon::createFromTimeStamp(strtotime($conversation->updated_at))->diffForHumans()}}</small>
                </div>
                <p class="font-italic mb-0 text-small text-black-50">{{$conversation->messages->last()->body}}</p>
            </div>
        </div>
    </a>
    @empty
    <p class="text-muted">No conversations</p>
    @endforelse
</div>

