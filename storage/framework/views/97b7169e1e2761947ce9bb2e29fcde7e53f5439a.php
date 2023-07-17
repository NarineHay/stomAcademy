<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel - <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/dist/5.12.0/all.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/admin.scss']); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">




































































































            <li>
                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-warning">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="brand-link">
            <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.index.index')); ?>" class="nav-link <?php if(request()->is('admin/index*')): ?> active <?php endif; ?>">Главная </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link <?php if(request()->is('admin/users*')): ?> active <?php endif; ?>">Пользователи</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.lectors.index')); ?>" class="nav-link <?php if(request()->is('admin/lectors*')): ?> active <?php endif; ?>">Лектора</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.accesses.index')); ?>" class="nav-link <?php if(request()->is('admin/accesses*')): ?> active <?php endif; ?>">Доступы</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.webinar.index')); ?>" class="nav-link <?php if(request()->is('admin/webinar*')): ?> active <?php endif; ?>">Вебинары</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.course.index')); ?>" class="nav-link <?php if(request()->is('admin/course*')): ?> active <?php endif; ?>">Курсы</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.certificates.index')); ?>" class="nav-link <?php if(request()->is('admin/certificates*')): ?> active <?php endif; ?>">Сертификаты</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.prices.index')); ?>" class="nav-link <?php if(request()->is('admin/prices*')): ?> active <?php endif; ?>">Цены</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.promo.index')); ?>" class="nav-link <?php if(request()->is('admin/promo*')): ?> active <?php endif; ?>">Промокоды</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.payment.index')); ?>" class="nav-link <?php if(request()->is('admin/payment*')): ?> active <?php endif; ?>">Оплаты</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.pages.index')); ?>" class="nav-link <?php if(request()->is('admin/pages*')): ?> active <?php endif; ?>">Страницы</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.blogs.index')); ?>" class="nav-link <?php if(request()->is('admin/blogs*')): ?> active <?php endif; ?>">Статьи</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.chats.index')); ?>" class="nav-link <?php if(request()->is('admin/chats*')): ?> active <?php endif; ?>">Чат</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.videos.index')); ?>" class="nav-link <?php if(request()->is('admin/videos*')): ?> active <?php endif; ?>">Видео</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php echo \Livewire\Livewire::scripts(); ?>

<script>
    document.querySelectorAll("input[type=file]").forEach(function (input){
        let label = input.parentNode.querySelector("label");
        let img = document.createElement("img");
        img.classList.add("image-preview");
        img.classList.add('d-none');
        img.onerror = function (){
            img.classList.add('d-none');
        }
        img.onload = function (){
            img.classList.remove('d-none');
        }
        insertAfter(img,input);
        input.onchange = evt => {
            const [file] = input.files
            if (file) {
                label.textContent = file.name;
                img.setAttribute("src",URL.createObjectURL(file))
            }
        }
    })
    function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }
</script>
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/admin/plugins/select2/js/select2.js"></script>
<script>
    $(function () {
        $('.summernote').summernote()
        $('.select2').select2({
            theme: 'bootstrap4',
            tags:true,
        });
    })
</script>

<script>
    document.querySelectorAll(".access_form").forEach(function (form){
        form.querySelectorAll('input[type=radio][name="type"]').forEach(radio => radio.addEventListener('change', function check(){
            if(radio.value == 'webinar'){
                form.querySelector('.courseDiv').classList.add("d-none");
                form.querySelector('.webinarDiv').classList.remove("d-none");
            }
            else if(radio.value == 'course'){
                form.querySelector('.webinarDiv').classList.add("d-none");
                form.querySelector('.courseDiv').classList.remove("d-none");
            }
        }));

        form.querySelectorAll('input[type=radio][name="access_time"]').forEach(radio => radio.addEventListener('change', function check(){
            if(radio.value == '1'){
                form.querySelector('.duration').classList.remove("d-none");
            }
            else if(radio.value == '0'){
                form.querySelector('.duration').classList.add("d-none");
            }
        }));
    })
</script>

<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/admin/dist/js/adminlte.js"></script>
<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>
</body>
</html>

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/layouts/admin.blade.php ENDPATH**/ ?>