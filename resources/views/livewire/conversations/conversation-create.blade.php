<div>
    <form action="" class="bg-white" wire:submit.prevent="create">
        <div class="p-4 border-bottom">
            <div class="mb-2 text-muted">
                Send to
                @foreach($users as $user)
                    <a href="#" class="font-weight-bold">{{$user['name']}}</a>{{!$loop->last ?', ' : ''}}
                @endforeach
            </div>
            <!-- /.mb-2 -->
        </div>

        <div x-data = "{ ...conversationCreateState(), ...userSearchState() }">
          <x-conversations.user-search>
        <x-slot name="suggestions">
            <template x-for ="user in suggestions" :key="user.id">
                <a href="#" class="d-block"x-on:click="addUser(user)" x-text="user.name"></a>
            </template>
        </x-slot>
          </x-conversations.user-search>
        </div>
        <div class="p-4 border-bottom">
        <div class="form-group">
            <label for="body">Conversation Name</label>
            <input type="text" id="body" class="form-control" wire:model="name" placeholder="Conversation name">
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label for="body">Message</label>
            <textarea id="body" class="form-control" wire:model="body"></textarea>
            <!-- /#body.form-control -->
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Start Conversation</button>
            <!-- /.btn btn-primary btn-block -->
        </div>
        <!-- /.form-group -->
        <!-- /.form-group -->
        </div>
    </form>
</div>
@section('js')

    <script>

        function conversationCreateState() {
            return {

                addUser(user){
                    @this.call('addUser',user)
                    this.$refs.search.values =''
                    this.suggestions = []
                }
            }
        }
    </script>
@endsection
