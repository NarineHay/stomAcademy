

<?php $__env->startSection("content"); ?>
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <?php if (isset($component)) { $__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d = $component; } ?>
<?php $component = App\View\Components\Profile::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Profile::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d)): ?>
<?php $component = $__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d; ?>
<?php unset($__componentOriginala554c4324eab269efd2b1e4c4eeb4dfa2c3f9d1d); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-10">
                    <?php echo $__env->yieldContent("profile-content"); ?>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/layouts/prodile.blade.php ENDPATH**/ ?>