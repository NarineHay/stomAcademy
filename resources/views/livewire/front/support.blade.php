<div class="row">
    <div class="col-lg-2 position-relative d-none d-lg-block first_block" style="z-index: 1;">
        <div class="account_left_aside_bg profile_left"></div>
        @if(\Illuminate\Support\Facades\Auth::user()->role != \App\Models\User::ROLE_ADMIN)
            <x-profile></x-profile>
        @endif
    </div>
    <div class="col-lg-3 bg-white border-start bg-white message_content">
        <div class="container">
            <div class="row  pb-3 px-2 pb-lg-6 mt-5 mt-lg-4">
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
                                        <div class="mr-2 me-2">
                                            {{--                                            <img class="chat_avatar"--}}
                                            {{--                                                 src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->userInfo->image ?? "userinfo/unknown.png") : ($chat->user->userInfo->image ?? "")) }}">--}}
                                            @if($chat->user->userinfo->image)
                                                <img class="chat_avatar"
                                                     src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->userInfo->image ?? "userinfo/call_operator.svg") : ($chat->user->userInfo->image ?? "")) }}">
                                            @else
                                                <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg"
                                                     width="40" height="40" viewBox="0 0 40 40" fill="none">
                                                    <path
                                                        d="M39.7033 28.3226C39.4728 27.0323 38.32 24 33.8628 22.8387C33.8628 22.8387 30.7888 22.0645 27.7149 21.6774C26.9464 21.5484 26.2547 21.2258 25.7936 20.6452H30.0203L29.9435 7.74194C29.5592 3.41935 25.2557 0 19.9531 0C14.7274 0 10.4238 3.41935 9.96272 7.74194L9.88587 20.6452H14.0357C13.1135 21.7419 11.8071 21.6774 11.8071 21.6774C9.19423 22 6.12026 22.7742 6.12026 22.7742C3.0463 23.5484 0.971373 25.6774 0.279731 28.3226C-0.719308 32.6452 1.27877 37.7419 1.27877 37.7419C1.27877 37.7419 9.19423 40 20.03 40C30.7888 40 38.858 37.7419 38.858 37.7419C38.858 37.7419 40.7024 33.7419 39.7033 28.3226ZM11.6534 9.03226H15.9569L17.0328 7.22581L18.1087 9.03226H28.5602C28.4065 11.0323 27.4075 13.4839 26.0242 15.4839H21.7206V14.8387H20.1836V17.4194H21.7206V16.7742H25.0251C23.6419 18.3226 21.9512 19.3548 20.1836 19.3548C15.8033 19.3548 11.9608 13.1613 11.6534 9.03226ZM28.4834 19.3548H25.3325V18.3226C26.639 17.0968 27.7149 15.6129 28.4834 14V19.3548ZM20.03 1.29032C24.4104 1.29032 28.0223 4.12903 28.4834 7.74194H18.9541L16.956 4.3871L14.9579 7.74194H11.6534C12.0376 4.12903 15.6496 1.29032 20.03 1.29032ZM11.5765 19.3548V14C12.345 15.5484 13.4209 17.0968 14.6505 18.2581V19.3548H11.5765ZM16.1875 19.4194C17.3402 20.1935 18.6467 20.6452 20.03 20.6452C21.4132 20.6452 22.6428 20.1935 23.7956 19.4839C23.8724 21.1613 25.3325 22.5806 27.2538 22.9032C27.2538 22.9032 27.1769 26.9032 26.9464 28.0645C22.6428 30.0645 17.4171 30.0645 13.1135 28.0645C12.883 26.9032 12.8061 22.9032 12.8061 22.9032C14.7274 22.5161 16.1106 21.0968 16.1875 19.4194ZM2.20096 35.6774C1.50932 33.3548 1.35562 30.9032 1.89356 28.5161C2.7389 24.5806 7.5804 23.8065 7.81094 23.7419L6.04341 26.5161L7.4267 27.6774L5.27492 29.4839L10.9618 38.0645C8.11834 37.7419 5.27492 37.2258 2.5852 36.5806L2.20096 35.6774ZM12.8061 38.3871L7.1193 29.8065L9.57847 27.7419L7.88779 26.3226L9.80902 23.3548C10.2701 23.2903 10.8081 23.1613 11.2692 23.0968C11.2692 23.0968 10.1933 31.2903 16.8791 38.6452C15.4959 38.5806 14.1894 38.5161 12.8061 38.3871ZM18.8772 38.7097C16.2643 36.0645 14.42 32.9677 13.4978 29.6129C15.5727 30.3871 20.3373 31.871 26.5621 29.6129C25.6399 32.9032 23.7956 36.0645 21.1827 38.7097H18.8772ZM28.7908 23.0968C29.3287 23.1613 29.7898 23.2903 30.2509 23.3548L32.0953 26.3226L30.4046 27.7419L32.8638 29.8065L27.2538 38.3871C25.9473 38.5161 24.564 38.5806 23.1808 38.6452C29.8666 31.2258 28.7908 23.0968 28.7908 23.0968ZM37.8589 35.6774L37.5515 36.7097C34.785 37.3548 31.9416 37.871 29.175 38.1935L34.8618 29.6129L32.7101 27.8064L34.0933 26.6452L32.3258 23.871C37.1673 24.8387 38.0126 27.5484 38.2432 28.6452C38.7043 30.9677 38.5506 33.3548 37.8589 35.6774Z"
                                                        fill="black"/>
                                                </svg>
                                            @endif
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

    @if($this->active_chat)
        <div class="col-lg-7 ">
            <div class="ml-3 personal-help-chat-mobile-div">
                <p class="m-0 f-700 d-block d-lg-none color-23" wire:click="closeChat"
                   style="font-size: 24px !important;">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29 29" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15.7071 5.29289C16.0976 5.68342 16.0976 6.31658 15.7071 6.70711L10.4142 12L15.7071 17.2929C16.0976 17.6834 16.0976 18.3166 15.7071 18.7071C15.3166 19.0976 14.6834 19.0976 14.2929 18.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L14.2929 5.29289C14.6834 4.90237 15.3166 4.90237 15.7071 5.29289Z"
                              fill="black"/>
                    </svg>
                </span>
                    <span> {{ __("profile.chat.chat_support") }}</span>
                </p>
                <div class="py-4 px-0 mt-0 mt-lg-4 py-lg-6 h-100 h-100-mobile">
                    <div class="d-flex justify-content-center message_text px-lg-5 border-0">
                        <p class="m-0 fs-12 text-secondary message_text"><span
                                class="message_text2">{{$chat->created_at}}</span>
                        </p>
                    </div>
                    <div class="mt-4 d-flex flex-column position-relative justify-content-start h-100 ps-lg-5">
                        <div class="support-chat-div pe-lg-3">


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
                                            <div class="mr-2 me-2">
                                                {{--                                            <img class="chat_avatar" alt="pic"--}}
                                                {{--                                                 src="{{\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image)}}">--}}
                                                @if($message->user->userinfo->image)
                                                    <img class="chat_avatar" alt="pic"
                                                         src="{{\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image)}}">
                                                @else
                                                    <svg width="26" height="30" viewBox="0 0 26 30" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M25.8072 21.2419C25.6573 20.2742 24.908 18 22.0108 17.129C22.0108 17.129 20.0127 16.5484 18.0147 16.2581C17.5151 16.1613 17.0656 15.9194 16.7659 15.4839H19.5132L19.4633 5.80645C19.2135 2.56452 16.4162 0 12.9695 0C9.57279 0 6.77548 2.56452 6.47577 5.80645L6.42582 15.4839H9.12322C8.5238 16.3065 7.67461 16.2581 7.67461 16.2581C5.97625 16.5 3.97817 17.0806 3.97817 17.0806C1.98009 17.6613 0.631392 19.2581 0.181825 21.2419C-0.46755 24.4839 0.8312 28.3065 0.8312 28.3065C0.8312 28.3065 5.97625 30 13.0195 30C20.0127 30 25.2577 28.3065 25.2577 28.3065C25.2577 28.3065 26.4565 25.3065 25.8072 21.2419ZM7.57471 6.77419H10.372L11.0713 5.41935L11.7707 6.77419H18.5641C18.4642 8.27419 17.8149 10.1129 16.9157 11.6129H14.1184V11.129H13.1194V13.0645H14.1184V12.5806H16.2663C15.3672 13.7419 14.2683 14.5161 13.1194 14.5161C10.2721 14.5161 7.77452 9.87097 7.57471 6.77419ZM18.5142 14.5161H16.4662V13.7419C17.3153 12.8226 18.0147 11.7097 18.5142 10.5V14.5161ZM13.0195 0.967742C15.8667 0.967742 18.2145 3.09677 18.5142 5.80645H12.3201L11.0214 3.29032L9.72264 5.80645H7.57471C7.82447 3.09677 10.1722 0.967742 13.0195 0.967742ZM7.52476 14.5161V10.5C8.02428 11.6613 8.7236 12.8226 9.52283 13.6935V14.5161H7.52476ZM10.5219 14.5645C11.2712 15.1452 12.1203 15.4839 13.0195 15.4839C13.9186 15.4839 14.7178 15.1452 15.4671 14.6129C15.5171 15.871 16.4662 16.9355 17.715 17.1774C17.715 17.1774 17.665 20.1774 17.5151 21.0484C14.7178 22.5484 11.3211 22.5484 8.5238 21.0484C8.37394 20.1774 8.32399 17.1774 8.32399 17.1774C9.57279 16.8871 10.4719 15.8226 10.5219 14.5645ZM1.43062 26.7581C0.981056 25.0161 0.881152 23.1774 1.23082 21.3871C1.78029 18.4355 4.92726 17.8548 5.07711 17.8065L3.92822 19.8871L4.82735 20.7581L3.4287 22.1129L7.12514 28.5484C5.27692 28.3065 3.4287 27.9194 1.68038 27.4355L1.43062 26.7581ZM8.32399 28.7903L4.62755 22.3548L6.22601 20.8065L5.12707 19.7419L6.37586 17.5161C6.67558 17.4677 7.02524 17.371 7.32495 17.3226C7.32495 17.3226 6.62562 23.4677 10.9714 28.9839C10.0723 28.9355 9.22312 28.8871 8.32399 28.7903ZM12.2702 29.0323C10.5718 27.0484 9.37298 24.7258 8.77356 22.2097C10.1223 22.7903 13.2193 23.9032 17.2654 22.2097C16.666 24.6774 15.4671 27.0484 13.7687 29.0323H12.2702ZM18.714 17.3226C19.0637 17.371 19.3634 17.4677 19.6631 17.5161L20.8619 19.7419L19.763 20.8065L21.3614 22.3548L17.715 28.7903C16.8658 28.8871 15.9666 28.9355 15.0675 28.9839C19.4133 23.4194 18.714 17.3226 18.714 17.3226ZM24.6083 26.7581L24.4085 27.5323C22.6102 28.0161 20.762 28.4032 18.9637 28.6452L22.6602 22.2097L21.2615 20.8548L22.1607 19.9839L21.0118 17.9032C24.1587 18.629 24.7082 20.6613 24.8581 21.4839C25.1578 23.2258 25.0579 25.0161 24.6083 26.7581Z"
                                                            fill="black"/>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="p-2 bg-white" style="border-radius: 12px 12px 12px 0">
                                                <p class="m-0 fs-14 f-500 text-end">{{ $message->message }}</p>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="position-absolute bottom-0 w-100 sms pe-lg-5">
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
            </div>
        </div>
    @endif

    <a id="refresh" wire:click="refresh"></a>
    <script>
        setInterval(function () {
            document.getElementById("refresh").click()
        }, 1000);
    </script>
</div>
