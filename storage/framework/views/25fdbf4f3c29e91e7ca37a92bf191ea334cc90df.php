<?php $__env->startSection('title', 'Certificate'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование сертификата</h1>
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

            <div class="container">
                <div class = "card card-primary">
                    <div class="row">
                        <div class="card-body">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.coordinates', ['certificate' => $certificate])->html();
} elseif ($_instance->childHasBeenRendered('wf7FmTG')) {
    $componentId = $_instance->getRenderedChildComponentId('wf7FmTG');
    $componentTag = $_instance->getRenderedChildComponentTagName('wf7FmTG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wf7FmTG');
} else {
    $response = \Livewire\Livewire::mount('admin.coordinates', ['certificate' => $certificate]);
    $html = $response->html();
    $_instance->logRenderedChild('wf7FmTG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/admin/certificates/edit.blade.php ENDPATH**/ ?>