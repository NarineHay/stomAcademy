<div class="bg-white d-flex justify-content-center flex-column align-items-center br-12 p-4">
    <p class="fs-20 f-600 text-center text-dark m-0"><?php echo e(__("header.form.title")); ?></p>
    <div class="form-group">
        <label for="exampleInputEmail1" class="mt-4 mb-1 text-secondary f-500 fs-12 m-0"><?php echo e(__("header.form.email")); ?></label>
        <input type="email" wire:model="email" class="form-control text-secondary br-12" id="exampleInputEmail1"
               aria-describedby="emailHelp">
    </div>
    <div class="form-group mt-3 mb-2">
        <div class="d-flex justify-content-between align-items-center">
            <label for="exampleInputPassword1"
                   class="mb-1 text-secondary f-500 fs-12 m-0"><?php echo e(__("header.form.password")); ?></label>
            <span class="text-primary fs-12 f-500 m-0"><?php echo e(__("header.form.password_forget")); ?></span>
        </div>
        <div class="position-relative password_container">
            <input wire:model="password" type="password" class="form-control br-12" id="exampleInputPassword1">
            <i class="fal eye fa-eye-slash text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
            <i class="fal eye fa-eye text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
        </div>
    </div>
    <?php if($error): ?> <p class="p-0 mb-1 text-danger f-500 fs-12 m-0"><?php echo e($error); ?></p> <?php endif; ?>
    <button type="submit" wire:click="login" class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12"><?php echo e(__("header.form.login")); ?></button>
    <div class="mt-4 text-center">
        <span class="text-secondary me-1 fs-14 f-500 m-0"><?php echo e(__("header.form.first_time")); ?></span>
        <a wire:click="changeType" class="text-primary fs-14 f-500 m-0"><?php echo e(__("header.form.register")); ?></a>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/home-login.blade.php ENDPATH**/ ?>