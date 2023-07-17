<div>
    <form wire:submit.prevent="submit">
        <label
            class="text-white fs-14 lh-14 fw-normal"><?php echo e(__("courses.reg.form.label.name")); ?></label>
        <input type="text" class="form-control mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="<?php echo e(__("courses.reg.form.placeholder.name")); ?>"
               wire:model="name">
        <div>
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
        </div>

        <label
            class="text-white fs-14 lh-14 fw-normal"><?php echo e(__("courses.reg.form.label.email")); ?></label>
        <input type="email" class="form-control mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="<?php echo e(__("courses.reg.form.placeholder.email")); ?>"
               wire:model="email">
        <div>
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

        <label
            class="text-white fs-14 lh-14 fw-normal"><?php echo e(__("courses.reg.form.label.phone")); ?></label>
        <input type="tel"  class="form-control input_tel_registr mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="<?php echo e(__("courses.reg.form.placeholder.phone")); ?>"
               wire:model="phone">
        <div>
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
        </div>
        <?php if($success): ?>
            <h5 class="text-center text-secondary my-3"><?php echo e(__("courses.contacts.form.email_sent")); ?></h5>
        <?php endif; ?>
        <button type="submit"
            class="btn btn-outline-primary w-100 fs-18 f-600 br-12 lh-23 text-white py-3 mt-3"
            style="background-color: #5CB0FF;"><?php echo e(__("courses.reg.form.button")); ?>

        </button>
    </form>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/reg-online-course-form.blade.php ENDPATH**/ ?>