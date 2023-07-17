<div class="col-12 col-lg-6 mt-4 mt-lg-6">
    <div>
        <h5 class="f-600 m-0">У вас есть вопросы?</h5>
    </div>
    <form class="order_input" wire:submit.prevent="submit" method="post">
        <div class="d-flex flex-column flex-lg-row mt-4">
            <div class="d-flex flex-column w-100 <?php if(strlen($name) > 0): ?> focus <?php endif; ?>">
                <label for="exampleInputName" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">ФИО</label>
                <input id="exampleInputName" class="br-12 inputStyle p-2" wire:model="name">
            </div>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger error"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="d-flex flex-column ms-0 ms-lg-3 mt-3 mt-lg-0 w-100 <?php if(strlen($email) > 0): ?> focus <?php endif; ?>">
                <label for="exampleInputEmail2" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">Электронная почта</label>
                <input id="exampleInputEmail2" class="br-12 inputStyle p-2" wire:model="email">
            </div>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger error"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="d-flex flex-column mt-3 d-none d-lg-block <?php if(strlen($question) > 0): ?> focus <?php endif; ?>">
            <textarea class="br-12 inputStyle w-100" rows="5" wire:model="question"></textarea>
        </div>
        <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger error"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php if($success): ?>
            <h5 class="text-center text-secondary mb-3">Email sent successfully</h5>
        <?php endif; ?>
        <div>
            <button class="btn btn-primary mt-4 br-12 py-2 px-5 f-600 fs-14">Задать вопрос</button>
        </div>
    </form>
</div>

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\contact.blade.php ENDPATH**/ ?>