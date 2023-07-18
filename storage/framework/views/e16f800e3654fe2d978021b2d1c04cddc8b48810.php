<?php $__env->startSection("content"); ?>
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
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
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="mt-0 mb-3 mb-lg-5 py-5 py-lg-6">
                        <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-5">
                            <h3 class="f-700 m-0"><?php echo e(__("profile.certificates.title")); ?></h3>
                            <div class="position-relative d-none d-lg-block">
                                <input class="form-control br-12" placeholder="<?php echo e(__("profile.certificates.search")); ?>">
                                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
                            </div>
                        </div>
                        <div>
                            <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center bg-white br-12 p-3 mb-3">
                                    <div class="d-flex align-items-center flex-column flex-lg-row">
                                        <div>
                                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($certificate->image)); ?>" alt="pic" width="162" height="114">
                                        </div>
                                        <div class="ms-lg-4">
                                            <p class="m-0 fs-20 f-700 mb-2 mt-2 mt-lg-0 text-center text-lg-start">
                                                <?php echo e($certificate->course->info->title); ?>

                                            </p>
                                            <div class="d-flex flex-column flex-xl-row">
                                                <div class="d-flex justify-content-center justify-content-lg-start">
                                                    <p class="fs-14 f-500 m-0 text-secondary"><?php echo e(__("profile.certificates.number")); ?></p>
                                                    <p class="fs-14 f-600 m-0 ms-1 ms-md-2"><?php echo e(__("profile.certificates.reg_num")); ?><?php echo e($certificate->id); ?></p>
                                                </div>
                                                <div class="d-flex ms-0 ms-xl-5 justify-content-center justify-content-lg-start">
                                                    <p class="fs-14 f-500 m-0 text-secondary"><?php echo e(__("profile.certificates.hourse")); ?></p>
                                                    <p class="fs-14 f-600 m-0 ms-1 ms-md-2"><?php echo e($certificate->hours_number); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?php echo e(route('download',$certificate->id)); ?>" class="btn btn-outline-primary py-2 px-3 px-xxl-4 br-12 fs-14 f-600 mt-3 mt-mb-0 w-100">
                                            <i class="fal fa-arrow-to-bottom me-2"></i><?php echo e(__("profile.certificates.download")); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/front/personal/certificate.blade.php ENDPATH**/ ?>