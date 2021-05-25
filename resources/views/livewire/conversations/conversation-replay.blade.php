<div>
<!-- Typing area -->
<form action="#" class="bg-light"
      x-data="conversationReplayState()"
      wire:submit.prevent="reply"
enctype="multipart/form-data">
    @if($attachment)
    <div class="input-group">
        <div class="d-inline-flex align-items-center p-1 rounded border">
            @if(in_array($attachment->extension(),['png','jpg','jpeg','gif']))
            <img src="{{$attachment->temporaryUrl()}}" width="80">
                @endif
            @if(in_array($attachment->extension(),['wav','mp3']))
                <i class="far fa-file-audio"></i>
                @endif
                @if(in_array($attachment->extension(),['mp4']))
                    <i class="far fa-file-video"></i>
                @endif
        </div>
        <!-- /.d-inline-flex -->
    </div>
    <!-- /.input-group -->
    @endif
    <div class="input-group">
        <input type="text"
               wire:model = "body"
               x-on:keydown.enter="submit"
               placeholder="Type a message"
               aria-describedby="button-addon2"
               class="form-control rounded-0 border-0 py-4 bg-light"
        >
        <div class="input-group-append">
            <button id="button-addon1" type="button" class="btn btn-link" x-on:click="attach"> <i class="fa fa-paperclip"></i></button>
            <input type="file" id="file_upload_id" wire:model="attachment" name="attachment" style="display: none;">
            <!-- /#file_upload_id -->
            <button id="button-addon2" type="submit" class="btn btn-link" x-ref = "submit"> <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</form>
    <script type="application/javascript">
function conversationReplayState(){
    return {
        attach(){
            document.getElementById('file_upload_id').click();
        },
        submit(){
            this.$refs.submit.click()
        }
    }
}

    </script>
</div>
