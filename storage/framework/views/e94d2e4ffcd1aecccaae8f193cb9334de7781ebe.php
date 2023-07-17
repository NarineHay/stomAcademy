<?php $__env->startSection("content"); ?>
    <div class="container mb-5 mb-lg-6">
        <div>
            <div class="d-flex mt-2 mt-md-3 py-2">
                <a href="<?php echo e(route('home')); ?>"><p class="fs-12 f-500 text-secondary m-0">Главная</p></a>
                <a ><p class="fs-12 f-500 text-black ms-3 m-0 main">Контакты</p></a>
            </div>
            <div class="mt-3">

            </div>























































<div class="courses-show-div">
    <?php if (isset($component)) { $__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b = $component; } ?>
<?php $component = App\View\Components\ContactForm::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('contact-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ContactForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b)): ?>
<?php $component = $__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b; ?>
<?php unset($__componentOriginaldb8f1a38f857d7a0efab802224b458f125dfbb2b); ?>
<?php endif; ?>
</div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\front\contacts.blade.php ENDPATH**/ ?>