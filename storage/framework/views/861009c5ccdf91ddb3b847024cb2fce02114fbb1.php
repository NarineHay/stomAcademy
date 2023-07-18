

<?php $__env->startSection('title', 'Chat'); ?>

<?php $__env->startSection('content'); ?>
    <div id="admin_chat">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('front.support', [])->html();
} elseif ($_instance->childHasBeenRendered('AJ837Jt')) {
    $componentId = $_instance->getRenderedChildComponentId('AJ837Jt');
    $componentTag = $_instance->getRenderedChildComponentTagName('AJ837Jt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AJ837Jt');
} else {
    $response = \Livewire\Livewire::mount('front.support', []);
    $html = $response->html();
    $_instance->logRenderedChild('AJ837Jt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <style>
        #admin_chat .first_block{
            width: 20px!important;
            max-width: 20px!important;
        }
        #admin_chat .fa-search{
            display: none;
        }
        #admin_chat .fa-paper-plane{
            display: none;
        }
        .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }
    </style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/admin/chat/index.blade.php ENDPATH**/ ?>