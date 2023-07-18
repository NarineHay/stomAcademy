

<?php $__env->startSection('title', 'Lector'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование лектора</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <section class="content">
        <?php if(session('success')): ?>
            <div class="alert alert-success mb-1 mt-1">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card card-primary">
            <form action="<?php echo e(route('admin.lectors.update',$user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ*</label>
                        <input type="text" value="<?php echo e($user->userinfo->fname); ?>" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ФАМИЛИЯ*</label>
                        <input type="text" value="<?php echo e($user->userinfo->lname); ?>" name="lname" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Специализация</label>
                        <select class="form-control select2" multiple name="direction_ids[]">
                            <?php $__currentLoopData = $directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($direction->id); ?>" <?php echo e($lector_directions->contains($direction->id) ? 'selected' : ''); ?>>
                                    <?php echo e($direction->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Аватарка лектора</label>
                        <div class="form-group">
                                <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->userinfo->image)); ?>" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Фото лектора</label>
                        <div class="form-group">
                                <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->lector->photo)); ?>" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="photo" class="form-control" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Страна лектора</label>
                        <select class="form-control select2" name="country_id">
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>" <?php echo e($country->id == $user->userinfo->country_id ? 'selected' : ''); ?>>
                                    <?php echo e($country->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">% От продаж*</label>
                        <input type="number" value="<?php echo e($user->lector->per_of_sales); ?>" name="per_of_sales" class="form-control">
                    </div>

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <?php $__currentLoopData = \App\Models\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $lg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($k == 0): ?> active <?php endif; ?>" data-toggle="pill" href="#lg_tab_<?php echo e($lg->id); ?>" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><?php echo e($lg->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <?php $__currentLoopData = $user->lector->infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($k == 0): ?> show active <?php endif; ?>" id="lg_tab_<?php echo e($info->lg_id); ?>" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" <?php if($info->enabled): echo 'checked'; endif; ?> value="true" name="enabled[<?php echo e($info->lg_id); ?>]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Биография*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="biography[<?php echo e($info->lg_id); ?>]"><?php echo e($info->biography); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views/admin/lectors/edit.blade.php ENDPATH**/ ?>