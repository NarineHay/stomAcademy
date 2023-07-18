<div class="col-lg-9 pt-6">
    <div class="pb-lg-6">
        <div class="d-flex justify-content-between">
            <h3 class="f-700 m-0"><?php echo e(__("profile.courses.page_title")); ?></h3>
            <div class="position-relative d-none d-lg-block">
                <input wire:model="search" class="form-control br-12" placeholder="<?php echo e(__("profile.certificates.search")); ?>">
                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="d-flex">
                <a href="#" class="fs-14 f-500 m-0 me-3 me-lg-5 py-2 py-lg-3  text-black"><?php echo e(__("profile.courses.page_menu.all")); ?></a>
                <a href="<?php echo e(route('personal.conferences')); ?>" class="fs-14 f-700 m-0 py-2 py-lg-3 text-black purchaseActive"><?php echo e(__("profile.courses.page_menu.online")); ?></a>
                <a href="<?php echo e(route('personal.courses')); ?>" class="fs-14 f-500 m-0 ms-3 ms-lg-5 py-2 py-lg-3  text-black"
                   style="padding-bottom: 20px"><?php echo e(__("profile.courses.page_menu.course")); ?></a>
            </div>
            <div class="py-2 py-lg-3">
                <div class="d-flex align-items-center d-none d-lg-block">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0"
                                type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(__("profile.courses.directions")); ?>

                        </button>
                        <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input type="checkbox" wire:model="selectedDirections" value="<?php echo e($direction->id); ?>"
                                           class="mr-1 form-check-input">
                                    <label class="form-check-label"><?php echo e($direction->title); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none">
                <i class="fal fa-search"></i>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="bg-white br-12">
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->image)); ?>"
                             class="w-100" alt="pic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 fs-10 m-0"><?php echo e($course->directions->first()->title); ?></p>
                            <p class="f-700 fs-16 m-0 mt-2"><?php echo e($course->info->title); ?></p>
                            <div
                                class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <?php $__currentLoopData = $course->getLectors()->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img
                                            src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->userInfo->image)); ?>"
                                            width="42px" height="42px" class="me-2 rounded-circle"
                                            alt="personPic">
                                        <p class="m-0 fs-14 f-500"><?php echo e($lector->userinfo->fname); ?> <?php echo e($lector->userinfo->lname); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black"><?php echo e(__("profile.courses.show_more")); ?></button>

            <div class="mt-4 d-flex justify-content-center d-lg-block">
                <nav><?php echo e($courses->links()); ?></nav>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/personal-conferences.blade.php ENDPATH**/ ?>