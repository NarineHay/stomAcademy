<div class="row">
    <div class="col-lg-10 col-12 mb-4 mb-lg-6">
        <div class="d-flex mt-6 py-lg-2">
            <a href="<?php echo e(route('home')); ?>"><span class="fs-12 f-500 text-secondary cursor">Главная</span></a>
            <a><span class="fs-12 f-500 ms-3 main cursor">Онлайн обучение</span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0">Онлайн обучение</h2>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row mt-4 align-items-lg-center">
            <div class="d-flex education_tags mb-3 mb-lg-0">
                <a class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    <?php echo e(__("courses.tabs.all")); ?>

                </a>
                <a href="<?php echo e(route('course.index')); ?>" class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray ms-2 text-black btn_text">
                    Онлайн-курсы
                </a>
                <a href="<?php echo e(route('webinar.index')); ?>" class="fs-14 py-2 px-2 f-600 br-12 active bg-white text-black ms-2 btn_text">
                    Вебинары
                </a>
                <a href="<?php echo e(route('conference')); ?>" class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black btn_text ms-2">
                    Онлайн-конференции
                </a>
            </div>

            <div class="col-12 d-flex d-lg-none justify-content-between mt-2 filter_buttons_mobile mb-2">
                <button class="fs-12 f-600 py-2 w-50 bg-transparent "><a href="filter.html" class="text-black">Фильтр</a></button>
                <button class="fs-12 f-600 py-2 w-50 bg-transparent text-black"><a href="sorting.html" class="text-black">Сортировка</a></button>
            </div>

            <div class="d-flex align-items-center d-none d-lg-block">
                <div class="dropdown">
                    <span class="text-secondary fs-14 f-500">Сортировать по:</span>
                    <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">Релевантности
                    </button>





                    <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                        <input wire:model="sortBy" value="price" type="radio" id="vehicle111" name="sort" class="mt-2 cursor">
                        <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">Цена</label><br>
                        <input wire:model="sortBy" value="title" type="radio" id="vehicle1112" name="sort" class="mt-2 cursor">
                        <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">Названия</label><br>
                        <input wire:model="sortBy" value="popularity" type="radio" id="vehicle3333" name="sort" class="mt-2 cursor">
                        <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">По популярность</label><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route("webinar.show",$webinar->id)); ?>" style="color: inherit" class="col-xxl-3 col-lg-4 col-sm-6 col-12 mb-3 md-sm-0">
                    <div class="bg-white br-12">
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->image)); ?>" class="w-100" alt="addPic" style="width: 250px; height: 150px; object-fit: cover">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10"><?php echo e($webinar->directions->first()->title); ?></p>
                            <p class="f-700 fs-16 courseTxt-index"><?php echo e($webinar->info->title); ?></p>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center" style="min-height: 63px;">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->user->userinfo->image)); ?>" class="me-2 rounded-circle" alt="customerPic" style="height: 40px; width: 40px;object-fit: cover">
                                    <p class="m-0 fs-14 f-500"><?php echo e($webinar->user->userinfo->fname); ?> <?php echo e($webinar->user->userinfo->lname); ?></p>
                                </div>
                                <div class="mt-3 mt-xl-0 d-flex flex-row flex-xl-column">
                                    <?php if($webinar->sale): ?>
                                        <span class="f-700 text-primary fs-16 me-2 text-nowrap"><?php echo e($webinar->sale->html()); ?></span>
                                        <span class="f-700 del text-secondary fs-16 text-nowrap"><?php echo e($webinar->price->html()); ?></span>
                                    <?php else: ?>
                                        <span class="f-700 text-primary fs-16 me-1 text-nowrap"><?php echo e($webinar->price->html()); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <form class="dublicat_form" method="POST" action="<?php echo e(route('addToCart')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($webinar->id); ?>" name="id">
                                <input type="hidden" value="webinar" name="type">
                                <button class="btn btn-outline-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                            </form>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще</button>

        <div class="mt-4 d-flex justify-content-center d-lg-block">
            <nav>
                <?php echo e($webinars->links()); ?>

            </nav>
        </div>
    </div>
    <div wire:ignore class="col-lg-2 col-12 position-relative" style="z-index: 100;">
        <div class="aside d-none d-lg-block">
            <div >
                <div class="mt-4 ms-3 pt-5">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span>Области</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-1">
                        <div class="mt-2">
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
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-3"><span>Оплата</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-3">
                        <div class="mt-2">
                            <input type="checkbox" id="vehicle13" name="vehicle1" class="mt-2 cursor">
                            <label for="vehicle13" class="f-500 fs-14 cursor">Оплаченный</label><br>
                            <input type="checkbox" id="vehicle14" name="vehicle2" class="mt-2 cursor">
                            <label for="vehicle14" class="f-500 fs-14 cursor">Бесплатно</label><br>
                        </div>

                    </div>
                </div>
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-2"><span>Преподаватели</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-2">
                        <div class="mt-2">
                            <?php $__currentLoopData = $lectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input wire:model="selectedLectors" type="checkbox" id="lec-<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" class="mt-2 cursor">
                                <label for="lec-<?php echo e($user->id); ?>" class="f-500 fs-14 cursor"><?php echo e($user->userInfo->fullName); ?></label><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\webinars-catalog.blade.php ENDPATH**/ ?>