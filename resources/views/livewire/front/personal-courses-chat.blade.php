<div class="position-absolute bottom-0 end-0 w-100  sms">
    <div>
        @foreach($messages as $message)
            <div>{{ $message->message }}</div>
        @endforeach
    </div>
    <div class="position-relative mb-2">
        <input wire:model="message" wire:keydown.enter="new_message"
               class="w-100 py-3 px-3 br-12 border-0 position-relative"
            placeholder="Добавить комментарий">

        <div wire:click="new_message" class="icon-style bg-primary br-12 d-flex justify-content-center align-items-center
                                                    position-absolute top-0 bottom-0 end-0 me-2 mt-2">

            <i class="far fa-paper-plane text-white"></i>
        </div>
    </div>
    <script>
        setTimeout(function (){
            setInterval(function (){
                Livewire.emit('updateMessages')
            },1000)
        },2000);
    </script>
</div>


