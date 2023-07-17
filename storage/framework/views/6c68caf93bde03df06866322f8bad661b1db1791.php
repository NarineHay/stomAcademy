<?php $__env->startSection('title', 'Lector'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0"><?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <?php if(session('success')): ?>
            <div class="alert alert-success mb-1 mt-1">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название курса/вебинара</th>
                                    <th>Кол-во продаж</th>
                                    <th>Процент</th>
                                </tr>
                                </thead>

                                <tbody>

                                    <?php $__currentLoopData = $user->lector->getCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route("admin.webinar.edit",$course)); ?>"><?php echo e($course->info->title); ?></a>
                                            </td>
                                            <td>
                                                <a>0</a>
                                            </td>
                                            <td>
                                                <a ><?php echo e($user->lector->per_of_sales ?? ""); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $user->lector->webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route("admin.webinar.edit",$webinar)); ?>"><?php echo e($webinar->info->title); ?></a>
                                            </td>
                                            <td>
                                                <a>0</a>
                                            </td>
                                            <td>
                                                <a><?php echo e($user->lector->per_of_sales ?? ""); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\lectors\show.blade.php ENDPATH**/ ?>