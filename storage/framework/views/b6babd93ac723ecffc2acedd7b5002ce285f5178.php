

<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">СТАТЬИ</h1>
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
            <form action="<?php echo e(route('admin.blogs.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label>
                        <select class="form-control select2" name="category_id">
                            <?php $__currentLoopData = $data['directions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($direction->id); ?>">
                                    <?php echo e($direction->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
                                <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($k == 0): ?> show active <?php endif; ?>" id="lg_tab_<?php echo e($lg->id); ?>" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label >
                                                <input type="checkbox" value="true" name="enabled[<?php echo e($lg->id); ?>]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                                            <input type="text" value="<?php echo e(old('title')[$lg->id] ?? ""); ?>" name="title[<?php echo e($lg->id); ?>]" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="text[<?php echo e($lg->id); ?>]"><?php echo e(old('text')[$lg->id] ?? ""); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 3rem">
                                            <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                                            <div class="custom-file">
                                                <input type="file" name="image[<?php echo e($lg->id); ?>]" class="form-control" id="customFile_<?php echo e($lg->id); ?>">
                                                <label class="custom-file-label" for="customFile_<?php echo e($lg->id); ?>">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\blogs\create.blade.php ENDPATH**/ ?>