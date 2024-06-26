<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel - @yield('title')</title>

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    @vite(['resources/sass/admin.scss'])
    @livewireStyles
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                {{--            <li class="nav-item"> --}}
                {{--                <a class="nav-link" data-widget="navbar-search" href="#" role="button"> --}}
                {{--                    <i class="fas fa-search"></i> --}}
                {{--                </a> --}}
                {{--                <div class="navbar-search-block"> --}}
                {{--                    <form class="form-inline"> --}}
                {{--                        <div class="input-group input-group-sm"> --}}
                {{--                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> --}}
                {{--                            <div class="input-group-append"> --}}
                {{--                                <button class="btn btn-navbar" type="submit"> --}}
                {{--                                    <i class="fas fa-search"></i> --}}
                {{--                                </button> --}}
                {{--                                <button class="btn btn-navbar" type="button" data-widget="navbar-search"> --}}
                {{--                                    <i class="fas fa-times"></i> --}}
                {{--                                </button> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </form> --}}
                {{--                </div> --}}
                {{--            </li> --}}

                {{--            <li class="nav-item dropdown"> --}}
                {{--                <a class="nav-link" data-toggle="dropdown" href="#"> --}}
                {{--                    <i class="far fa-comments"></i> --}}
                {{--                    <span class="badge badge-danger navbar-badge">3</span> --}}
                {{--                </a> --}}
                {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <div class="media"> --}}
                {{--                            <img src="/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
                {{--                            <div class="media-body"> --}}
                {{--                                <h3 class="dropdown-item-title"> --}}
                {{--                                    Brad Diesel --}}
                {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                {{--                                </h3> --}}
                {{--                                <p class="text-sm">Call me whenever you can...</p> --}}
                {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </a> --}}

                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <div class="media"> --}}
                {{--                            <img src="/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> --}}
                {{--                            <div class="media-body"> --}}
                {{--                                <h3 class="dropdown-item-title"> --}}
                {{--                                    John Pierce --}}
                {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span> --}}
                {{--                                </h3> --}}
                {{--                                <p class="text-sm">I got your message bro</p> --}}
                {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </a> --}}

                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <div class="media"> --}}
                {{--                            <img src="/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> --}}
                {{--                            <div class="media-body"> --}}
                {{--                                <h3 class="dropdown-item-title"> --}}
                {{--                                    Nora Silvester --}}
                {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span> --}}
                {{--                                </h3> --}}
                {{--                                <p class="text-sm">The subject goes here</p> --}}
                {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
                {{--                            </div> --}}
                {{--                        </div> --}}
                {{--                    </a> --}}
                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> --}}
                {{--                </div> --}}
                {{--            </li> --}}
                {{--            <li class="nav-item dropdown"> --}}
                {{--                <a class="nav-link" data-toggle="dropdown" href="#"> --}}
                {{--                    <i class="far fa-bell"></i> --}}
                {{--                    <span class="badge badge-warning navbar-badge">15</span> --}}
                {{--                </a> --}}
                {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> --}}
                {{--                    <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages --}}
                {{--                        <span class="float-right text-muted text-sm">3 mins</span> --}}
                {{--                    </a> --}}
                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <i class="fas fa-users mr-2"></i> 8 friend requests --}}
                {{--                        <span class="float-right text-muted text-sm">12 hours</span> --}}
                {{--                    </a> --}}
                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item"> --}}
                {{--                        <i class="fas fa-file mr-2"></i> 3 new reports --}}
                {{--                        <span class="float-right text-muted text-sm">2 days</span> --}}
                {{--                    </a> --}}
                {{--                    <div class="dropdown-divider"></div> --}}
                {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
                {{--                </div> --}}
                {{--            </li> --}}
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-warning">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.users.index') }}" class="brand-link">
                <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class=" nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link @if (request()->is('admin/dashboard*')) active @endif">Дашборд </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.index.index') }}"
                                class="nav-link @if (request()->is('admin/index*')) active @endif">Главная </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link @if (request()->is('admin/users*')) active @endif">Пользователи</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.lectors.index') }}"
                                class="nav-link @if (request()->is('admin/lectors*')) active @endif">Лектора</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.accesses.index') }}"
                                class="nav-link @if (request()->is('admin/accesses*')) active @endif">Доступы</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.webinar.index') }}"
                                class="nav-link @if (request()->is('admin/webinar*')) active @endif">Вебинары</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.course.index') }}"
                                class="nav-link @if (request()->is('admin/course*')) active @endif">Курсы</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.certificates.index') }}"
                                class="nav-link @if (request()->is('admin/certificates*')) active @endif">Сертификаты</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.prices.index') }}"
                                class="nav-link @if (request()->is('admin/prices*')) active @endif">Цены</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.promo.index') }}"
                                class="nav-link @if (request()->is('admin/promo*')) active @endif">Промокоды</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.payment.index') }}"
                                class="nav-link @if (request()->is('admin/payment*')) active @endif">Оплаты</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.application.index') }}"
                                class="nav-link @if (request()->is('admin/application*')) active @endif">Заявки </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pages.index') }}"
                                class="nav-link @if (request()->is('admin/pages*')) active @endif">Страницы</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="nav-link @if (request()->is('admin/blogs*')) active @endif">Статьи</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.chats.index') }}"
                                class="nav-link @if (request()->is('admin/chats*')) active @endif">Чат</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.videos.index') }}"
                                class="nav-link @if (request()->is('admin/videos*')) active @endif">Видео</a>
                        </li>

                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.exchange-rates.create') }}"
                                    class="nav-link @if (request()->is('admin/videos*')) active @endif">Валюта</a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    @livewireScripts
    <script>
        document.querySelectorAll("input[type=file]").forEach(function(input) {
            let label = input.parentNode.querySelector("label");
            let img = document.createElement("img");
            img.classList.add("image-preview");
            img.classList.add('d-none');
            img.onerror = function() {
                img.classList.add('d-none');
            }
            img.onload = function() {
                img.classList.remove('d-none');
            }
            insertAfter(img, input);
            input.onchange = evt => {
                const [file] = input.files
                if (file) {
                    label.textContent = file.name;
                    img.setAttribute("src", URL.createObjectURL(file))
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
        $(function() {
            $('.summernote').summernote()
            $('.select2').select2({
                theme: 'bootstrap4',
                tags: true,
            });
        })
    </script>

    <script>
        document.querySelectorAll(".access_form").forEach(function(form) {
            form.querySelectorAll('input[type=radio][name="type"]').forEach(radio => radio.addEventListener(
                'change',
                function check() {
                    if (radio.value == 'webinar') {
                        form.querySelector('.courseDiv').classList.add("d-none");
                        form.querySelector('.webinarDiv').classList.remove("d-none");
                    } else if (radio.value == 'course') {
                        form.querySelector('.webinarDiv').classList.add("d-none");
                        form.querySelector('.courseDiv').classList.remove("d-none");
                    }
                }));

            form.querySelectorAll('input[type=radio][name="access_time"]').forEach(radio => radio.addEventListener(
                'change',
                function check() {
                    if (radio.value == '1') {
                        form.querySelector('.duration').classList.remove("d-none");
                    } else if (radio.value == '0') {
                        form.querySelector('.duration').classList.add("d-none");
                    }
                }));
        })

        document.querySelectorAll(".certificate_form").forEach(function(form) {
            form.querySelectorAll('input[type=radio][name="type"]').forEach(radio => radio.addEventListener(
                'change',
                function check() {
                    console.log(11);
                    if (radio.value == 'webinar') {
                        form.querySelector('.courseDiv').classList.add("d-none");
                        form.querySelector('.webinarDiv').classList.remove("d-none");
                    } else if (radio.value == 'course') {
                        form.querySelector('.webinarDiv').classList.add("d-none");
                        form.querySelector('.courseDiv').classList.remove("d-none");
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
    @yield('script')


</body>

</html>
