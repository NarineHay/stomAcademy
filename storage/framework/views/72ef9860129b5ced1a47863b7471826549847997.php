<?php $__env->startSection('title', 'Promo'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Промокоды</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.promo.create')); ?>" role="button">Добавить</a>
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













                                    <th>Код</th>

                                    <th>Процент</th>

                                    <th>Min</th>

                                    <th>Кол. исп.</th>

                                    <th>Макс. кол.</th>

                                    <th>Статус</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $promos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>



                                        <td>
                                            <a><?php echo e($promo->code); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($promo->prc); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($promo->min); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($promo->used); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($promo->max); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($promo->status == 1 ? "Активна" : "Отключена"); ?></a>
                                        </td>

                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.promo.destroy',$promo)); ?>" method="POST"
                                                  class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1"
                                                   href="<?php echo e(route('admin.promo.edit',$promo)); ?>">Изменить</a>
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger mx-1" id="button">Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($promos->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\promo\index.blade.php ENDPATH**/ ?>