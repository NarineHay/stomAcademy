

<?php $__env->startSection('title', 'User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового пользователя</h1>
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
            <form action="<?php echo e(route('admin.users.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ*</label>
                        <input value="<?php echo e(old("fname")); ?>" type="text" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ФАМИЛИЯ*</label>
                        <input value="<?php echo e(old("lname")); ?>" type="text" name="lname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПАРОЛЬ*</label>
                        <input value="<?php echo e(old("password")); ?>" type="text" name="password" class="form-control" placeholder="ПАРОЛЬ...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЭЛЕКТРОНАНЯ ПОЧТА*</label>
                        <input value="<?php echo e(old("email")); ?>" type="email" name="email" class="form-control" placeholder="Введите электронную почту...">
                    </div>






                    <div class="form-group">
                        <label for="exampleInputEmail1">ТЕЛЕФОН</label>
                        <input value="<?php echo e(old("phone")); ?>" type="text" name="phone" class="form-control" placeholder="Введите телефон...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА РОЖДЕНИЯ</label>
                        <input value="<?php echo e(old("birth_date")); ?>" type="date" name="birth_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТРАНА</label>
                        <select class="form-control select2" name="country_id">
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($country->id == old("country_id")): ?> selected <?php endif; ?> value="<?php echo e($country->id); ?>"><?php echo e($country->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ГОРОД</label>
                        <input type="text" name="city" class="form-control" placeholder="Введите город проживания...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИНТЕРЕСУЮЩИЕ НАПРАВЛЕНИЯ</label>
                        <ul class="list-unstyled">
                        <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="form-check-label">
                                    <input <?php if(old('directions') && in_array($direction->id,old('directions'))): ?> checked <?php endif; ?> type="checkbox" value="<?php echo e($direction->id); ?>" class="mr-2" name="direction[]">
                                        <span><?php echo e($direction->title); ?></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС</label>
                        <select class="form-control" name="status">
                            <option value="1">Активирован</option>
                            <option value="0">Не активирован</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПРИВИЛЕГИИ</label>
                        <select class="form-control select2" name="role">
                            <option value="<?php echo e(\App\Models\User::ROLE_USER); ?>">Пользователь</option>
                            <option value="<?php echo e(\App\Models\User::ROLE_ADMIN); ?>">Администратор</option>
                            <option value="<?php echo e(\App\Models\User::ROLE_LECTOR); ?>">Лектор</option>
                            <option value="<?php echo e(\App\Models\User::ROLE_MODER); ?>">Модератор</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фотография</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\users\create.blade.php ENDPATH**/ ?>