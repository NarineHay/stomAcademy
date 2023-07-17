<?php $__env->startSection('title', 'Page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Все страницы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.pages.create')); ?>" role="button">Добавить</a>
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
                                        <th><span>Meta title</span></th>

                                        <th><span>Meta description</span></th>

                                        <th><span>Heading</span></th>

                                        <th><span>Кнопки управления</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a><?php echo e($page->info->meta_title); ?></a>
                                            </td>

                                            <td>
                                                <a><?php echo e(strip_tags($page->info->meta_description)); ?></a>
                                            </td>

                                            <td>
                                                <a><?php echo e($page->info->heading); ?></a>
                                            </td>

                                            <td class="project-actions text-right">
                                                <form action="<?php echo e(route('admin.pages.destroy',$page)); ?>" method="POST" class="d-flex justify-content-around">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.pages.edit',$page)); ?>">Изменить</a>
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
                        <?php echo e($pages->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\pages\index.blade.php ENDPATH**/ ?>