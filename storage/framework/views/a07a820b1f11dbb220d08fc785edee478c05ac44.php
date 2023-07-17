 

<?php $__env->startSection('title', 'User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Пользователи</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.users.create')); ?>" role="button">Добавить</a>
                </div>
            </div>

            <form method="get">
                <div class="d-flex justify-content-sm-start mt-3 w-50">
                    <select class="form-control select2" name="search_user">
                        <option value="0">---</option>
                        <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($user->id == $search_user): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>">
                                <?php echo e($user->userinfo->fname); ?><?php echo e($user->userinfo->fname); ?>/<?php echo e($user->email); ?>/<?php echo e($user->userinfo->phone); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button class="btn btn-outline-primary ml-2" type="submit" style="height: 38px">Поиск</button>
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
                                    <th>
                                        <span>Изображение</span>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Пользователь</span>
                                            <div class="sort ml-2">
                                                <a href=<?php echo e(route('admin.users.index',['order'=>'name','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href=<?php echo e(route('admin.users.index',['order'=>'name','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Страна</span></th>

                                    <th><span>Телефон</span></th>

                                    <th><span>Баланс</span></th>

                                    <th><span>Статус</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Привелегии</span>
                                            <div class="sort ml-2">
                                                <a href=<?php echo e(route('admin.users.index',['order'=>'role','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href=<?php echo e(route('admin.users.index',['order'=>'role','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        Кнопки управления
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->userinfo->image)); ?>" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <p class="mb-0"><b><?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?></b></p>
                                            <p class="mb-0"><?php echo e($user->email); ?></p>
                                            <p class="mb-0">Зарегистрован։<?php echo e($user->created_at); ?></p>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->userinfo->country->title  ?? ""); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->userinfo->phone); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->balance->balance); ?>$</a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->userinfo->status == 1 ? "Активирован" : "Не активирован"); ?></a>
                                        </td>
                                        <td>
                                            <a>
                                                <?php echo e($user->role == \App\Models\User::ROLE_USER ? "Пользователь" :
                                                 ($user->role == \App\Models\User::ROLE_ADMIN ? "Администратор" :
                                                 ($user->role == \App\Models\User::ROLE_LECTOR ? "Лектор" : "Модератор"))); ?>

                                            </a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.users.destroy',$user)); ?>" method="POST" class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.users.edit',$user)); ?>">Изменить</a>
                                                <?php if($user->id != 1): ?>
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>
                                                <?php endif; ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/admin/users/index.blade.php ENDPATH**/ ?>