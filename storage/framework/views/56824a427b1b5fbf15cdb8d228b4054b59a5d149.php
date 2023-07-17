








































































































































<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width: 600px">
    <h2 class="mb-5">Laravel Image Text Example</h2>
    <form action="<?php echo e(route('image.create')); ?>" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>










        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <input type="file" name="file" class="form-control"  id="formFile">
        </div>
        <div class="d-grid mt-4">
            <button type="submit" name="submit" class="btn btn-primary">
                Upload File
            </button>
        </div>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\welcome.blade.php ENDPATH**/ ?>