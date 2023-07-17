<div>
    <form wire:submit.prevent="submit" class="pe-lg-5 pe-0">
        <div>
            <input type="text" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="<?php echo e(__("courses.contacts.form.name")); ?>"
                   wire:model="name">
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
        <div>
            <input type="email" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="<?php echo e(__("courses.contacts.form.email")); ?>"
                   wire:model="email">
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
        <div>
            <input type="tel" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="<?php echo e(__("courses.contacts.form.phone")); ?>" wire:model="phone">
        </div>
        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger error"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div>
            <input type="text" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="<?php echo e(__("courses.contacts.form.q")); ?>" wire:model="question">
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
            <h5 class="text-center text-secondary my-3"><?php echo e(__("courses.contacts.form.email_sent")); ?></h5>
        <?php endif; ?>
        <button type="submit"
            class="btn btn-primary d-flex mx-auto justify-content-center align-content-center w-100 fs-18 f-600 br-12 mb-5 py-3 lh-22 mt-5"
            style="max-width: 737px;"><?php echo e(__("courses.contacts.form.button_question")); ?>

        </button>

    </form>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\are-any-question-form.blade.php ENDPATH**/ ?>