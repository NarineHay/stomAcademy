

<?php $__env->startSection('title', 'Lector'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Лектора</h1>
                </div>
            </div>
        </div>

        <form method="get" class="mt-4 ml-2">
            <div>
                <div class="d-flex align-items-end">
                    <div class="mr-3 w-25">
                        <label>Лектор</label>
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
                                    <th>Аватар</th>
                                    <th>Фио лектора</th>
                                    <th>Специализация</th>
                                    <th>Кол-во курсов</th>
                                    <th>% от продаж</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $lectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->lector->photo)); ?>" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->lector->directions->title ?? ""); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->lector ? $user->lector->getCourseCount() : 0); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($user->lector->per_of_sales ?? ""); ?></a>
                                        </td>
                                       <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.lectors.destroy',$user)); ?>" method="POST" class="d-flex justify-content-around">
                                               <?php echo csrf_field(); ?>
                                               <?php echo method_field('DELETE'); ?>
                                               <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.lectors.edit',$user)); ?>">Изменить</a>
                                               <a class="btn btn-success mx-1" href="<?php echo e(route('admin.lectors.show',$user)); ?>">Показать</a>
                                           </form>
                                       </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($lectors->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\lectors\index.blade.php ENDPATH**/ ?>