<?php $__env->startSection("content"); ?>

    <div class="container mb-5 mb-lg-6">
        <div>
            <div class="d-flex mt-2 mt-md-3 py-2">
                <a href="<?php echo e(route('home')); ?>" class="text-dark"><p class="fs-12 f-500 text-secondary"><?php echo e(__("header.menu.home")); ?></p></a>
                <a href="<?php echo e(route('lectors.index')); ?>" class="text-dark"><p class="fs-12 f-500 text-secondary ms-3 d-none d-lg-block main"><?php echo e(__("header.menu.lectors")); ?></p></a>
                <a><p class="fs-12 f-500 ms-3 main"><?php echo e($lector->userInfo->fullName); ?></p></a>
            </div>
            <div class="row mt-3 mt-lg-5">
                <div class="col-12 col-lg-4 me-0 me-lg-6">
                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>" class="br-12 w-100" alt="pic">
                </div>
                <div class="col-12 col-lg-6 ms-0 ms-lg-6">
                    <div>
                        <h3 class="f-700 m-0 mt-3 mt-lg-0"><?php echo e($lector->userInfo->fullName); ?></h3>
                        <p class="fs-16 f-500 mt-3 m-0"><?php echo $lector->lector->info->biography ?? ""; ?></p>
                    </div>
                    <div class="mt-4 mb-3">
                        <h3 class="f-700 m-0">Лекции</h3>
                        <?php $__currentLoopData = $lector->lector->webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route("webinar.show",$webinar->id)); ?>" class="text-dark bg-white br-12 d-flex justify-content-between mt-4">
                                <div class="d-flex justify-content-between align-items-center py-2 px-3 fs-14">
                                    <p class="m-0 f-500 text-black-gray"><?php echo e($k + 1); ?></p>
                                    <p class="ms-4 m-0 f-700"><?php echo e($webinar->info->title); ?></p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-3 fs-14">
                                    <i class="far fa-clock"></i>
                                    <p class="m-0 ms-2 f-500 me-2 text-black-gray text-nowrap"><?php echo e($webinar->duration); ?> <?php echo e(__("lectors.min")); ?></p>
                                    <i class="fal fa-angle-right me-4 text-secondary"></i>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\lectors\show.blade.php ENDPATH**/ ?>