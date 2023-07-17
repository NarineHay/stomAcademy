<?php $__env->startSection('title', 'Course'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Курсы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.course.create')); ?>" role="button">Добавить</a>
                </div>
            </div>
        </div>
        <form method="get" class="ml-2">
            <div class="d-flex justify-content-sm-start mt-3 w-50">
                <select class="form-control select2" name="search_course">
                    <option value="0">---</option>
                    <?php $__currentLoopData = $all_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($course->id == $search_course): ?> selected <?php endif; ?> value="<?php echo e($course->id); ?>">
                            <?php echo e($course->info->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button class="btn btn-outline-primary ml-2" type="submit" style="height: 38px">Поиск</button>
            </div>
        </form>
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
                                    <th>Изображение</th>

                                    <th><span>Название курса</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата проведения</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = <?php echo e(route('admin.course.index',['order'=>'start_date','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = <?php echo e(route('admin.course.index',['order'=>'start_date','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата окончания</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = <?php echo e(route('admin.course.index',['order'=>'end_date','sort'=>'asc'])); ?>>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = <?php echo e(route('admin.course.index',['order'=>'end_date','sort'=>'desc'])); ?>>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>Цены</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a><img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($course->image)); ?>" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($course->info->title); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($course->start_date); ?></a>
                                        </td>
                                        <td>
                                            <a><?php echo e($course->end_date); ?></a>
                                        </td>
                                        <td>
                                            <a>$<?php echo e($course->price->usd); ?></a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="<?php echo e(route('admin.course.destroy',$course)); ?>" method="POST" class="d-flex justify-content-around">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a class="btn btn-primary mx-1" href="<?php echo e(route('admin.course.edit',$course)); ?>">Изменить</a>
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($courses->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\courses\index.blade.php ENDPATH**/ ?>