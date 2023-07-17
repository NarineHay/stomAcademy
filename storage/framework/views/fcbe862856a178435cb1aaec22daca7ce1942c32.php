<?php $__env->startSection('title', 'Payment'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Оплаты</h1>
                </div>
            </div>

        </div>
    </div>

    <section class="content">
        <?php if(session('success')): ?>
            <div class="alert alert-success mb-1 mt-1">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>













                                    <th>Фио Клиента</th>
                                    <th>Курс/Вебинар</th>
                                    <th>Сумма</th>
                                    <th>Валюта</th>
                                    <th></th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>



                                        <td>
                                            <a><?php echo e($payment->user->name); ?></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>








                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\payments\index.blade.php ENDPATH**/ ?>