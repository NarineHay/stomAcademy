


<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.catalog', ['type' => 'catalog'])->html();
} elseif ($_instance->childHasBeenRendered('If8HwKZ')) {
    $componentId = $_instance->getRenderedChildComponentId('If8HwKZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('If8HwKZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('If8HwKZ');
} else {
    $response = \Livewire\Livewire::mount('front.catalog', ['type' => 'catalog']);
    $html = $response->html();
    $_instance->logRenderedChild('If8HwKZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\catalog.blade.php ENDPATH**/ ?>