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

                <a href="<?php echo e(route('personal.conferences')); ?>" class="fs-14 f-500 m-0 py-2 py-lg-3 text-black"><?php echo e(__("profile.courses.page_menu.online")); ?></a>
                <a href="<?php echo e(route('personal.courses')); ?>" class="fs-14 f-700 m-0 ms-3 ms-lg-5 py-2 py-lg-3 purchaseActive text-black"
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
                    <a href="<?php echo e(route("personal.courses.show",$course->id)); ?>" style="color: inherit"
                       class="col-xxl-3 col-lg-4 col-sm-6 col-12 my-3 md-sm-0">
                        <div class="bg-white br-12">
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->image)); ?>" class="w-100"
                                 alt="addPic" style="width: 250px; height: 150px; object-fit: cover">
                            <div class="p-3">
                                <p class="text-primary text-uppercase f-700 mt-2 fs-10"><?php echo e($course->directions->first()->title); ?></p>
                                <p class="f-700 fs-16 courseTxt-index"><?php echo e($course->info->title); ?></p>
                                <div
                                    class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center"
                                    style="min-height: 63px;">
                                    <div class="d-flex align-items-center me-2">
                                        <div class="d-flex align-items-center">
                                            <?php $__currentLoopData = $course->getLectors()->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img
                                                    src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->userInfo->image)); ?>"
                                                    style="width: 48px;height: 48px;object-fit: cover"
                                                    class="<?php if($k>0): ?> m-25 <?php endif; ?> rounded-circle border" alt="personPic">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($course->getLectors()->count() == 1): ?>
                                                <p class="m-0 ms-2 fs-14 f-500"><?php echo e($course->getLectors()[0]->userinfo->fname); ?> <?php echo e($course->getLectors()[0]->userinfo->lname); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <?php if($course->getLectors()->count() > 1): ?>
                                                <span class="fs-14 f-500 ms-2 "><?php echo e(\App\Helpers\TEXT::lectorCount($course->getLectors()->count())); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black"><?php echo e(__("profile.courses.show_more")); ?></button>

            <div class="mt-4 d-flex justify-content-center d-lg-block">
                <nav><?php echo e($courses->links()); ?></nav>
            </div>















        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/livewire/front/personal-courses.blade.php ENDPATH**/ ?>