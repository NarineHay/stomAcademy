<?php $__env->startSection("content"); ?>
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <?php if (isset($component)) { $__componentOriginalcad8de85c8492403f769e95a2f29228468215fc9 = $component; } ?>
<?php $component = App\View\Components\LectorProfile::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lector-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\LectorProfile::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcad8de85c8492403f769e95a2f29228468215fc9)): ?>
<?php $component = $__componentOriginalcad8de85c8492403f769e95a2f29228468215fc9; ?>
<?php unset($__componentOriginalcad8de85c8492403f769e95a2f29228468215fc9); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
                        <div class="d-flex justify-content-between">
                            <h3 class="f-700 m-0">Настройки профиля</h3>
                        </div>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.change-info', [])->html();
} elseif ($_instance->childHasBeenRendered('4ttz1yC')) {
    $componentId = $_instance->getRenderedChildComponentId('4ttz1yC');
    $componentTag = $_instance->getRenderedChildComponentTagName('4ttz1yC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4ttz1yC');
} else {
    $response = \Livewire\Livewire::mount('front.change-info', []);
    $html = $response->html();
    $_instance->logRenderedChild('4ttz1yC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\lector\information.blade.php ENDPATH**/ ?>