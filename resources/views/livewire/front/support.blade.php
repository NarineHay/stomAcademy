<div class="row">
    <div class="col-lg-2 position-relative d-none d-lg-block first_block" style="z-index: 1;">
        <div class="account_left_aside_bg profile_left"></div>
        @if(\Illuminate\Support\Facades\Auth::user()->role != \App\Models\User::ROLE_ADMIN)
            <x-profile></x-profile>
        @endif
    </div>
    <div class="col-lg-3 bg-white border-start bg-white message_content">
        <div class="container">
            <div class="row pb-3 px-2 pb-lg-6 mt-5 mt-lg-4">
                <p class="m-0 f-700" style="font-size: 24px !important;">{{ __("profile.chat.messages") }}</p>
                <div class="position-relative mt-3">
                    <input wire:model="search" class="form-control br-12 fs-14 f-500 text-primary bg-transparent"
                           placeholder="{{ __("profile.chat.search") }}">
                    <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-3"></i>
                </div>
                <div class="mt-3 mt-lg-5 mb-6 mb-lg-0">
                    @foreach($chats as $chat)
                        <div class="mb-3" wire:click="select_chat({{$chat}})" style="cursor: pointer">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="me-2">
                                            <img class="chat_avatar"
                                                 src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->userInfo->image ?? "userinfo/unknown.png") : ($chat->user->userInfo->image ?? "")) }}">
{{--                                          @if(\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER) ?? "userinfo/unknown.png")--}}
{{--                                            <img class="chat_avatar"--}}
{{--                                                 src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->userInfo->image ?? "userinfo/unknown.png") : ($chat->user->userInfo->image ?? "")) }}">--}}
{{--                                            @else--}}
{{--                                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"--}}
{{--                                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <path--}}
{{--                                                        d="M25.8072 21.2419C25.6573 20.2742 24.908 18 22.0108 17.129C22.0108 17.129 20.0127 16.5484 18.0147 16.2581C17.5151 16.1613 17.0656 15.9194 16.7659 15.4839H19.5132L19.4633 5.80645C19.2135 2.56452 16.4162 0 12.9695 0C9.57279 0 6.77548 2.56452 6.47577 5.80645L6.42582 15.4839H9.12322C8.5238 16.3065 7.67461 16.2581 7.67461 16.2581C5.97625 16.5 3.97817 17.0806 3.97817 17.0806C1.98009 17.6613 0.631392 19.2581 0.181825 21.2419C-0.46755 24.4839 0.8312 28.3065 0.8312 28.3065C0.8312 28.3065 5.97625 30 13.0195 30C20.0127 30 25.2577 28.3065 25.2577 28.3065C25.2577 28.3065 26.4565 25.3065 25.8072 21.2419ZM7.57471 6.77419H10.372L11.0713 5.41935L11.7707 6.77419H18.5641C18.4642 8.27419 17.8149 10.1129 16.9157 11.6129H14.1184V11.129H13.1194V13.0645H14.1184V12.5806H16.2663C15.3672 13.7419 14.2683 14.5161 13.1194 14.5161C10.2721 14.5161 7.77452 9.87097 7.57471 6.77419ZM18.5142 14.5161H16.4662V13.7419C17.3153 12.8226 18.0147 11.7097 18.5142 10.5V14.5161ZM13.0195 0.967742C15.8667 0.967742 18.2145 3.09677 18.5142 5.80645H12.3201L11.0214 3.29032L9.72264 5.80645H7.57471C7.82447 3.09677 10.1722 0.967742 13.0195 0.967742ZM7.52476 14.5161V10.5C8.02428 11.6613 8.7236 12.8226 9.52283 13.6935V14.5161H7.52476ZM10.5219 14.5645C11.2712 15.1452 12.1203 15.4839 13.0195 15.4839C13.9186 15.4839 14.7178 15.1452 15.4671 14.6129C15.5171 15.871 16.4662 16.9355 17.715 17.1774C17.715 17.1774 17.665 20.1774 17.5151 21.0484C14.7178 22.5484 11.3211 22.5484 8.5238 21.0484C8.37394 20.1774 8.32399 17.1774 8.32399 17.1774C9.57279 16.8871 10.4719 15.8226 10.5219 14.5645ZM1.43062 26.7581C0.981056 25.0161 0.881152 23.1774 1.23082 21.3871C1.78029 18.4355 4.92726 17.8548 5.07711 17.8065L3.92822 19.8871L4.82735 20.7581L3.4287 22.1129L7.12514 28.5484C5.27692 28.3065 3.4287 27.9194 1.68038 27.4355L1.43062 26.7581ZM8.32399 28.7903L4.62755 22.3548L6.22601 20.8065L5.12707 19.7419L6.37586 17.5161C6.67558 17.4677 7.02524 17.371 7.32495 17.3226C7.32495 17.3226 6.62562 23.4677 10.9714 28.9839C10.0723 28.9355 9.22312 28.8871 8.32399 28.7903ZM12.2702 29.0323C10.5718 27.0484 9.37298 24.7258 8.77356 22.2097C10.1223 22.7903 13.2193 23.9032 17.2654 22.2097C16.666 24.6774 15.4671 27.0484 13.7687 29.0323H12.2702ZM18.714 17.3226C19.0637 17.371 19.3634 17.4677 19.6631 17.5161L20.8619 19.7419L19.763 20.8065L21.3614 22.3548L17.715 28.7903C16.8658 28.8871 15.9666 28.9355 15.0675 28.9839C19.4133 23.4194 18.714 17.3226 18.714 17.3226ZM24.6083 26.7581L24.4085 27.5323C22.6102 28.0161 20.762 28.4032 18.9637 28.6452L22.6602 22.2097L21.2615 20.8548L22.1607 19.9839L21.0118 17.9032C24.1587 18.629 24.7082 20.6613 24.8581 21.4839C25.1578 23.2258 25.0579 25.0161 24.6083 26.7581Z"--}}
{{--                                                        fill="black"/>--}}
{{--                                                </svg>--}}
{{--                                            @endif--}}
                                        </div>
                                    </div>
                                    <div>
                                        <a class="text-black">
                                            <p class="m-0 fs-14 f-700">{{ \Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->name ?? "Moderator" ) : $chat->user->name }}</p>
                                        </a>
                                        <p class="m-0 fs-13">{{ $chat->messages->last() ? \Illuminate\Support\Str::of($chat->messages->last()->message)->substr(0,35) : ""}}
                                            ...</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="m-0 fs-12 text-secondary">{{ $chat->messages->last() ? \Carbon\Carbon::make($chat->messages->last()->created_at)->format("H:i") : ""}}</p>
                                        @if($chat->count!=0)
                                            <p class="fs-12 f-700 d-flex rounded-circle justify-content-center noticeCount text-white">{{ $chat->count }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if(\Illuminate\Support\Facades\Auth::user()->role != \App\Models\User::ROLE_ADMIN)
                        <button class="btn btn-primary"
                                wire:click="new_chat">{{ __("profile.chat.new_dialog") }}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-block">
        @if($this->active_chat)
            <div class="py-4 px-5 mt-5 mt-lg-4 py-lg-6 h-100">
                <div class="d-flex justify-content-center message_text">
                    <p class="m-0 fs-12 text-secondary message_text"><span
                            class="message_text2">{{$chat->created_at}}</span>
                    </p>
                </div>
                <div class="mt-4 d-flex flex-column position-relative justify-content-start h-100">
                    <div class="support-chat-div">


                        @foreach($this->active_chat->messages as $message)
                            <div>
                                @if($message->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="p-2 my-1"
                                             style="background-color: #E9F2FA; border-radius: 12px 12px 0 12px">
                                            <p class="m-0 fs-14 f-500">{{ $message->message }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-start mt-2">
                                        <div class="me-2">
                                            <img class="chat_avatar" alt="pic"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image)}}">
{{--                                            @if(\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image))--}}
{{--                                                <img class="chat_avatar" alt="pic"--}}
{{--                                                     src="{{\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image)}}">--}}
{{--                                            @else--}}
{{--                                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"--}}
{{--                                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <path--}}
{{--                                                        d="M25.8072 21.2419C25.6573 20.2742 24.908 18 22.0108 17.129C22.0108 17.129 20.0127 16.5484 18.0147 16.2581C17.5151 16.1613 17.0656 15.9194 16.7659 15.4839H19.5132L19.4633 5.80645C19.2135 2.56452 16.4162 0 12.9695 0C9.57279 0 6.77548 2.56452 6.47577 5.80645L6.42582 15.4839H9.12322C8.5238 16.3065 7.67461 16.2581 7.67461 16.2581C5.97625 16.5 3.97817 17.0806 3.97817 17.0806C1.98009 17.6613 0.631392 19.2581 0.181825 21.2419C-0.46755 24.4839 0.8312 28.3065 0.8312 28.3065C0.8312 28.3065 5.97625 30 13.0195 30C20.0127 30 25.2577 28.3065 25.2577 28.3065C25.2577 28.3065 26.4565 25.3065 25.8072 21.2419ZM7.57471 6.77419H10.372L11.0713 5.41935L11.7707 6.77419H18.5641C18.4642 8.27419 17.8149 10.1129 16.9157 11.6129H14.1184V11.129H13.1194V13.0645H14.1184V12.5806H16.2663C15.3672 13.7419 14.2683 14.5161 13.1194 14.5161C10.2721 14.5161 7.77452 9.87097 7.57471 6.77419ZM18.5142 14.5161H16.4662V13.7419C17.3153 12.8226 18.0147 11.7097 18.5142 10.5V14.5161ZM13.0195 0.967742C15.8667 0.967742 18.2145 3.09677 18.5142 5.80645H12.3201L11.0214 3.29032L9.72264 5.80645H7.57471C7.82447 3.09677 10.1722 0.967742 13.0195 0.967742ZM7.52476 14.5161V10.5C8.02428 11.6613 8.7236 12.8226 9.52283 13.6935V14.5161H7.52476ZM10.5219 14.5645C11.2712 15.1452 12.1203 15.4839 13.0195 15.4839C13.9186 15.4839 14.7178 15.1452 15.4671 14.6129C15.5171 15.871 16.4662 16.9355 17.715 17.1774C17.715 17.1774 17.665 20.1774 17.5151 21.0484C14.7178 22.5484 11.3211 22.5484 8.5238 21.0484C8.37394 20.1774 8.32399 17.1774 8.32399 17.1774C9.57279 16.8871 10.4719 15.8226 10.5219 14.5645ZM1.43062 26.7581C0.981056 25.0161 0.881152 23.1774 1.23082 21.3871C1.78029 18.4355 4.92726 17.8548 5.07711 17.8065L3.92822 19.8871L4.82735 20.7581L3.4287 22.1129L7.12514 28.5484C5.27692 28.3065 3.4287 27.9194 1.68038 27.4355L1.43062 26.7581ZM8.32399 28.7903L4.62755 22.3548L6.22601 20.8065L5.12707 19.7419L6.37586 17.5161C6.67558 17.4677 7.02524 17.371 7.32495 17.3226C7.32495 17.3226 6.62562 23.4677 10.9714 28.9839C10.0723 28.9355 9.22312 28.8871 8.32399 28.7903ZM12.2702 29.0323C10.5718 27.0484 9.37298 24.7258 8.77356 22.2097C10.1223 22.7903 13.2193 23.9032 17.2654 22.2097C16.666 24.6774 15.4671 27.0484 13.7687 29.0323H12.2702ZM18.714 17.3226C19.0637 17.371 19.3634 17.4677 19.6631 17.5161L20.8619 19.7419L19.763 20.8065L21.3614 22.3548L17.715 28.7903C16.8658 28.8871 15.9666 28.9355 15.0675 28.9839C19.4133 23.4194 18.714 17.3226 18.714 17.3226ZM24.6083 26.7581L24.4085 27.5323C22.6102 28.0161 20.762 28.4032 18.9637 28.6452L22.6602 22.2097L21.2615 20.8548L22.1607 19.9839L21.0118 17.9032C24.1587 18.629 24.7082 20.6613 24.8581 21.4839C25.1578 23.2258 25.0579 25.0161 24.6083 26.7581Z"--}}
{{--                                                        fill="black"/>--}}
{{--                                                </svg>--}}
{{--                                            @endif--}}
                                        </div>
                                        <div class="p-2 bg-white" style="border-radius: 12px 12px 12px 0">
                                            <p class="m-0 fs-14 f-500 text-end">{{ $message->message }}</p>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="position-absolute bottom-0 w-100 sms">
                        <div class="position-relative mb-2">
                            <input wire:keydown.enter="send_message" wire:model="message"
                                   class="w-100 py-3 px-3 br-12 border-0 position-relative"
                                   placeholder="Добавить комментарий">
                            <div wire:click="send_message" class="icon-style bg-primary br-12 d-flex justify-content-center align-items-center
                                                    position-absolute top-0 bottom-0 end-0 me-2 mt-2">
                                <i class="far fa-paper-plane text-white"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
    <a id="refresh" wire:click="refresh"></a>
    <script>
        setInterval(function () {
            document.getElementById("refresh").click()
        }, 1000);
    </script>
</div>
