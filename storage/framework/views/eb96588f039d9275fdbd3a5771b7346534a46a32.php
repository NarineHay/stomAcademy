<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Stom Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="/dist/font/font.css">
    <link rel="stylesheet" type="text/css" href="/dist/5.12.0/all.css">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="icon" href="/dist/image/aboutLogo.png">
    <link rel="stylesheet" href="/dist/icon-moon.css">
    <link rel="stylesheet" href="/dist_plyr/plyr.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/lib.scss', 'resources/js/script.js']); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>
<?php if(\Illuminate\Support\Facades\Route::currentRouteName() == "home"): ?>
    <header class="position-relative headerBorder">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between flex-row-reverse flex-lg-row">
                <?php echo $__env->make('front.components.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (isset($component)) { $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5 = $component; } ?>
<?php $component = App\View\Components\HeaderUser::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\HeaderUser::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5)): ?>
<?php $component = $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5; ?>
<?php unset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5); ?>
<?php endif; ?>
            </div>
        </div>
    </header>

    <section class="section_top"
             style="background-image: url('/dist/image/headerBackground1.jpg'); background-size: cover;">
        <div class="bg">
            <div class="container d-flex justify-content-between align-items-center text-white">
                <div class="mt-6 d-flex justify-content-between align-items-center w-100 p-2 p-md-0">
                    <div class="d-flex flex-column header_text_block"
                         style="padding-top: 143px ;padding-bottom: 167px;">

                        <div>
                            <h1 class="mt-3 f-600 m-0 header_text"><?php echo __("header.h1"); ?></h1>
                            <p class="fs-18 f-500 m-0 pt-3 pb-4"><?php echo __("header.under_title"); ?></p>
                        </div>
                        <div class="d-block d-lg-none">
                            <?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#header_login_modal">
                                    <?php echo e(__("header.form.title")); ?>

                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="header-login">
                        <?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
                            <div class="d-none d-lg-block  mt-4">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.home-login', [])->html();
} elseif ($_instance->childHasBeenRendered('OOhir8a')) {
    $componentId = $_instance->getRenderedChildComponentId('OOhir8a');
    $componentTag = $_instance->getRenderedChildComponentTagName('OOhir8a');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OOhir8a');
} else {
    $response = \Livewire\Livewire::mount('front.home-login', []);
    $html = $response->html();
    $_instance->logRenderedChild('OOhir8a', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>

                            <div class="modal fade" id="header_login_modal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.home-login', [])->html();
} elseif ($_instance->childHasBeenRendered('uBIsgPE')) {
    $componentId = $_instance->getRenderedChildComponentId('uBIsgPE');
    $componentTag = $_instance->getRenderedChildComponentTagName('uBIsgPE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uBIsgPE');
} else {
    $response = \Livewire\Livewire::mount('front.home-login', []);
    $html = $response->html();
    $_instance->logRenderedChild('uBIsgPE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php elseif(\Illuminate\Support\Facades\Route::currentRouteName() == "about"): ?>
    <header class="position-relative bg-primary ">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between  flex-row-reverse flex-lg-row">
                <?php echo $__env->make('front.components.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (isset($component)) { $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5 = $component; } ?>
<?php $component = App\View\Components\HeaderUser::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\HeaderUser::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5)): ?>
<?php $component = $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5; ?>
<?php unset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5); ?>
<?php endif; ?>
            </div>
        </div>
    </header>
    <section class="section_top"
             style="background-image: url('/dist/image/headerBackground1.jpg');background-repeat: no-repeat; background-size: cover;">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <div class="mt-6 w-100">
                <div class="d-flex mt-3 mt-lg-4">
                    <a href="<?php echo e(route('home')); ?>"><span class="fs-12 f-500 text-white"><?php echo e(__("header.menu.home")); ?></span></a>
                    <a><span class="fs-12 f-500 ms-3 text-white main"><?php echo e(__("header.menu.about")); ?></span></a>
                </div>
                <div class="py-md-5 py-lg-6">
                    <h1 class="mt-3 f-600 m-0"><?php echo __("about.header.h1"); ?></h1>
                    <p class="fs-20 f-500 mt-2 m-0"><?php echo __("about.header.under_title"); ?></p>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <!-- <header class="position-fixed bg-primary w-100" style="z-index: 111">
                    <div class="container d-flex justify-content-between p-3 align-items-center">
                        <div>
                            <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <?php echo $__env->make('front.components.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if (isset($component)) { $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5 = $component; } ?>
<?php $component = App\View\Components\HeaderUser::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\HeaderUser::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5)): ?>
<?php $component = $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5; ?>
<?php unset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5); ?>
<?php endif; ?>
    </div>

</div>
</header> -->
    <header class="position-relative bg-primary ">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between  flex-row-reverse flex-lg-row">
                <?php echo $__env->make('front.components.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (isset($component)) { $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5 = $component; } ?>
<?php $component = App\View\Components\HeaderUser::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\HeaderUser::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5)): ?>
<?php $component = $__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5; ?>
<?php unset($__componentOriginal141cd278cd0b8dcb39e9e9435eb746621725c5f5); ?>
<?php endif; ?>
            </div>
        </div>
    </header>

<?php endif; ?>


<?php echo $__env->yieldContent("content"); ?>

<!--Footer-->

<footer class="text-white bg-gray">
    <div class="container">
        <div class="row footer-border-bottom">
            <div class="col-12 col-lg-3 mt-5 mt-lg-6 mb-2 mb-md-3 fs-12">
                <a href="/"><img src="/dist/image/logo.png" alt="footerLogoPic"></a>
                <p class="mt-3 fs-12">
                    <?php echo __("index.full-address"); ?>

                </p>
            </div>
            <div class="col-12 col-lg-4 mt-lg-6 mb-2 mb-md-4 fs-20 f-600 ft-menu-a-div">
                <a href="<?php echo e(route('course.index')); ?>"><p><?php echo e(__("header.menu.home")); ?></p></a>
                <a href="<?php echo e(route('lectors.index')); ?>"><p><?php echo e(__("header.menu.lectors")); ?></p></a>
                <a href="<?php echo e(route('about')); ?>"><p><?php echo e(__("header.menu.about")); ?></p></a>
                <a href="<?php echo e(route('blog.index')); ?>"><p><?php echo e(__("header.menu.blog")); ?></p></a>
                <a href="<?php echo e(route('contacts')); ?>"><p><?php echo e(__("header.menu.contact")); ?></p></a>
            </div>
            <div class="col-12 col-lg-5 mt-2 mt-lg-6 mb-4">
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="me-3 text-white">
                        <p class="opacity-50 fs-14 f-500"><?php echo e(__("courses.contacts.info.country.ru")); ?></p>
                        <a href="tel:<?php echo e(__("courses.contacts.info.phone.ru")); ?>"><p class="fs-16 f-600"><?php echo e(__("courses.contacts.info.phone.ru")); ?></p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500"><?php echo e(__("courses.contacts.info.country.ua")); ?></p>
                        <a href="tel:<?php echo e(__("courses.contacts.info.phone.ua")); ?>"><p class="fs-16 f-600"><?php echo e(__("courses.contacts.info.phone.ua")); ?></p></a>
                    </div>
                    <div class="ms-md-6 text-white">
                        <p class="opacity-50 fs-14 f-500"><?php echo e(__("courses.contacts.info.country.le")); ?></p>
                        <a href="tel:<?php echo e(__("courses.contacts.info.phone.le")); ?>"><p class="fs-16 f-600"><?php echo e(__("courses.contacts.info.phone.le")); ?></p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500"><?php echo e(__("courses.contacts.info.country.be")); ?></p>
                        <a href="tel:<?php echo e(__("courses.contacts.info.phone.be")); ?>"><p class="fs-16 f-600"><?php echo e(__("courses.contacts.info.phone.be")); ?>


                        </a>
                    </div>
                </div>
                <div class="mt-4 mt-lg-5 d-flex mb-0 mb-lg-4">
                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray icon-style ">
                        <a href="<?php echo e(__("courses.contacts.info_for_footer.soc.yt_link")); ?>" target="_blank"><i
                                class="fab fa-youtube text-white fs-16"></i></a>
                    </div>





                    <?php echo __("courses.contacts.info_for_footer.soc.tg_icon"); ?>

                    <?php echo __("courses.contacts.info_for_footer.soc.tw_icon"); ?>






                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="<?php echo e(__("courses.contacts.info_for_footer.soc.fb_link")); ?>" target="_blank"><i
                                class="fab fa-facebook-f text-white fs-16"></i></a>
                    </div>

                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="<?php echo e(__("courses.contacts.info_for_footer.soc.insta_link")); ?>" target="_blank"><i
                                class="fab fa-instagram text-white fs-16"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div
            class="row d-flex flex-column-reverse flex-lg-row justify-content-between align-items-lg-center py-3">
            <div class="col-md-7">
                <div>
                    <p class="fs-12 f-500 m-0">© Сервис обучения врачей<br class="d-block d-lg-none">стоматологов
                        Stom-Academy - сайт<br class="d-block d-lg-none"> для стоматологов,
                        2016 – 2021</p>
                </div>
            </div>
            <div
                class="col-md-5 d-flex justify-content-between align-items-center mb-3 mb-md-0 flex-wrap flex-md-nowrap">
                <a href="#"><img src="/dist/image/pay1.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay2.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay3.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay4.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay5.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay6.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay7.png" alt="payPic"></a>
            </div>
        </div>
    </div>
</footer>



<div class="modal fade" id="lectorModal" tabindex="-1" aria-labelledby="lectorModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.become-lector', [])->html();
} elseif ($_instance->childHasBeenRendered('RW8kQrO')) {
    $componentId = $_instance->getRenderedChildComponentId('RW8kQrO');
    $componentTag = $_instance->getRenderedChildComponentTagName('RW8kQrO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RW8kQrO');
} else {
    $response = \Livewire\Livewire::mount('front.become-lector', []);
    $html = $response->html();
    $_instance->logRenderedChild('RW8kQrO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>






<div class="modal fade" id="lectorFollowModal" tabindex="-1" aria-labelledby="lectorFollowModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.follow', [])->html();
} elseif ($_instance->childHasBeenRendered('HTYyWvu')) {
    $componentId = $_instance->getRenderedChildComponentId('HTYyWvu');
    $componentTag = $_instance->getRenderedChildComponentTagName('HTYyWvu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HTYyWvu');
} else {
    $response = \Livewire\Livewire::mount('front.follow', []);
    $html = $response->html();
    $_instance->logRenderedChild('HTYyWvu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>



<script src="/admin/plugins/jquery/jquery.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    if (document.querySelector('.summernote')) {
        $(function () {
            $('.summernote').summernote()
        })
    }
</script>
<script src="/dist_plyr/plyr.js"></script>
<script>
    const player = new Plyr('#player'
        //     , {
        //     settings: ['captions', 'quality', 'speed', 'loop'],
        //     quality: { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] },
        // }
    );
    const player1 = new Plyr('#player1');
    const player2 = new Plyr('#player2');
    const player3 = new Plyr('#player3');
    const player4 = new Plyr('#player4');
</script>
<?php echo \Livewire\Livewire::scripts(); ?>

</section>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/layouts/app.blade.php ENDPATH**/ ?>