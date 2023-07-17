<div class="row">
    <div class="col-lg-10 col-12  mb-5 mb-lg-6 pb-lg-4">
        <div class="row mt-4">
            <div class="col-12 d-row d-xl-flex mb-4 mb-lg-6">
                <?php if($blog_top): ?>
                <a href="<?php echo e(route('blog.show',$blog_top->id)); ?>" style="color: inherit" class="d-block">
                    <div class="bg-white br-12">
                        <div>
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($blog_top->info->image)); ?>" class="blogs_top_img" alt="blogPic">
                        </div>
                        <div class="d-flex flex-column mt-3 ms-2 mt-md-4 ms-md-3">
                            <p class="text-primary text-uppercase f-700 fs-10 m-0"><?php echo e($blog_top->direction_title); ?></p>
                            <h5 class="f-700 m-0 mt-3"><?php echo e($blog_top->info->title); ?></h5>
                            <p class="fs-14 f-500 m-0 mt-3 mb-4"><i class="far fa-calendar me-2"></i>
                                <?php echo e(date('d-m-Y', strtotime($blog_top->created_at))); ?>

                            </p>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
                <div class="ms-0 ms-xl-5 mt-4 mt-xl-0">
                    <?php $__currentLoopData = $blogs_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($blog->info->enabled): ?>
                        <a href="<?php echo e(route('blog.show',$blog->id)); ?>" style="color: inherit" class="d-block br-12 d-flex flex-row align-items-center mb-4">
                            <div>
                                <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($blog->info->image)); ?>"
                                     alt="blogPic" style="width: 150px;height: 100px;object-fit: cover" class="br-12">
                            </div>
                            <div class="d-flex flex-column ms-4">
                                <p class="text-primary text-uppercase f-700 fs-10 mt-0"><?php echo e($blog->directions->title); ?></p>
                                <h5 class="f-700 fs-16 m-0">
                                    <span class="text-black"><?php echo e($blog->info->title); ?> </span>
                                </h5>
                                <p class="fs-14 f-500 m-0 mt-4 mt-xl-3"><i class="far fa-calendar me-2"></i>
                                    <?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?>

                                </p>
                            </div>
                        </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('blog.show',$blog->id)); ?>" style="color: inherit" class="d-block col-12 col-md-6 col-lg-3 mt-4 mt-xl-5" >
                    <div class="bg-white br-12 blog_prev">
                        <div>
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($blog->info->image)); ?>" class="blog_prev_img"
                                 alt="blogPic">
                        </div>
                        <div class="d-flex flex-column p-3 p-lg-4">
                            <h5 class="f-700 fs-16 m-0">
                            <span class="text-black"><?php echo e($blog->info->title); ?></span>

                            </h5>
                            <p class="fs-14 f-500 m-0 mt-4"><i class="far fa-calendar me-2"></i>
                                <?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?>

                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($hasMore): ?>
        <button wire:click="loadNext"
                class="w-100 fs-14 f-500 mt-4 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black"><?php echo e(__("index.show_more")); ?></button>

        <div class="mt-4 d-flex justify-content-center d-lg-block">
            <nav>
                <?php echo e($blogs->links()); ?>

            </nav>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-2 col-12 position-relative" style="z-index: 100;top: -200px">
        <div class="aside d-none d-lg-block">
            <div >
                <div class="mt-4 ms-3 pt-5">
                    <h5 class="f-600 m-0"><?php echo e(__("blog.category_title")); ?></h5>
                    <div class="mt-4">
                        <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label wire:click="setDirectionId(<?php echo e($direction->id); ?>)" class="f-500 fs-16 d-flex align-items-center fg-label cursor mt-1"
                                   data-bs-toggle="collapse" data-bs-target="#fg-1">
                                <span><?php echo e($direction->title); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .blogs_top_img{
            width: 655px;
            height: 285px;
            object-fit: cover;
        }
        .blog_prev{
            height: 384px;
        }
        .blog_prev_img{
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</div>




<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\blogs-catalog.blade.php ENDPATH**/ ?>