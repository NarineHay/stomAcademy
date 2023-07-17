<div>
    <div class="mb-6 my-4 my-lg-6" style="z-index: 1">
        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->userinfo->image ?? "userinfo/unknown.png")); ?>" alt="profilePic" class="rounded-circle" width="73px" height="73px">
        <h5 class="f-700 mt-3 m-0"><?php echo e($user->userinfo->fname); ?>

            <span class="fs-15">
                   <?php echo e($user->userinfo->lname); ?>

            </span>

        </h5>
        <div class="d-flex mt-3">
            <i class="fal fa-pencil"></i>
            <p class="m-0 fs-14 f-500 text-secondary ms-2">
                <a href="<?php echo e(route('personal.information')); ?>" style="color: #7A7A7A">Настройки профиля</a>
            </p>
        </div>
    </div>
    <div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-play-circle me-2 "></i>
            <a href="<?php echo e(route('personal.courses')); ?>" class="text-decoration-none text-black fs-14 f-500">Мои курсы</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-box-alt me-2"></i>
            <a href="<?php echo e(route('personal.certificates')); ?>" class="text-decoration-none text-black fs-14 f-500">Сертификаты</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-file-certificate me-2"></i>
            <a href="<?php echo e(route('personal.history')); ?>" class="text-decoration-none text-black fs-14 f-500">История покупок</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-cart-arrow-down me-2"></i>
            <a href="<?php echo e(route('personal.cart')); ?>" class="text-decoration-none text-black fs-14 f-500">Корзина</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-comment me-2"></i>
            <a href="<?php echo e(route('personal.help')); ?>" class="text-decoration-none text-black fs-14 f-500">Поддержка</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <form action="<?php echo e(route('logout')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <i class="fal fa-sign-out"></i>
                <a onclick="this.parentNode.submit()" href="#" class="text-decoration-none text-black fs-14 f-500">Выйти</a>
            </form>
        </div>
    </div>
</div>

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\components\profile.blade.php ENDPATH**/ ?>