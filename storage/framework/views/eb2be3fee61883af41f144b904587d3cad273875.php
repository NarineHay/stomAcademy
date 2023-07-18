<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden ">
        <div class="courses-show-div">
            <div class="div-menu-2"
                 style="background-image: url(<?php echo e(\Illuminate\Support\Facades\Storage::url($course->bg_image)); ?>);">
                <div class="container position-relative">
                    <div class="menu">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__("header.menu.home")); ?></a>
                        <span>|</span>
                        <a href="<?php echo e(route('course.index')); ?>"><?php echo e(__("header.menu.courses")); ?></a>
                        <span>|</span>
                        <a><span class="fs-12 f-500 m-0"><?php echo e($course->info->title); ?></span></a>
                    </div>
                    <div class="d-block d-lg-none pt-4">
                        <div class="about-course1">
                            <h1 class="text-white fw-bolder fs-24 lh-30"><?php echo e($course->info->title); ?></h1>
                            <?php if($course->webinars): ?>
                                <p class="text-white fs-13"><?php echo e($course->webinars->count()); ?> <?php echo e(__("courses.under_title")); ?></p>
                            <?php endif; ?>
                            <div class="d-flex flex-row">
                                <div class="images">
                                    <?php $__currentLoopData = $course->getLectors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img
                                            src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>"
                                            alt="avatar3.png">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="txts d-flex flex-row">
                                    <div class="txts1">
                                        <p class="txts-1-title text-white mb-1"><?php echo e(__("courses.filters.lector")); ?></p>
                                        <a href="#lectors">
                                            <div class="d-flex flex-row align-items-center">
                                                <p class="p-name mb-0 me-1"><?php echo e($course->getLectors()->first()->userInfo->fullName); ?></p>
                                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
                                                          fill="#FFFFFF"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="txts1 d-xxl-block d-none">
                                        <p class="txts-1-title"><?php echo e(__("courses.start")); ?></p>
                                        <p><?php echo e(\Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y")); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="txts1 d-xxl-none d-flex flex-row mt-3 align-items-center mb-2 text-white pb-3">
                                <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500 text-white"><?php echo e(__("courses.start")); ?></p>
                                <p class="mb-0 fs-14 lh-17 f-700 text-white"><?php echo e(\Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y")); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main2">
                <div class="backgraund-wite"
                     style="width: 100%; background: white; height: 318px; position: absolute;"></div>
                <div class="container eng-doctors-txt sss">
                    <div class="row">
                        <div class="d-none d-lg-block col-12 col-lg-8">
                            <div class="about-course1">
                                <h1 class="text-primary fw-bolder fs-30 lh-40"><?php echo e($course->info->title); ?></h1>
                                <?php if($course->webinars): ?>
                                    <p><?php echo e(__("courses.under_title",['count' => $course->webinars->count()])); ?></p>
                                <?php else: ?>
                                    <p><?php echo e(__("courses.under_title_web")); ?></p>
                                <?php endif; ?>
                                <div class="d-flex flex-row">
                                    <div class="images">
                                        <?php $__currentLoopData = $course->getLectors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img
                                                src="<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>"
                                                alt="avatar3.png">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="txts d-flex flex-row">
                                        <div class="txts1">
                                            <p class="txts-1-title"><?php echo e(__("courses.filters.lector")); ?></p>
                                            <a href="#lectors">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="p-name"><?php echo e($course->getLectors()->first()->userInfo->fullName); ?></p>
                                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
                                                              fill="#232323"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="txts1 d-xxl-block d-none">
                                            <p class="txts-1-title"><?php echo e(__("courses.start")); ?></p>
                                            <?php if(\Illuminate\Support\Carbon::make($course->start_date)->getTimestamp() < \Illuminate\Support\Carbon::now()->getTimestamp()): ?>
                                                <p>Доступно к просмотру после покупки</p>
                                            <?php else: ?>
                                                <p><?php echo e(\Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y")); ?></p>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="txts1 d-xxl-none d-flex flex-row mt-3 align-items-center">
                                    <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500"><?php echo e(__("courses.start")); ?></p>
                                    <?php if(\Illuminate\Support\Carbon::make($course->start_date)->getTimestamp() < \Illuminate\Support\Carbon::now()->getTimestamp()): ?>
                                        <p class="mb-0 fs-14 lh-17 f-700">Доступно к просмотру после покупки</p>
                                    <?php else: ?>
                                        <p class="mb-0 fs-14 lh-17 f-700"><?php echo e(\Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y")); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="about-course-txt d-lg-block d-none">
                                <h2 class="f-700 fs-32 lh-40"><?php echo e(__("courses.desc_title")); ?></h2>
                                <p class="fs-16 lh-27 f-500 mb-0">
                                    <?php echo $course->info->description; ?>

                                </p>
                            </div>


                        <!-- <div id="course-program" class="main3">
                    <div class="container">
                        <div class="row">

                            <div class="col-12">
                                <div class="mt-4 mt-lg-0">
                                    <h3 class="f-700 m-0 lh-40 pb-2"><?php echo e(__("courses.menu.program")); ?></h3>
                                    <div class="mt-2">

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card course_card_static">
                                <div class="card-body">
                                    <div class="img_video video_block position-relative">
                                        <?php
                                            $x = explode("/",$course->video);
                                            $preview = 'https://img.youtube.com/vi/'.array_pop($x).'/hqdefault.jpg';
                                        ?>


                                        <?php if($course->video): ?>
                                            <div id="player"
                                                 class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">
                                                <iframe style="z-index: 1;left: 0" class="position-absolute d-none"
                                                        width="100%"
                                                        height="100%" src="<?php echo e($course->video); ?>&vq=hd1080"
                                                        title="Walter Devoto about Stom Academy." frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                            </div>
                                        <?php else: ?>

                                            <?php if($course->bg_image): ?>
                                                <img class="img_preview" src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->bg_image)); ?>">
                                            <?php else: ?>

                                                <div class="img_preview_gray_bg w-100 " style="height: 233px; background-color: rgba(0,0,0,0.4)"></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        


                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="card-txts">
                                        
                                        <p class="m-0 text-secondary fs-14 f-500 card-price-txt"><?php echo e(__("courses.price_all")); ?></p>
                                        <h3 class="f-700 mt-0 text-primary">
                                            <?php if($course->sale): ?>
                                                <span><?php echo e($course->sale->html()); ?></span>
                                                <span>/</span>
                                                <span
                                                    class="del"><?php echo e($course->price->html()); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($course->price->html()); ?></span>
                                            <?php endif; ?>
                                        </h3>
                                    <!-- <p class="f-500 fs-14 lh-17 mb-2">
                                            <?php if($course->webinars): ?>
                                        <?php echo e($course->webinars->count()); ?> <?php echo e(__("courses.under_title")); ?>

                                            <span class="text-primary">1 <?php echo e(__("courses.free")); ?></span></p>
                                        <p class="f-500 fs-14 lh-17 mb-3"><?php echo e(__("courses.dop")); ?></p>
                                        <?php endif; ?> -->
                                        <p class="f-500 fs-14 lh-17 mb-2">
                                            7-дневная гарантия замены или возврата дене
                                        </p>

                                    </div>

                                    <form action="#" class="course-card-form">
                                        <?php if($course->webinars): ?>
                                            <div
                                                class="course-card-form-div d-flex justify-content-between flex-column flex-lg-row mb-3 ff">
                                                <div class="form-check">
                                                    <input type="checkbox" class="mr-1 form-check-input ">
                                                    <label
                                                        class="form-check-label fs-14">1 <?php echo e(__("courses.free")); ?></label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" checked=""
                                                           class="mr-1 form-check-input">
                                                    <label
                                                        class="form-check-label  fs-14"><?php echo e(__("courses.all_course")); ?>

                                                        (<?php echo e($course->sale->rub ?? $course->price->html()); ?>)</label>
                                                </div>
                                            </div>
                                            <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#webinarSelectModal"
                                                    class="btn btn-outline-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                <?php echo e(__("courses.select_webinar")); ?>

                                            </button>
                                        <?php endif; ?>

                                        <button class="btn btn-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                            <?php echo e(__("courses.by_course")); ?>

                                        </button>
                                    </form>

                                    <div class="d-flex flex-row flex-wrap justify-content-between div-icons">
                                        <div class="mb-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.99992 2.50004C5.85778 2.50004 2.49992 5.8579 2.49992 10C2.49992 14.1422 5.85778 17.5 9.99992 17.5C14.1421 17.5 17.4999 14.1422 17.4999 10C17.4999 5.8579 14.1421 2.50004 9.99992 2.50004ZM0.833252 10C0.833252 4.93743 4.93731 0.833374 9.99992 0.833374C15.0625 0.833374 19.1666 4.93743 19.1666 10C19.1666 15.0626 15.0625 19.1667 9.99992 19.1667C4.93731 19.1667 0.833252 15.0626 0.833252 10Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.99992 4.16671C10.4602 4.16671 10.8333 4.5398 10.8333 5.00004V9.48501L13.7059 10.9214C14.1176 11.1272 14.2844 11.6277 14.0786 12.0394C13.8728 12.451 13.3722 12.6179 12.9606 12.4121L9.62724 10.7454C9.34492 10.6042 9.16658 10.3157 9.16658 10V5.00004C9.16658 4.5398 9.53968 4.16671 9.99992 4.16671Z"
                                                      fill="#191F70"/>
                                            </svg>
                                            <span
                                                class="ms-2 f-500 fs-14 lh-20"><?php echo e($course->getDuration()); ?></span>
                                        </div>

                                        <div class="mb-2">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1.23223 1.56561C1.70107 1.09677 2.33696 0.833374 3 0.833374H9.66667C9.88768 0.833374 10.0996 0.921171 10.2559 1.07745L15.2559 6.07745C15.4122 6.23373 15.5 6.44569 15.5 6.66671V16.6667C15.5 17.3297 15.2366 17.9656 14.7678 18.4345C14.2989 18.9033 13.663 19.1667 13 19.1667H3C2.33696 19.1667 1.70107 18.9033 1.23223 18.4345C0.763392 17.9656 0.5 17.3297 0.5 16.6667V3.33337C0.5 2.67033 0.763392 2.03445 1.23223 1.56561ZM3 2.50004C2.77899 2.50004 2.56702 2.58784 2.41074 2.74412C2.25446 2.9004 2.16667 3.11236 2.16667 3.33337V16.6667C2.16667 16.8877 2.25446 17.0997 2.41074 17.256C2.56702 17.4122 2.77899 17.5 3 17.5H13C13.221 17.5 13.433 17.4122 13.5893 17.256C13.7455 17.0997 13.8333 16.8877 13.8333 16.6667V7.01188L9.32149 2.50004H3Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.66667 0.833374C10.1269 0.833374 10.5 1.20647 10.5 1.66671V5.83337H14.6667C15.1269 5.83337 15.5 6.20647 15.5 6.66671C15.5 7.12694 15.1269 7.50004 14.6667 7.50004H9.66667C9.20643 7.50004 8.83333 7.12694 8.83333 6.66671V1.66671C8.83333 1.20647 9.20643 0.833374 9.66667 0.833374Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M4.66667 12.5C4.66667 12.0398 5.03976 11.6667 5.5 11.6667H10.5C10.9602 11.6667 11.3333 12.0398 11.3333 12.5C11.3333 12.9603 10.9602 13.3334 10.5 13.3334H5.5C5.03976 13.3334 4.66667 12.9603 4.66667 12.5Z"
                                                      fill="#191F70"/>
                                            </svg>
                                            <span class="ms-2 f-500 fs-14 lh-20"><?php echo e(__("courses.certificate")); ?></span>
                                        </div>
                                        <div class="d-flex">
                                            <i class="fal fa-infinity" style="color: #191F70; font-size:20px;"></i>
                                            <p class="ms-2 f-500 fs-14 lh-20">Неограниченный просмотр</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="section-menu d-block d-lg-none mt-4">
                                <ul class="pb-3">
                                    <li><a href="#about-course-txt"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.about")); ?></a>
                                    </li>
                                    <li><a href="#course-program"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.program")); ?></a>
                                    </li>
                                    <li><a href="#lectors"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.lectors")); ?></a></li>
                                    <li><a href="#registration"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.register")); ?></a>
                                    </li>
                                    <li><a href="#faq"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.faq")); ?></a>
                                    </li>
                                    <li><a href="#other-courses"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.other")); ?></a>
                                    </li>
                                    <li><a href="#contacts"
                                           class="fs-14 lh-17 color-23 f-500"><?php echo e(__("courses.menu.contacts")); ?></a></li>
                                </ul>

                            </div>
                            <div id="about-course-txt" class="about-course-txt d-block d-lg-none mt-4">
                                <h2 class="f-700 fs-32 lh-40"><?php echo e(__("courses.desc_title")); ?></h2>
                                <p class="fs-16 lh-27 f-500">
                                    <?php echo $course->info->description; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($course->webinars): ?>

                <div class="modal fade" id="webinarSelectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Выбрать уроки</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('addManyToCart')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php $__currentLoopData = $course->webinars_object; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="d-flex justify-content-between align-items-md-center flex-column flex-md-row w-100 py-2 course_item">
                                            <div class="d-flex" style="flex:0 0 30%">
                                                <p class="fs-16 f-500 m-0 color-23"><?php echo e($k + 1); ?></p>
                                                <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap"><?php echo $webinar->directions->map(function ($d){ return $d->title; })->join(",<br>"); ?></p>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 mt-md-0" style="flex:0 0 30%">
                                                <img
                                                    src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo)); ?>"
                                                    class="me-2 videoPic img_r_42 rounded-5"
                                                    alt="videoPic">
                                                <p class="m-0 f-500 fs-14 color-23 lh-17"><?php echo e($webinar->user->userInfo->fullName); ?></p>
                                            </div>
                                            <div class="d-flex d-none d-lg-block" style="flex:0 0 20%">
                                                <i class="far fa-clock me-1"></i>
                                                <span
                                                    class="me-2 f-500 f-14"><?php echo e($webinar->getDuration()); ?></span>
                                            </div>
                                            <div class="d-flex align-items-center mt-4 mt-md-0 justify-content-between"
                                                 style="flex:0 0 10%">
                                                <p class="m-0 f-700 fs-16 text-primary pe-3"><?php echo e($webinar->price->html()); ?></p>
                                                <input name="item_id[]" value="<?php echo e($webinar->id); ?>" type="checkbox"
                                                       data-price="<?php echo e($webinar->price->pure()); ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </form>
                            </div>
                            <div class="modal-footer d-none">
                                <h5><span class="me-2">Итого (<span class="co">0</span>)</span><span
                                        class="total"></span> <i class="icon-<?php echo e(\App\Helpers\TEXT::curHtml()); ?>"></i>
                                </h5>
                                <button class="btn btn-primary buyButton"><?php echo e(__("index.buy_webinar")); ?></button>
                            </div>
                        </div>
                    </div>
                </div>



            <!-- <div class="container">
                  <div class="about-course-txt d-lg-block d-none">
                                <h2 class="f-700 fs-32 lh-40"><?php echo e(__("courses.desc_title")); ?></h2>
                                <p class="fs-16 lh-27 f-500 mb-0">
                                    <?php echo $course->info->description; ?>

                </p>
            </div>
            </div> -->
                <div id="course-program" class="main3">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="mt-4 mt-lg-0">
                                    <h3 class="f-700 m-0 lh-40 pb-2"><?php echo e(__("courses.menu.program")); ?></h3>
                                    <div class="mt-2">

                                        <?php if($course->webinars_object): ?>
                                            <?php $__currentLoopData = $course->webinars_object; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="accordion accordion-flush">
                                                    <div class="accordion-item br-12">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne-<?php echo e($webinar->id); ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                <div
                                                                    class="d-flex align-items-md-center flex-column flex-md-row w-100">
                                                                    <div class="d-flex" style="flex:0 0 30%">
                                                                        <p class="fs-16 f-500 m-0 color-23"><?php echo e($k + 1); ?></p>
                                                                        <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap"><?php echo e($webinar->info->title); ?></p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center mt-3 mt-md-0"
                                                                         style="flex:0 0 30%">
                                                                        <img
                                                                            src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo)); ?>"
                                                                            class="me-2 videoPic img_r_42 rounded-5"
                                                                            alt="videoPic">
                                                                        <p class="m-0 f-500 fs-14 color-23 lh-17"><?php echo e($webinar->user->userInfo->fullName); ?></p>
                                                                    </div>
                                                                    <div class="d-flex d-none d-lg-block"
                                                                         style="flex:0 0 20%">
                                                                        <i class="far fa-clock me-1"></i>
                                                                        <span
                                                                            class="me-2 f-500 f-14"><?php echo e($webinar->getDuration()); ?></span>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mt-4 mt-md-0 justify-content-between"
                                                                        style="flex:0 0 10%">
                                                                        <p class="m-0 f-700 fs-16 text-primary pe-3"><?php echo e($webinar->price->html()); ?></p>
                                                                        <div
                                                                            class="btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">
                                                                            <?php echo e(__("courses.by")); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne-<?php echo e($webinar->id); ?>"
                                                             class="accordion-collapse collapse <?php if($k == 0): ?> show <?php endif; ?>"
                                                             aria-labelledby="flush-headingOne"
                                                             data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <div class="p-2 py-lg-3 px-lg-5">
                                                                    <?php echo $webinar->info->program; ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div id="lectors" class="main4">
                <div class="container">
                    <?php if($course->getLectors()->count() == 1): ?>
                        <div class="one-lector br-12 w-100 d-flex mb-3">
                            <div class="row">
                                <div class="col-lg-7 col-12 order-1 order-lg-0">
                                    <div class="txts me-0 me-xl-4">
                                        <h4 class="f-700 fs-32 lh-40 color-23 mt-4 mt-xl-0"><?php echo e($course->getLectors()->first()->userInfo->fullName); ?></h4>
                                        <p class="fs-16 f-500 lh-24 color-23">
                                            <?php echo e($course->getLectors()->first()->directions->map(function ($d){
                                                return $d->direction->title;
                                            })->join(", ")); ?>

                                        </p>
                                        <?php echo $lector->lector->info->biography; ?>

                                    </div>
                                </div>
                                <div class="col-lg-5 col-12 order-0 order-lg-1">
                                    <div class="image mt-2 br-12 w-100 h-100"
                                         style="background-image: url(<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>)">
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php else: ?>
                        <div class="many-lector">
                            <h3 class="fs-32 f-700 lh-40 color-23 mb-4"><?php echo e(__("courses.menu.lectors")); ?></h3>
                            <div
                                class="lector-cards row">
                                <?php $__currentLoopData = $course->getLectors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card1 col-12 col-lg-4">
                                        <a href="<?php echo e(route("lectors.show",$lector->id)); ?>"
                                           class="card br-12 mb-3 text-dark">
                                            <div class="row g-0">
                                                <div class="col-md-4">

                                                    <div class="image w-100"
                                                         style="height: 200px;background-image: url(<?php echo e(\Illuminate\Support\Facades\Storage::url($lector->lector->photo)); ?>)">
                                                    </div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body py-2 h-100">
                                                        <div class="d-flex flex-column justify-content-between h-100">
                                                            <div>
                                                                <h5 class="card-title f-700 fs-20 lh-24"><?php echo e($lector->userInfo->fullName); ?></h5>
                                                                <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">
                                                                    <?php echo e($lector->directions->map(function ($d){
                                                                        return $d->direction->title;
                                                                    })->join(", ")); ?>

                                                                </p>
                                                            </div>
                                                            <div class="card-text d-flex align-items-center">
                                                                <svg width="16" height="15" viewBox="0 0 16 15"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M7.70186 0.237038C7.88954 0.143196 8.11046 0.143196 8.29814 0.237038L14.9648 3.57037C15.1907 3.6833 15.3333 3.91414 15.3333 4.16666C15.3333 4.41917 15.1907 4.65001 14.9648 4.76294L8.29814 8.09627C8.11046 8.19012 7.88954 8.19012 7.70186 8.09627L1.03519 4.76294C0.809333 4.65001 0.666665 4.41917 0.666665 4.16666C0.666665 3.91414 0.809333 3.6833 1.03519 3.57037L7.70186 0.237038ZM2.82404 4.16666L8 6.75463L13.176 4.16666L8 1.57868L2.82404 4.16666Z"
                                                                          fill="#232323"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M0.737047 10.5352C0.901707 10.2059 1.30216 10.0724 1.63147 10.237L8 13.4213L14.3685 10.237C14.6978 10.0724 15.0983 10.2059 15.2629 10.5352C15.4276 10.8645 15.2941 11.2649 14.9648 11.4296L8.29814 14.7629C8.11046 14.8568 7.88954 14.8568 7.70186 14.7629L1.03519 11.4296C0.70587 11.2649 0.572388 10.8645 0.737047 10.5352Z"
                                                                          fill="#232323"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M0.737047 7.20185C0.901707 6.87253 1.30216 6.73905 1.63147 6.9037L8 10.088L14.3685 6.9037C14.6978 6.73905 15.0983 6.87253 15.2629 7.20185C15.4276 7.53117 15.2941 7.93161 14.9648 8.09627L8.29814 11.4296C8.11046 11.5234 7.88954 11.5234 7.70186 11.4296L1.03519 8.09627C0.70587 7.93161 0.572388 7.53117 0.737047 7.20185Z"
                                                                          fill="#232323"/>
                                                                </svg>
                                                                <span
                                                                    class="ms-2"><?php echo e($lector->webinars->count()); ?> <?php echo e(__("courses.lections")); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="container">
                <div id="registration" class="main5 br-12" style="background-color: #191F70;">
                    <div class="d-flex flex-column flex-lg-row justify-content-evenly">
                        <div class="main5-1 me-4">
                            <h3 class="text-white fw-bold mb-4 fs-24"
                                style="max-width: 370px;"><?php echo e($course->info->title); ?></h3>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13"><?php echo e(__("courses.reg.title_1")); ?></p>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13"><?php echo e(__("courses.reg.title_2")); ?></p>
                            <?php if($course->sale): ?>
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span><?php echo e($course->sale->html()); ?><i class="icon-usd"></i> </span>
                                    <sup
                                        class="fs-23 lh-23 fw-normal align-middle strikethrough"><?php echo e($course->price->html()); ?></sup>
                                </p>
                            <?php else: ?>
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span><?php echo e($course->price->html()); ?></span>
                                </p>
                            <?php endif; ?>
                            <ul class="text-white ps-2 mb-4">
                                <li class="fw-normal fs-14 lh-23"><?php echo e(__("courses.reg.short_info.0")); ?></li>
                                <li class="fw-normal fs-14 lh-23"><?php echo e(__("courses.reg.short_info.1")); ?></li>
                                <li class="fw-normal fs-14 lh-23"><?php echo e(__("courses.reg.short_info.2")); ?></li>
                            </ul>
                            <p class="text-white fw-normal fs-14 lh-23 mb-0"
                               style="max-width: 307px;"><?php echo e(__("courses.reg.short_info.3")); ?></p>
                            <ul class="text-white ps-2 mb-5 mb-lg-0">
                                <li class="fw-normal fs-14 lh-23"><?php echo e(__("courses.reg.short_info.4")); ?></li>
                            </ul>
                        </div>
                        <div class="main5-2">
                            <h3 class="text-white f-700 fs-32 lh-32"><?php echo e(__("courses.reg.form.title")); ?></h3>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.reg-online-course-form', [])->html();
} elseif ($_instance->childHasBeenRendered('BzqvRDB')) {
    $componentId = $_instance->getRenderedChildComponentId('BzqvRDB');
    $componentTag = $_instance->getRenderedChildComponentTagName('BzqvRDB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BzqvRDB');
} else {
    $response = \Livewire\Livewire::mount('front.reg-online-course-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('BzqvRDB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>

                </div>

                <div id="faq" class="main6">
                    <h3 class="f-700 mb-4 color-23"><?php echo e(__("courses.faq.title")); ?></h3>
                    <div class="row">
                        
                        
                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq1">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text"><?php echo e(__("courses.faq.faq1_question")); ?></p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq1">
                                        <div class="p-3">
                                            <span class="m-0"><?php echo __("courses.faq.faq1_answer"); ?>}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq2">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text"><?php echo e(__("courses.faq.faq2_question")); ?></p>
                                    </div>
                                    <div class="collapse accordion-show" id="faq2">
                                        <div class="p-3">
                                            <span class="m-0"><?php echo __("courses.faq.faq2_answer"); ?>}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq3">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text"><?php echo e(__("courses.faq.faq3_question")); ?></p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq3">
                                        <div class="p-3">
                                            <span class="m-0"><?php echo __("courses.faq.faq3_answer"); ?>}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq4">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text"><?php echo e(__("courses.faq.faq4_question")); ?></p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq4">
                                        <div class="p-3">
                                            <span class="m-0"><?php echo __("courses.faq.faq4_answer"); ?>}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="other-courses" class="main7">
                    <div class="d-flex justify-content-between">
                        <h3 class="f-700 mb-4"><?php echo e(__("courses.courses")); ?></h3>
                        <div
                            class="slider_navigation videoPopularSwiper_nav  AdditionsSwiper_nav mb-4 d-none d-md-flex flex-row-reverse">
                        </div>
                    </div>
                    <div class="swiper AdditionsSwiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($course->info->enabled): ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo e(route("course.show",$course->id)); ?>" style="color: inherit"
                                           class="d-block bg-white br-12">
                                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->image)); ?>"
                                                 alt="addPic"
                                                 style="width: 386px; height: 214px; object-fit: cover">
                                            <div class="p-3">
                                                <p class="text-primary text-uppercase f-700 mt-2 fs-10"><?php echo e($course->directions->first()->title); ?></p>
                                                <p class="f-700 fs-16 min-h-96"><?php echo e($course->info->title); ?></p>
                                                <div class="mt-2 d-flex justify-content-between">
                                                    <div>
                                                        <i class="far fa-clock me-1"></i> <span
                                                            class="me-2 fs-14 f-500"><?php echo e($course->getDuration()); ?></span>
                                                        <i class="fas fa-tasks me-1"></i> <span class="fs-14 f-500"><?php echo e($course->webinars_count); ?> видео</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                                    <?php if($course->getLectors()->count() == 1): ?>
                                                        <div class="d-flex align-items-center">
                                                            <img class="rounded-circle border-white me-3 img_r_42"
                                                                 src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->getLectors()->first()->lector->photo)); ?>"
                                                                 alt="videoPic">
                                                            
                                                        </div>
                                                    <?php else: ?>
                                                        <div>
                                                            <?php $__currentLoopData = $course->getLectors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <img
                                                                    src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image)); ?>"
                                                                    class="<?php if($k>0): ?> m-25 <?php endif; ?> me-1 rounded-circle img_r_42"
                                                                    alt="videoPic">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <span class="price_box">

                                        <?php if($course->sale): ?>
                                                            <span
                                                                class="f-700 text-primary fs-16 me-1"><?php echo e($course->sale->html()); ?></span>
                                                            <span
                                                                class="f-700 del text-secondary fs-16"><?php echo e($course->price->html()); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="f-700 text-primary fs-16 me-1"><?php echo e($course->price->html()); ?></span>
                                                        <?php endif; ?>
                                    </span>
                                                </div>
                                                <form method="POST" action="<?php echo e(route('addToCart')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" value="<?php echo e($course->id); ?>" name="id">
                                                    <input type="hidden" value="course" name="type">
                                                    <button
                                                        class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14"><?php echo e(__("courses.by_course")); ?>

                                                    </button>
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

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
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/front/course/show.blade.php ENDPATH**/ ?>