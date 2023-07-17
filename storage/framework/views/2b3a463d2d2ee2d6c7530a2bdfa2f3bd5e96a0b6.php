<?php $__env->startSection('title', 'Webinar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Вебинары</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.webinar.create')); ?>" role="button">Добавить</a>
                </div>
            </div>
        </div>

        <form method="get" class="ml-2">
            <div>
                <div class="d-flex align-items-end">
                    <div class="w-25 mr-3">
                        <select class="form-control select2" name="search_webinar">
                            <option value="0">---</option>
                            <?php $__currentLoopData = $all_webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($webinar->id == $search_webinar): ?> selected <?php endif; ?> value="<?php echo e($webinar->id); ?>">
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
                                    <?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button class="btn btn-outline-primary" type="submit" style="height: 38px">Поиск</button>
                </div>
            </div>
        </form>
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
                                    <th><span>Изображение</span></th>
                                    <th><span>Название вебинара</span>
                                    </th>
                                    <th><span>Лектор</span></th>
                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата проведения</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = <?php echo e(route('admin.webinar.index',['order'=>'start_date','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = <?php echo e(route('admin.webinar.index',['order'=>'start_date','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Кол-во польз.</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Статус</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = <?php echo e(route('admin.webinar.index',['order'=>'status','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = <?php echo e(route('admin.webinar.index',['order'=>'status','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Кнопки управления</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $webinars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webinar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->image)); ?>" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($webinar->info->title); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($webinar->user->userinfo->fname); ?> <?php echo e($webinar->user->userinfo->lname); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($webinar->start_date); ?></a>
                                        </td>
                                        <td>
                                            <a>0</a>
                                        </td>
                                        <td>
                                            <a><?php echo e($webinar->status == 1 ? "Активен" : "Отключен"); ?></a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.webinar.destroy',$webinar)); ?>" method="POST" class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.webinar.edit',$webinar)); ?>">Изменить</a>
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
                        <?php echo e($webinars->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\webinars\index.blade.php ENDPATH**/ ?>