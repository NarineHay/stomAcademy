<?php $__env->startSection("content"); ?>
    <section style="overflow: hidden">
        <div class="container">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.support', [])->html();
} elseif ($_instance->childHasBeenRendered('WWZbcmy')) {
    $componentId = $_instance->getRenderedChildComponentId('WWZbcmy');
    $componentTag = $_instance->getRenderedChildComponentTagName('WWZbcmy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WWZbcmy');
} else {
    $response = \Livewire\Livewire::mount('front.support', []);
    $html = $response->html();
    $_instance->logRenderedChild('WWZbcmy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\personal\help.blade.php ENDPATH**/ ?>