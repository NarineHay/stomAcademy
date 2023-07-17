<div class="modal-content">
    <form wire:submit.prevent="submit" method="post">
        <div class="modal-header">
            <h1 class="modal-title fs-5 f-700" id="lectorModalLabel"><?php echo e(__("modals.to_by_lector.h1")); ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" wire:model="name" class="form-control mb-4 <?php if(strlen($name) > 0): ?> focus <?php endif; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="<?php echo e(__("modals.name")); ?>" >
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

            <input type="email" wire:model="email" class="form-control mb-4 <?php if(strlen($email) > 0): ?> focus <?php endif; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="<?php echo e(__("modals.email")); ?>">
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

            <input type="text" wire:model="phone" class="form-control mb-4 <?php if(strlen($phone) > 0): ?> focus <?php endif; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="<?php echo e(__("modals.phone")); ?>">
        </div>
        <?php if($success): ?>
            <h5 class="text-center text-secondary mb-3"><?php echo e(__("modals.to_by_lector.success")); ?></h5>
        <?php endif; ?>
        <div class="modal-footer">
            <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12 white-space"><?php echo e(__("modals.to_by_lector.button")); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/become-lector.blade.php ENDPATH**/ ?>