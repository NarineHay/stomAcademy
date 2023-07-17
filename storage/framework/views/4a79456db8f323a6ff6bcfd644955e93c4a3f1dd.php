

<?php $__env->startSection('title', 'Edit page'); ?>

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
            <form action="<?php echo e(route('admin.pages.update',$page->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">URL</label>
                        <input type="text" value="<?php echo e($page->url); ?>" name="url" class="form-control">
                    </div>

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($k == 0): ?> active <?php endif; ?>" data-toggle="pill" href="#lg_tab_<?php echo e($lg->id); ?>" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><?php echo e($lg->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <?php $__currentLoopData = $page->infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($k == 0): ?> show active <?php endif; ?>" id="lg_tab_<?php echo e($info->lg_id); ?>" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" <?php if($info->enabled): echo 'checked'; endif; ?> value="true" name="enabled[<?php echo e($info->lg_id); ?>]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta title*</label>
                                            <input type="text" name="meta_title[<?php echo e($info->lg_id); ?>]" class="form-control" value="<?php echo e($info->meta_title); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta description*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="meta_description[<?php echo e($info->lg_id); ?>]"><?php echo e($info->meta_description); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Heading*</label>
                                            <input type="text" name="heading[<?php echo e($info->lg_id); ?>]" value="<?php echo e($info->heading); ?>" class="form-control">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\pages\edit.blade.php ENDPATH**/ ?>