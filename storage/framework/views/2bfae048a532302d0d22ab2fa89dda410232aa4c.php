

<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.catalog', ['type' => 'webinars'])->html();
} elseif ($_instance->childHasBeenRendered('E2XuYQe')) {
    $componentId = $_instance->getRenderedChildComponentId('E2XuYQe');
    $componentTag = $_instance->getRenderedChildComponentTagName('E2XuYQe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('E2XuYQe');
} else {
    $response = \Livewire\Livewire::mount('front.catalog', ['type' => 'webinars']);
    $html = $response->html();
    $_instance->logRenderedChild('E2XuYQe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/front/webinar/index.blade.php ENDPATH**/ ?>