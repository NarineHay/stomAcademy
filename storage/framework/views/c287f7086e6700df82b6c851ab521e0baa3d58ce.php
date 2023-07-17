<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.catalog', ['type' => 'conferences'])->html();
} elseif ($_instance->childHasBeenRendered('cQWmu5S')) {
    $componentId = $_instance->getRenderedChildComponentId('cQWmu5S');
    $componentTag = $_instance->getRenderedChildComponentTagName('cQWmu5S');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cQWmu5S');
} else {
    $response = \Livewire\Livewire::mount('front.catalog', ['type' => 'conferences']);
    $html = $response->html();
    $_instance->logRenderedChild('cQWmu5S', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\online\index.blade.php ENDPATH**/ ?>