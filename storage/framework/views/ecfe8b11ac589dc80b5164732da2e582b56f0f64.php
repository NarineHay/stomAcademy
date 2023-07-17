<div class="py-5 py-lg-6">
    <div class="mb-6 my-4 my-lg-6" style="z-index: 1">
        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->userinfo->image ?? "userinfo/unknown.png")); ?>" alt="profilePic" class="rounded-circle" width="73px" height="73px">
        <h5 class="f-700 mt-3 m-0"><?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?></h5>
        <div class="d-flex mt-3">
            <i class="fal fa-pencil"></i>
            <p class="m-0 fs-14 f-500 text-secondary ms-2">
                <a href="<?php echo e(route('lector.personal')); ?>" style="color: #7A7A7A">Настройки профиля</a>
            </p>
        </div>
    </div>
    <div>
        <div class="d-flex mb-4 text-primary mt-2">
            <i class="fal fa-user me-2"></i>
            <a href="<?php echo e(route('lector.profile')); ?>" class="text-decoration-none text-primary fs-14 f-500">Мой профиль</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-play-circle me-2"></i>
            <a href="<?php echo e(route('lector.courses')); ?>" class="text-decoration-none text-black fs-14 f-500">Курсы</a>
        </div>




        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-comment me-2"></i>
            <a href="<?php echo e(route('lector.chats')); ?>" class="text-decoration-none text-black fs-14 f-500">Поддержка</a>
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

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\components\lector-profile.blade.php ENDPATH**/ ?>