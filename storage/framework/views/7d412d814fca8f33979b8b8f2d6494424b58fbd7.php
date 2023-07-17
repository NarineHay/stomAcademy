<?php $__env->startSection('title', 'Edit price'); ?>

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
            <form action="<?php echo e(route('admin.prices.update',$price->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                        <input type="text" value="<?php echo e($price->name); ?>" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BYN</label>
                        <input type="text" value="<?php echo e($price->byn); ?>" name="byn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">RUB</label>
                        <input type="text" value="<?php echo e($price->rub); ?>" name="rub" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">USD</label>
                        <input type="text" value="<?php echo e($price->usd); ?>" name="usd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">EUR</label>
                        <input type="text" value="<?php echo e($price->eur); ?>" name="eur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">UAH</label>
                        <input type="text" value="<?php echo e($price->uah); ?>" name="uah" class="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\prices\edit.blade.php ENDPATH**/ ?>