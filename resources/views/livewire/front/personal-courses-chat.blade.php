<div class="position-absolute webinar_messages_livewire_div w-100 sms" style="height: 100vh;">
    <div class="webinar_messages_parent_div">
        @foreach($messages as $message)
            <div class="webinar_message_txt_div d-flex flex-row align-items-center ">
                @if($message->userInfo->image != "")
                    <img style="height: 40px;width: 40px" class="rounded-circle"
                         src="{{ \Illuminate\Support\Facades\Storage::url($message->userInfo->image) }}"
                         alt="user_img_{{$message->user_id}}">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <path
                            d="M24.2286 19.5229C25.18 18.4822 25.7097 17.1244 25.7143 15.7143C25.7143 12.5629 23.1514 10 20 10C16.8486 10 14.2857 12.5629 14.2857 15.7143C14.2903 17.1244 14.8199 18.4822 15.7714 19.5229C12.3686 21.12 10 24.57 10 28.5714C10 28.9503 10.1505 29.3137 10.4184 29.5816C10.6863 29.8495 11.0497 30 11.4286 30H28.5714C28.9503 30 29.3137 29.8495 29.5816 29.5816C29.8495 29.3137 30 28.9503 30 28.5714C30 24.57 27.6314 21.12 24.2286 19.5229ZM17.1429 15.7143C17.1429 14.1386 18.4243 12.8571 20 12.8571C21.5757 12.8571 22.8571 14.1386 22.8571 15.7143C22.8571 17.29 21.5757 18.5714 20 18.5714C18.4243 18.5714 17.1429 17.29 17.1429 15.7143ZM13.0014 27.1429C13.6643 23.8871 16.5514 21.4286 20 21.4286C23.4486 21.4286 26.3357 23.8871 26.9986 27.1429H13.0014Z"
                            fill="black"/>
                        <path
                            d="M20 0C8.97143 0 0 8.97143 0 20C0 31.0286 8.97143 40 20 40C31.0286 40 40 31.0286 40 20C40 8.97143 31.0286 0 20 0ZM20 37.1429C10.5471 37.1429 2.85714 29.4529 2.85714 20C2.85714 10.5471 10.5471 2.85714 20 2.85714C29.4529 2.85714 37.1429 10.5471 37.1429 20C37.1429 29.4529 29.4529 37.1429 20 37.1429Z"
                            fill="black"/>
                    </svg>
                @endif
                <div class="ms-13">
                    @if(!$message->userInfo->fullName)
                        <p class="mb-0 f-700 fs-14 lh-17 color-23">{{ $message->user->email}}</p>
                    @else
                        <p class="mb-0 f-700 fs-14 lh-17 color-23">{{ $message->userInfo->fullName}}</p>

                    @endif

                    <p class="mb-0 fw-normal fs-14 lh-17 color-23">{{ $message->message }}</p>
                </div>

            </div>
        @endforeach
    </div>

    <div class="position-absolute bottom-330px bottom-210px w-100">
        <hr class="m-0">
        <div class="position-relative  mb-2">
            <input wire:model="message" wire:keydown.enter="new_message"
                   class="w-100 py-4 px-3 br-12 border-0 position-relative webinar_message_input "
                   placeholder="Добавить комментарий">

            <div wire:click="new_message" class="cp icon-style bg-primary br-12 d-flex justify-content-center align-items-center
                                                    position-absolute top-0 bottom-0 end-0 me-2 mt-3 message_icon">

                <i class="far fa-paper-plane text-white"></i>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function () {
            setInterval(function () {
                Livewire.emit('updateMessages')
            }, 1000)
        }, 2000);
    </script>
</div>


