<?php $__env->startSection('title', 'Price'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление новой цены</h1>
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
            <form action="<?php echo e(route('admin.promo.update',$promo)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Код</label>
                        <input type="text" value="<?php echo e($promo->code); ?>" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Процент*</label>
                        <input type="text" value="<?php echo e($promo->prc); ?>" name="prc" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Min*</label>
                        <input type="text" value="<?php echo e($promo->min); ?>" name="min" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Макс. кол.( "0" если можно использовать бесконечно ):</label>
                        <input type="text" value="<?php echo e($promo->max); ?>" name="max" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус</label>
                        <select name="status" class="form-control">
                            <option <?php if($promo->status): ?> selected <?php endif; ?> value="1" selected>Активен</option>
                            <option <?php if(!$promo->status): ?> selected <?php endif; ?> value="0" >Отключен</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\promo\edit.blade.php ENDPATH**/ ?>