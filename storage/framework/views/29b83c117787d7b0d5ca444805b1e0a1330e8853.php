

<?php $__env->startSection('title', 'Access'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-2">
                <div>
                    <h1 class="m-0">Доступы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.accesses.create')); ?>" role="button">Добавить</a>
                </div>
            </div>

            <form method="get">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="w-25 mr-3">
                            <label>Курс/Вебинар</label>
                            <select class="form-control select2" name="search_webinar">
                                <option value="0">---</option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($course->id == $search_webinar): ?> selected <?php endif; ?> value="<?php echo e($course->id); ?>">
                                        <?php echo e($course->info->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($webinar->id == $search_webinar): ?> selected <?php endif; ?>  value="<?php echo e($webinar->id); ?>">
                                        <?php echo e($webinar->info->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mr-3 w-25">
                            <label>Пользователь</label>
                            <select class="form-control select2" name="search_user">
                                <option value="0">---</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($user->id == $search_user): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>">
                                        <?php if(!$user->userinfo->fname && !$user->userinfo->lname): ?>
                                            <?php echo e($user->email); ?>

                                        <?php else: ?>
                                            <?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="btn btn-outline-primary" type="submit" style="height: 38px">Поиск</button>
                    </div>
                </div>
            </form>
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
                                    <th>Название Курса/Вебинара</th>
                                    <th>Пользователь</th>
                                    <th>Менеджер</th>
                                    <th>Дата открытия доступа</th>
                                    <th>Дата окончания доступа</th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $accesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $access): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><?php echo e($access->course->info->title ?? $access->webinar->info->title); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($access->user->userinfo->fname); ?> <?php echo e($access->user->userinfo->lname); ?>  (<?php echo e($access->user->email); ?>)</a>
                                        </td>
                                        <td>
                                            <a><?php echo e($access->manager->userinfo->fname); ?> <?php echo e($access->manager->userinfo->lname); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($access->created_at); ?></a>
                                        </td>
                                        <td>
                                            <?php if($access->access_time == 0): ?>
                                                <a>Никогда</a>
                                            <?php else: ?>
                                                <a><?php echo e(\Carbon\Carbon::make($access->created_at)->addDay($access->duration)); ?></a>
                                            <?php endif; ?>

                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.accesses.destroy',$access)); ?>" method="POST" class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.accesses.edit',$access)); ?>">Изменить</a>
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($accesses->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\accesses\index.blade.php ENDPATH**/ ?>