

<?php $__env->startSection('title', 'Webinar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать</h1>
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
            <form action="<?php echo e(route('admin.webinar.update',$webinar->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ЛЕКТОР</label>
                        <select class="form-control form-control" name="user_id">
                            <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $webinar->user_id ? 'selected' : ''); ?>>
                                    <?php echo e($user->userinfo->fname); ?> <?php echo e($user->userinfo->lname); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ВЕБИНАРА*</label>
                        <input type="datetime-local" value="<?php echo e($webinar->start_date); ?>" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО МИНУТ*</label>
                        <input type="number" value="<?php echo e($webinar->duration); ?>" name="duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНА</label>
                        <select class="form-control form-control select2" name="price_id">
                            <?php $__currentLoopData = $data['prices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($price->id); ?>" <?php echo e($price->id == $webinar->price_id ? 'selected' : ''); ?>>
                                    <?php echo e($price->name); ?> - $<?php echo e($price->usd); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНА 2</label>
                        <select class="form-control form-control select2" name="price_2_id">
                            <option value="0">---</option>
                            <?php $__currentLoopData = $data['prices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($price->id); ?>" <?php echo e($price->id == $webinar->price_2_id ? 'selected' : ''); ?>>
                                    <?php echo e($price->name); ?> - $<?php echo e($price->usd); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label><br>
                        <select class="form-control select2" multiple name="direction_ids[]">
                            <?php $__currentLoopData = $data['directions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($direction->id); ?>" <?php echo e($webinar->directions->contains($direction) ? 'selected' : ''); ?>>
                                    <?php echo e($direction->title); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ</label>
                        <div class="form-group">
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($webinar->image)); ?>" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС</label>
                        <select class="form-control select2" id="type" name="status">
                            <option value="1" <?php echo e($webinar->status == 1 ? " selected" : ""); ?>>Активен</option>
                            <option value="0" <?php echo e($webinar->status == 0 ? " selected" : ""); ?>>Отключен</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" value="<?php echo e($webinar->url_to_page); ?>" name="url_to_page" class="form-control">
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
                                <?php $__currentLoopData = $webinar->infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($k == 0): ?> show active <?php endif; ?>" id="lg_tab_<?php echo e($info->lg_id); ?>" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" <?php if($info->enabled): echo 'checked'; endif; ?> value="true" name="enabled[<?php echo e($info->lg_id); ?>]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ ВЕБИНАРА*</label>
                                            <input type="text" value="<?php echo e($info->title); ?>" name="title[<?php echo e($info->lg_id); ?>]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ ВЕБИНАРА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="description[<?php echo e($info->lg_id); ?>]"><?php echo e($info->description); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ПРОГРАММА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="program[<?php echo e($info->lg_id); ?>]"><?php echo e($info->program); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                                            <input type="text" value="<?php echo e($info->video_invitation); ?>" name="video_invitation[<?php echo e($info->lg_id); ?>]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО</label>
                                            <input type="text" value="<?php echo e($info->video); ?>" name="video[<?php echo e($info->lg_id); ?>]" class="form-control">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\admin\webinars\edit.blade.php ENDPATH**/ ?>