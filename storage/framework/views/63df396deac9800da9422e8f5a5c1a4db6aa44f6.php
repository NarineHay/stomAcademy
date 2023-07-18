


<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.catalog', ['type' => 'catalog'])->html();
} elseif ($_instance->childHasBeenRendered('sxMiMQL')) {
    $componentId = $_instance->getRenderedChildComponentId('sxMiMQL');
    $componentTag = $_instance->getRenderedChildComponentTagName('sxMiMQL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sxMiMQL');
} else {
    $response = \Livewire\Livewire::mount('front.catalog', ['type' => 'catalog']);
    $html = $response->html();
    $_instance->logRenderedChild('sxMiMQL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/front/catalog.blade.php ENDPATH**/ ?>