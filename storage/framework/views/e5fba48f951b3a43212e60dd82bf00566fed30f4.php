<?php if($password): ?>
    <p><b>Логин: </b></p> <?php echo e($email); ?>

    <p><b>Пароль: </b></p> <?php echo e($password); ?>

<?php endif; ?>
<p>-- <?php echo e($name); ?> -- </p>
    <?php if($type =='course'): ?>
        <p>Вам открыт доступ к просмотру курса <?php echo e($course->info->title); ?></p>
    <?php elseif($type =='webinar'): ?>
        <p>Вам открыт доступ к просмотру вебинара <?php echo e($webinar->info->title); ?></p>
    <?php endif; ?>

    <?php if($access_time): ?>
        <p>Доступность <?php echo e($duration); ?> дней</p>
    <?php else: ?>
        <p>У вас есть постоянный доступ</p>
    <?php endif; ?>

    <a href="<?php echo e(route("login")); ?>">Логин</a>

<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\mail\userAccessMail.blade.php ENDPATH**/ ?>