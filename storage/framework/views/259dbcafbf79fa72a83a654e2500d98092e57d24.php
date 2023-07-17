

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-center" style="padding: 130px 0 50px;">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.home-login', [])->html();
} elseif ($_instance->childHasBeenRendered('NYAxkzU')) {
    $componentId = $_instance->getRenderedChildComponentId('NYAxkzU');
    $componentTag = $_instance->getRenderedChildComponentTagName('NYAxkzU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NYAxkzU');
} else {
    $response = \Livewire\Livewire::mount('front.home-login', []);
    $html = $response->html();
    $_instance->logRenderedChild('NYAxkzU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/auth/login.blade.php ENDPATH**/ ?>