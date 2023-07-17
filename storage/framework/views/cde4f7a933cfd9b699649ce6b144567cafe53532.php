


<?php $__env->startSection("profile-content"); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.cart-component', [])->html();
} elseif ($_instance->childHasBeenRendered('SpWaut7')) {
    $componentId = $_instance->getRenderedChildComponentId('SpWaut7');
    $componentTag = $_instance->getRenderedChildComponentTagName('SpWaut7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SpWaut7');
} else {
    $response = \Livewire\Livewire::mount('front.cart-component', []);
    $html = $response->html();
    $_instance->logRenderedChild('SpWaut7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.prodile", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\personal\cart.blade.php ENDPATH**/ ?>