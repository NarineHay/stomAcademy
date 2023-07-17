<div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">КУРС</label>
                <select class="form-control select2" name="course_id" wire:model="course_id">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($course->id); ?>">
                            <?php echo e($course->info->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ(ТОЛЬКО ДЛЯ СЕМИНАРОВ)</label>
                <input wire:model="hours_number" type="number" name="hours_number"  value="<?php echo e($certificate->hours_number); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ДАТА КУРСА*</label>
                <input wire:model="date" type="date" name="date" value="<?php echo e($certificate->date); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ТИП</label>
                <select class="form-control" id="type" name="type" wire:model="type">
                    <option value="1" <?php echo e($certificate->type == 1 ? " selected" : ""); ?>>Вебинар</option>
                    <option value="0" <?php echo e($certificate->type == 0 ? " selected" : ""); ?>>Семинар</option>
                </select>
            </div>

            <div class="card-footer mt-3">
                <button type="submit" wire:click="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($image."?".\Illuminate\Support\Str::random(9))); ?>" height="300" alt=""/>
                </div>
                <form wire:submit.prevent="save">
                    <div class="custom-file d-flex">
                        <input type="file" wire:model="file" class="form-control" name="image">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            <form wire:submit.prevent="preview">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Название курса</h4>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="name.x" type="number" value="<?php echo e($certificate->name['x'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Y</label>
                                    <input wire:model="name.y" type="number" value="<?php echo e($certificate->name['y'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="name.color" type="color" value="<?php echo e($certificate->name['color'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="name.size" type="number" value="<?php echo e($certificate->name['size'] ?? 32); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>ID</h4>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="cert_id.x" type="number" value="<?php echo e($certificate->cert_id['x'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Y</label>
                                    <input wire:model="cert_id.y" type="number" value="<?php echo e($certificate->cert_id['y'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="cert_id.color" type="color" value="<?php echo e($certificate->cert_id['color'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="cert_id.size" type="number" value="<?php echo e($certificate->cert_id['size'] ?? 32); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>КОЛИЧЕСТВО ЧАСОВ(ТОЛЬКО ДЛЯ СЕМИНАРОВ)</h4>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="hour.x" type="number" value="<?php echo e($certificate->hour['x'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Y</label>
                                    <input wire:model="hour.y" type="number" value="<?php echo e($certificate->hour['y'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="hour.color" type="color" value="<?php echo e($certificate->hour['color'] ?? ""); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="hour.size" type="number" value="<?php echo e($certificate->hour['size'] ?? 32); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Preview</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\StomAcademy\resources\views\livewire\admin\coordinates.blade.php ENDPATH**/ ?>