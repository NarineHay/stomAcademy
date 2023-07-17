<?php $__env->startSection('title', 'Video'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Видео</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.videos.create')); ?>" role="button">Добавить</a>
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
                                    <th>Фото</th>
                                    <th>URL</th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($video->image)); ?>" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <span><?php echo e($video->url); ?></span>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.videos.destroy',$video)); ?>" method="POST"
                                                  class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1"
                                                   href="<?php echo e(route('admin.videos.edit',$video)); ?>">Изменить</a>
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
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\videos\index.blade.php ENDPATH**/ ?>