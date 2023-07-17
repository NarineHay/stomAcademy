<?php $__env->startSection("content"); ?>
    <div class="w-100 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="d-flex mt-2 mt-md-3 py-2 ">
                        <a href="<?php echo e(route('home')); ?>"><span class="fs-12 f-500 text-secondary"><?php echo e(__("header.menu.home")); ?></span></a>
                        <a><span class="fs-12 f-500 ms-3 main"><?php echo e(__("header.menu.blog")); ?></span></a>
                    </div>
                    <div class="mt-3">
                        <h2 class="f-600"><?php echo e(__("header.menu.blog")); ?></h2>
                    </div>
                    <div class="col d-flex d-lg-none mt-2 filter_buttons_mobile mb-2">
                        <button class="fs-12 f-600 py-2 w-50 bg-transparent w-100"><?php echo e(__("blog.category_title")); ?></button>
                    </div>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.blogs-catalog', [])->html();
} elseif ($_instance->childHasBeenRendered('FET8rCH')) {
    $componentId = $_instance->getRenderedChildComponentId('FET8rCH');
    $componentTag = $_instance->getRenderedChildComponentTagName('FET8rCH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FET8rCH');
} else {
    $response = \Livewire\Livewire::mount('front.blogs-catalog', []);
    $html = $response->html();
    $_instance->logRenderedChild('FET8rCH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\blog\index.blade.php ENDPATH**/ ?>