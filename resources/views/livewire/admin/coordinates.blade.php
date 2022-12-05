<div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">КУРС</label>
                <select class="form-control form-control select2" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $certificate->course->id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ(ТОЛЬКО ДЛЯ СЕМИНАРОВ)</label>
                <input type="number" name="hours_number" value="{{$certificate->hours_number}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ДАТА КУРСА</label>
                <input type="date" name="date" value="{{$certificate->date}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ТИП</label>
                <select class="form-control" id="type" name="type">
                    <option value="1" {{$certificate->type == 1 ? " selected" : ""}}>Вебинар</option>
                    <option value="0" {{$certificate->type == 0 ? " selected" : ""}}>Семинар</option>
                </select>
            </div>

            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-group d-flex justify-content-center">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($image) }}" height="300" alt=""/>
                </div>
                <form wire:submit.prevent="save">
                    <div class="custom-file d-flex">
                        <input type="file" wire:model="file" class="form-control" id="customFile2">
{{--                        <label class="custom-file-label" for="customFile2">Choose file</label>--}}
                        <button type="submit">Upload</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ X</label>
                        <input wire:model="certificate.name_x" type="number" name="name_x" value="{{$certificate->name_x ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ Y</label>
                        <input wire:model="certificate.name_y" type="number" name="name_y" value="{{$certificate->name_y ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ X</label>
                        <input wire:model="certificate.hour_x" type="number" name="hour_x" value="{{$certificate->hour_x ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ Y</label>
                        <input wire:model="certificate.hour_y" type="number" name="hour_y" value="{{$certificate->hour_y ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID X</label>
                        <input wire:model="certificate.id_x" type="number" name="id_x" value="{{$certificate->id_x ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID Y</label>
                        <input wire:model="certificate.id_y" type="number" name="id_y" value="{{$certificate->id_y ?? ""}}" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success">Preview</button>
                </div>
            </div>
        </div>
    </div>
</div>
