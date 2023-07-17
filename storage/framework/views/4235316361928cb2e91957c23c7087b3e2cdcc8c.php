<?php $__env->startSection('title', 'Certificate'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Сертификаты</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.certificates.create')); ?>" role="button">Добавить</a>
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
                                    <th>Изображение</th>

                                    <th>Название курса</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($certificate->image)); ?>" height="70" alt=""/></a>
                                        </td>

                                        <td>
                                            <a><?php echo e($certificate->course->info->title); ?></a>
                                        </td>

                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.certificates.destroy',$certificate)); ?>" method="POST" class="d-flex justify-content-between">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.certificates.edit',$certificate)); ?>">Изменить</a>
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
                        <?php echo e($certificates->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\certificates\index.blade.php ENDPATH**/ ?>