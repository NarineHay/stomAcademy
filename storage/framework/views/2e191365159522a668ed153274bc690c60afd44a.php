


<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.lectors-catalog', [])->html();
} elseif ($_instance->childHasBeenRendered('NOycACI')) {
    $componentId = $_instance->getRenderedChildComponentId('NOycACI');
    $componentTag = $_instance->getRenderedChildComponentTagName('NOycACI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NOycACI');
} else {
    $response = \Livewire\Livewire::mount('front.lectors-catalog', []);
    $html = $response->html();
    $_instance->logRenderedChild('NOycACI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\lectors\index.blade.php ENDPATH**/ ?>