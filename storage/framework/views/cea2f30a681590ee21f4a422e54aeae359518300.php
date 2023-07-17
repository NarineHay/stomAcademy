<div class="container mt-4 mt-lg-5">
    <div class="d-flex justify-content-center flex-wrap gap-2">
        <a href="<?php echo e(route('course.index')); ?>" class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">
            Все направления
        </a>
        <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route("course.index",['direction_id' => $direction->id])); ?>" class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">
                <?php echo e($direction->title); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\front\show-all-directions.blade.php ENDPATH**/ ?>