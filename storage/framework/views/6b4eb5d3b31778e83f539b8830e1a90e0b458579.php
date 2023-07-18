

<?php $__env->startSection('title', 'Edit user'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success mb-1 mt-1">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card card-primary">
            <form action="<?php echo e(route('admin.users.update',$user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ*</label>
                        <input type="text" value="<?php echo e($user->userinfo->fname); ?>" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ФАМИЛИЯ*</label>
                        <input type="text" value="<?php echo e($user->userinfo->lname); ?>" name="lname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПАРОЛЬ*</label>
                        <input type="text" value="" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЭЛЕКТРОНАНЯ ПОЧТА*</label>
                        <input type="text" value="<?php echo e($user->email); ?>" name="email" class="form-control">
                    </div>






                    <div class="form-group">
                        <label for="exampleInputEmail1">ТЕЛЕФОН</label>
                        <input type="text" value="<?php echo e($user->userinfo->phone); ?>" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА РОЖДЕНИЯ</label>
                        <input type="date" value="<?php echo e($user->userinfo->birth_date); ?>" name="birth_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТРАНА</label>
                        <select class="form-control select2" id="type" name="country_id">
                            <?php $__currentLoopData = $data['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>" <?php echo e($country->id == $user->userinfo->country_id ? 'selected' : ''); ?>>
                                    <?php echo e($country->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ГОРОД</label>
                        <input type="text" value="<?php echo e($user->userinfo->city); ?>" name="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИНТЕРЕСУЮЩИЕ НАПРАВЛЕНИЯ</label><br>
                        <?php $__currentLoopData = $data['directions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="checkbox" name="direction[]" value="<?php echo e($direction->id); ?>"
                                <?php if( $user->directions->where("direction_id",$direction->id)->count()): ?> checked <?php endif; ?>
                            class="mr-1"><?php echo e($direction->title); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС</label>
                        <select class="form-control" id="type" name="status">
                            <option value="1" <?php echo e($user->userinfo->status == 1 ? " selected" : ""); ?>>Активирован</option>
                            <option value="0" <?php echo e($user->userinfo->status == 0 ? " selected" : ""); ?>>Не активирован</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПРИВИЛЕГИИ</label>
                        <select class="form-control select2" id="type" name="role">
                            <option <?php echo e($user->role == \App\Models\User::ROLE_USER ? " selected" : ""); ?> value="<?php echo e(\App\Models\User::ROLE_USER); ?>">Пользователь</option>
                            <option <?php echo e($user->role == \App\Models\User::ROLE_ADMIN ? " selected" : ""); ?> value="<?php echo e(\App\Models\User::ROLE_ADMIN); ?>">Администратор</option>
                            <option <?php echo e($user->role == \App\Models\User::ROLE_LECTOR ? " selected" : ""); ?> value="<?php echo e(\App\Models\User::ROLE_LECTOR); ?>">Лектор</option>
                            <option <?php echo e($user->role == \App\Models\User::ROLE_MODER ? " selected" : ""); ?> value="<?php echo e(\App\Models\User::ROLE_MODER); ?>">Модератор</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фотография</label>
                        <div class="form-group">
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->userinfo->image)); ?>" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>