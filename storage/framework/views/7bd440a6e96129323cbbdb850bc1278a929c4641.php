<div class="row">
    <div class="col-lg-10 col-12 mb-5 mb-lg-6">
        <div class="d-flex mt-2 mt-md-3 py-2">
            <a href="<?php echo e(route('home')); ?>" class="text-dark"><span class="fs-12 f-500 text-secondary"><?php echo e(__("header.menu.home")); ?></span></a>
            <a><span class="fs-12 f-500 ms-4 main"><?php echo e(__("header.menu.lectors")); ?></span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0"><?php echo e(__("lectors.h1")); ?></h2>
        </div>
        <div class="row mt-4">
            <?php $__currentLoopData = $lectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($lector->lector->info->enabled): ?>
                <div class="col-xxl-55 col-lg-3 col-md-4 col-6 mb-3">
                    <a href="<?php echo e(route('lectors.show',$lector->id)); ?>" class="bg-white br-12 d-block">
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>" class="lector_card_photo w-100" alt="lecturerPic">
                        <div class="p-3">
                            <p class="fs-20 f-700 text-black" style="min-height: 60px">
                                <?php echo e($lector->userinfo->fullName); ?>

                            </p>
                            <p class="fs-14 f-500 text-secondary text-black"><?php echo e($lector->directions->first()->direction->title); ?></p>
                            <i class="fal fa-layer-group text-black"></i><span class="ms-2 fs-14 f-500 text-black"><?php echo e($lector->webinars_count); ?> <?php echo e(__("lectors.webinar_count")); ?></span>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 d-lg-none show_more_btn text-black bg-transparent">
            <?php echo e(__("index.show_more")); ?></button>

        <div class="mt-4 d-flex justify-content-center d-lg-block">
            <nav>
                <?php echo e($lectors->links()); ?>

            </nav>
        </div>
    </div>
    <div class="col-lg-2 col-12 position-relative" style="z-index: 100">
        <div class="aside d-none d-lg-block">
            <div >
                <div class="mt-4 ms-3 pt-5">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span><?php echo e(__("lectors.filter")); ?></span><i class="fal fa-angle-right"></i></label>
                    <div class="mt-2 collapse show" id="fg-1">
                        <ul class="list-unstyled m-0 p-0">
                            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <input wire:model="selectedDirections" type="checkbox" id="dir-<?php echo e($direction->id); ?>" value="<?php echo e($direction->id); ?>" class="mt-2">
                                    <label for="dir-<?php echo e($direction->id); ?>" class="f-500 fs-14"><?php echo e($direction->title); ?></label><br>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\lectors-catalog.blade.php ENDPATH**/ ?>