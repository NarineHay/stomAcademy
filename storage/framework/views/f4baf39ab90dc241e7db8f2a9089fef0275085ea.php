

<?php $__env->startSection("content"); ?>

    <div class="w-100 overflow-hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.catalog', ['type' => 'courses'])->html();
} elseif ($_instance->childHasBeenRendered('aen7uDG')) {
    $componentId = $_instance->getRenderedChildComponentId('aen7uDG');
    $componentTag = $_instance->getRenderedChildComponentTagName('aen7uDG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aen7uDG');
} else {
    $response = \Livewire\Livewire::mount('front.catalog', ['type' => 'courses']);
    $html = $response->html();
    $_instance->logRenderedChild('aen7uDG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/front/course/index.blade.php ENDPATH**/ ?>