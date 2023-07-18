<div class="row">
    <div class="col-lg-2 position-relative d-none d-lg-block first_block" style="z-index: 1;">
        <div class="account_left_aside_bg profile_left"></div>
        <?php if(\Illuminate\Support\Facades\Auth::user()->role != \App\Models\User::ROLE_ADMIN): ?>
            <?php if (isset($component)) { $__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d = $component; } ?>
<?php $component = App\View\Components\Profile::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Profile::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d)): ?>
<?php $component = $__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d; ?>
<?php unset($__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-3 bg-white border-start bg-white message_content">
        <div class="container">
            <div class="row pb-3 px-2 pb-lg-6 mt-5 mt-lg-4">
                <p class="m-0 f-700" style="font-size: 24px !important;"><?php echo e(__("profile.chat.messages")); ?></p>
                <div class="position-relative mt-3">
                    <input wire:model="search" class="form-control br-12 fs-14 f-500 text-primary bg-transparent"
                           placeholder="<?php echo e(__("profile.chat.search")); ?>">
                    <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-3"></i>
                </div>
                <div class="mt-3 mt-lg-5 mb-6 mb-lg-0">
                    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3" wire:click="select_chat(<?php echo e($chat); ?>)" style="cursor: pointer">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="me-2">
                                            <img class="chat_avatar"
                                                 src="<?php echo e(\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->userInfo->image ?? "userinfo/unknown.png") : ($chat->user->userInfo->image ?? ""))); ?>">











                                        </div>
                                    </div>
                                    <div>
                                        <a class="text-black">
                                            <p class="m-0 fs-14 f-700"><?php echo e(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_USER ? ($chat->moder->name ?? "Moderator" ) : $chat->user->name); ?></p>
                                        </a>
                                        <p class="m-0 fs-13"><?php echo e($chat->messages->last() ? \Illuminate\Support\Str::of($chat->messages->last()->message)->substr(0,35) : ""); ?>

                                            ...</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="m-0 fs-12 text-secondary"><?php echo e($chat->messages->last() ? \Carbon\Carbon::make($chat->messages->last()->created_at)->format("H:i") : ""); ?></p>
                                        <?php if($chat->count!=0): ?>
                                            <p class="fs-12 f-700 d-flex rounded-circle justify-content-center noticeCount text-white"><?php echo e($chat->count); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(\Illuminate\Support\Facades\Auth::user()->role != \App\Models\User::ROLE_ADMIN): ?>
                        <button class="btn btn-primary"
                                wire:click="new_chat"><?php echo e(__("profile.chat.new_dialog")); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-block">
        <?php if($this->active_chat): ?>
            <div class="py-4 px-5 mt-5 mt-lg-4 py-lg-6 h-100">
                <div class="d-flex justify-content-center message_text">
                    <p class="m-0 fs-12 text-secondary message_text"><span
                            class="message_text2"><?php echo e($chat->created_at); ?></span>
                    </p>
                </div>
                <div class="mt-4 d-flex flex-column position-relative justify-content-start h-100">
                    <div class="support-chat-div">


                        <?php $__currentLoopData = $this->active_chat->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <?php if($message->user_id == \Illuminate\Support\Facades\Auth::user()->id): ?>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="p-2 my-1"
                                             style="background-color: #E9F2FA; border-radius: 12px 12px 0 12px">
                                            <p class="m-0 fs-14 f-500"><?php echo e($message->message); ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-start mt-2">
                                        <div class="me-2">
                                            <img class="chat_avatar" alt="pic"
                                                 src="<?php echo e(\Illuminate\Support\Facades\Storage::url($message->user->userinfo->image)); ?>">











                                        </div>
                                        <div class="p-2 bg-white" style="border-radius: 12px 12px 12px 0">
                                            <p class="m-0 fs-14 f-500 text-end"><?php echo e($message->message); ?></p>
                                        </div>

                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php endif; ?>
    </div>
    <a id="refresh" wire:click="refresh"></a>
    <script>
        setInterval(function () {
            document.getElementById("refresh").click()
        }, 1000);
    </script>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/support.blade.php ENDPATH**/ ?>