<div class="col-lg-9">
    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
        <div class="d-flex justify-content-between">
            <h3 class="f-700 m-0"><?php echo e(__("profile.profile.page_title")); ?></h3>
        </div>

        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">
                <p class="m-0 f-600 fs-20"><?php echo e(__("profile.profile.main_info")); ?></p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-1">
                <div>
                    <div class="mt-4 d-flex flex-column flex-md-row">
                        <div class="d-flex flex-column w-100">
                            <div class="d-flex flex-column">
                                <label for="fio"><?php echo e(__("profile.profile.fio")); ?></label>
                                <input wire:model='name' name="name" type="text" id="fio" class="form-control mt-1" >
                            </div>
                            <div class="d-flex mt-3 flex-column flex-md-row">
                                <div class="w-100">
                                    <label for="name"><?php echo e(__("profile.profile.bday")); ?></label>
                                    <input wire:model="birth_date" name="birth_date" type="date" id="date" class="form-control mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button wire:click="savePersonalData" class="btn btn-primary py-2 px-4 br-12"><?php echo e(__("profile.save")); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
                <p class="m-0 f-600 fs-20"><?php echo e(__("profile.profile.directions")); ?></p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-4">
                <div class="mt-4 d-flex flex-column justify-content-between">
                    <div class="direction-list">
                        <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input type="checkbox" wire:model="userDirections" value="<?php echo e($direction->id); ?>"
                                <?php if( $user->directions->where("direction_id",$direction->id)->count()): ?> checked <?php endif; ?>
                                       class="mr-1 form-check-input"><label class="form-check-label"><?php echo e($direction->title); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-3">
                        <button wire:click="directions" class="btn btn-primary py-2 px-4 br-12"><?php echo e(__("profile.save")); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php if($success): ?>
            <div data-mdb-delay="5000" data-mdb-autohide="true" class="alert alert-success alert-dismissible fade show mt-3 profile_alert" role="alert">
                <strong><?php echo e($success); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\change-profile-info.blade.php ENDPATH**/ ?>