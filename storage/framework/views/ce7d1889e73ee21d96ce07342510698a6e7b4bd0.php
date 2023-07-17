<?php $__env->startSection("content"); ?>
    <div class="container mt-4 mt-lg-6">
        <div class="row">
            <div class="col-12 col-lg-4">
                <h2 class="f-700 m-0"><?php echo __("about.block_1.h2"); ?></h2>
                <p class="m-0 fs-16 f-500 mt-4"><?php echo __("about.block_1.under_title"); ?></p>
            </div>
            <div class="col-12 col-lg-6 mb-3 mt-3 mt-lg-0 about_text offset-lg-2">
                <div class="row">
                    <div class="col-6 border-bottom py-3">
                        <h4 class="text-primary f-700 m-0" style="font-size:64px">100 000</h4>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0"><?php echo e(__("about.text_block.0.title")); ?></h5>
                    </div>
                    <div class="col-6 border-bottom py-3">
                        <p class="m-0 fs-16 f-500 pt-2"><?php echo e(__("about.text_block.0.text")); ?></p>
                    </div>
                    <div class="col-6 border-bottom py-3">
                        <h4 class="text-primary f-700 m-0" style="font-size:64px">97</h4>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0"><?php echo e(__("about.text_block.1.title")); ?></h5>
                    </div>
                    <div class="col-6 border-bottom py-3">
                        <p class="m-0 fs-16 f-500 pt-2"><?php echo e(__("about.text_block.1.text")); ?></p>
                    </div>
                    <div class="col-6 border-bottom py-3">
                        <h4 class="text-primary f-700 m-0" style="font-size:64px">3.5</h4>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0"><?php echo e(__("about.text_block.2.title")); ?></h5>
                    </div>
                    <div class="col-6 border-bottom py-3">
                        <p class="m-0 fs-16 f-500 pt-2"><?php echo e(__("about.text_block.2.text")); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Mission part-->
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 mt-lg-6">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    
                    <div id="player" style="width: 100%; height: 100%"
                         class=" plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                        <iframe width="1400" height="630" src="<?php echo e($video->url); ?>&vq=hd1080" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        
                        
                        
                        











                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 mt-lg-6 mb-4 mb-lg-6">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <h3 class="f-600 m-0 text-center"><?php echo e(__("about.slogn")); ?></h3>
                        <div class="text-center">
                            <img src="dist/image/aboutLogo.png" alt="pic" class="mt-4">
                            <p class="fs-12 f-700 m-0 mt-3">STOM-ACADEMY</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--dentistry-->
    <div class="container mt-5 mt-lg-6">
        <div class="row">
            <div class="col-lg-5 col-12">
                <h3 class="f-700 mb-3 mb-lg-5 m-0"><?php echo e(__("about.lectors_title")); ?></h3>
            </div>
        </div>
        <div class="row lecturers pb-6">
            <?php $__currentLoopData = $lectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($lector->lector->info->enabled): ?>
                <div class="col-6 col-lg-3">
                    <a href="<?php echo e(route("lectors.show",$lector->id)); ?>" class="bg-white br-12 d-block"
                       style="color: inherit">
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->userinfo->image)); ?>"
                             style="width: 100%; height: 300px; object-fit: cover;    object-position: top center;" alt="lecturerPic">
                        <div class="text-black p-3">
                            <p class="fs-20 f-700 text-black"> <?php echo e($lector->userinfo->fullName); ?></p>
                            
                            <p class="text-secondary fs-14 f-500"><?php echo e($lector->directions->first()->direction->title); ?></p>
                            


                            <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500"><?php echo e($lector->webinars_count); ?> лекции</span>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- LOOKING FOR GOOD SPECIALISTS -->
    <div class="container">
        <div class="row mt-5 mb-0 mb-lg-6 align-items-center flex-column flex-lg-row">
            <div class="col-lg-4 col-12">
                <div>
                    <h2 class="m-0 f-700"><?php echo e(__("about.specialists.title")); ?></h2>
                    <p class="m-0 fs-16 f-500 mt-2 mt-lg-3"><?php echo e(__("about.specialists.text")); ?></p>
                    <button class="btn btn-primary py-2 px-4 px-lg-5 br-12 fs-16 f-600 mt-3 mt-lg-5"
                            data-bs-toggle="modal"
                            data-bs-target="#lectorModal"><?php echo e(__("about.specialists.button")); ?></button>
                </div>
            </div>
            <div class="col-lg-6 offset-2 mt-4 mt-lg-0 col-12 looking-img">
                <img src="dist/image/about5.png" class="w-100" alt="pic">
            </div>
        </div>
    </div>

    <!--What lecturers say about us-->
    <div class="container">
        <div class="row mt-4 mt-lg-0 mb-5 mb-lg-6">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <h2 class="f-700 m-0"><?php echo e(__("about.say_about.title")); ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <div id="player1" style="width: 100%; height: 100%" class=" plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                        <iframe class="w-100" height="235" src="https://www.youtube.com/embed/5Ok9oDQgzxs&vq=hd1080"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/lector2.png"
                             class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2 lector_avatar" alt="pic"
                             width="42px" height="42px">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0"><?php echo e(__("about.say_about.lectors.0.name")); ?></p>
                        <p class="m-0 fs-14 text-secondary f-500"><?php echo e(__("about.say_about.lectors.0.text")); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <div id="player2" style="width: 100%; height: 100%" class=" plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                    <iframe class="w-100" height="235" src="https://www.youtube.com/embed/X-kpSmXVuJw&vq=hd1080"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/lector1.png"
                             class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2 lector_avatar" alt="pic"
                             width="42px" height="42px">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0"><?php echo e(__("about.say_about.lectors.1.name")); ?></p>
                        <p class="m-0 fs-14 text-secondary f-500"><?php echo e(__("about.say_about.lectors.1.text")); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <div id="player3" style="width: 100%; height: 100%" class=" plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                    <iframe class="w-100" height="235" src="https://www.youtube.com/embed/tW0k--u0URc&vq=hd1080"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/lector4.png"
                             class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2 lector_avatar" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0"><?php echo e(__("about.say_about.lectors.2.name")); ?></p>
                        <p class="m-0 fs-14 text-secondary f-500"><?php echo e(__("about.say_about.lectors.2.text")); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <div id="player4" style="width: 100%; height: 100%" class=" plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                    <iframe class="w-100" height="235" src="https://www.youtube.com/embed/QPXue2tybcs&vq=hd1080"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/lector3.png"
                             class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2 lector_avatar"
                             width="42px" height="42px" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0"><?php echo e(__("about.say_about.lectors.3.name")); ?></p>
                        <p class="m-0 fs-14 text-secondary f-500"><?php echo e(__("about.say_about.lectors.3.text")); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Do you have any questions?-->
    <div class="container">
        <?php if (isset($component)) { $__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b = $component; } ?>
<?php $component = App\View\Components\ContactForm::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('contact-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ContactForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b)): ?>
<?php $component = $__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b; ?>
<?php unset($__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b); ?>
<?php endif; ?>
    </div>
    <style>
        #contacts {
            background-color: inherit !important;
        }

        #contacts input {
            background-color: inherit !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\about.blade.php ENDPATH**/ ?>