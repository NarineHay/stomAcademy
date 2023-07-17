<?php $__env->startSection('title', 'Access'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <section class="content">
        <?php if(session('success')): ?>
            <div class="alert alert-success mb-1 mt-1">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card card-primary">
            <form class="access_form" action="<?php echo e(route('admin.accesses.update',$access->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пользователь*</label>
                        <select class="form-control form-control" name="user_id">
                            <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $access->user_id ? 'selected' : ''); ?>>
                                    <?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?>*<?php echo e($user->email); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="course" style="margin-right: 10px">
                                <input type="radio" id="course" name="type" value="course" <?php echo e($access->course_id != null ? 'checked' : ''); ?>>
                                Курс</label>

                            <label for="webinar">
                                <input type="radio" id="webinar" name="type" value="webinar" <?php echo e($access->webinar_id != null ? 'checked' : ''); ?>>
                                Вебинар</label>
                        </div>
                    </div>

                    <div class="form-group <?php if($access->course_id == null): ?> d-none <?php endif; ?> courseDiv" id="">
                        <label for="exampleInputEmail1">Курс</label>
                        <select class="form-control select2" name="course_id">
                            <?php $__currentLoopData = $data['courses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($course->id); ?>" <?php echo e($course->id == $access->course_id ? 'selected' : ''); ?>>
                                    <?php echo e($course->info->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group <?php if($access->webinar_id == null): ?> d-none <?php endif; ?> webinarDiv">
                        <label for="exampleInputEmail1">Вебинар</label>
                        <select class="form-control select2" name="webinar_id">
                            <?php $__currentLoopData = $data['webinars']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($webinar->id); ?>" <?php echo e($webinar->id == $access->webinar_id ? 'selected' : ''); ?>>
                                    <?php echo e($webinar->info->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус просмотра</label>
                        <div>
                            <label for="temporary" class="mr-1">
                                <input type="radio" id="temporary" name="access_time" value="1" <?php echo e($access->access_time == 1 ? 'checked' : ''); ?>>

                                Доступ определенный период</label>

                            <label for="permanent">
                                <input type="radio" id="permanent" name="access_time" value="0" <?php echo e($access->access_time == 0 ? 'checked' : ''); ?>>

                                Постоянный доступ</label>
                        </div>
                    </div>

                    <select class="form-control <?php if($access->access_time == 0): ?> d-none <?php endif; ?> duration" name="duration">
                        <?php for($i = 5; $i <= 30; $i+=5): ?>
                            <option <?php echo e($access->duration == $i ? 'selected' : ''); ?> ><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\accesses\edit.blade.php ENDPATH**/ ?>