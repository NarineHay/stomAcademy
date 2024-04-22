<div>
    <div class="row">
        <div class="col-6 certificate_form">

            <div class="form-group">
                <div>
                    @if ($certificate->course_id != null)
                        <label for="course" style="margin-right: 10px">
                            <input type="radio" id="course" name="type" value="course" checked>
                        Курс</label>

                    @endif
                    @if ($certificate->webinar_id != null)
                        <label for="webinar">
                            <input type="radio" id="webinar" name="type" value="webinar" checked>
                            Вебинар</label>
                    @endif
                </div>
            </div>

            <div class="form-group @if($certificate->course_id == null) d-none @endif courseDiv" id="">
                <label for="exampleInputEmail1">Курс</label>
                <select class="form-control select2" name="course_id" disabled>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $certificate->course_id ? 'selected' : '' }}>
                            {{ $course->info->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group @if($certificate->webinar_id == null) d-none @endif webinarDiv">
                <label for="exampleInputEmail1">Вебинар</label>
                <select class="form-control select2" name="webinar_id" disabled>
                    @foreach($webinars as $webinar)
                        <option value="{{ $webinar->id }}" {{ $webinar->id == $certificate->webinar_id ? 'selected' : '' }}>
                            {{ $webinar->info->title }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ</label>
                <input wire:model="hours_number" type="number" name="hours_number"
                       value="{{$certificate->hours_number}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">ДАТА КУРСА*</label>
                <input wire:model="date" type="date" name="date" value="{{$certificate->date}}" class="form-control">
            </div>


            <div class="card-footer mt-3">
                <button type="submit" wire:click="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="form-group d-flex justify-content-center">
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($image."?".\Illuminate\Support\Str::random(9)) }}"
                        height="300" style="max-width: 100%;object-fit: cover;" alt=""/>
                </div>
            </div>
            <form wire:submit.prevent="preview">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>ФИО</h4>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="name_.x" type="text" value="{{$certificate->name_['x'] ?? ""}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-0">
                                    <label class="small">Y</label>
                                    <input wire:model="name_.y" type="text" value="{{$certificate->name_['y'] ?? ""}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="name_.color" type="color"
                                           value="{{$certificate->name_['color'] ?? ""}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small">Font</label>
                                    <select wire:model="name_.font" class="form-control">
                                        @foreach($fonts as $font)
                                            @if(isset($certificate->name_['font']) && $certificate->name_['font'])
                                                <option @if($certificate->name_['font'] == $font['path']) selected
                                                        @endif value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @else
                                                <option value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="name_.size" type="number"
                                           value="{{$certificate->name_['size'] ?? 32}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Дата</h4>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="date_.x" type="number"
                                           value="{{$certificate->date_['x'] ?? ""}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Y</label>
                                    <input wire:model="date_.y" type="number"
                                           value="{{$certificate->date_['y'] ?? ""}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="date_.color" type="color"
                                           value="{{$certificate->date_['color'] ?? ""}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small">Font</label>
                                    <select wire:model="date_.font" class="form-control">
                                        @foreach($fonts as $font)
                                            @if(isset($certificate->date_['font']) && $certificate->date_['font'])
                                                <option @if($certificate->date_['font'] == $font['path']) selected
                                                        @endif value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @else
                                                <option value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="date_.size" type="number"
                                           value="{{$certificate->date_['size'] ?? 32}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>КОЛИЧЕСТВО ЧАСОВ</h4>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">X</label>
                                    <input wire:model="hour_.x" type="number" value="{{$certificate->hour_['x'] ?? ""}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Y</label>
                                    <input wire:model="hour_.y" type="number" value="{{$certificate->hour_['y'] ?? ""}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Color</label>
                                    <input wire:model="hour_.color" type="color"
                                           value="{{$certificate->hour_['color'] ?? ""}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small">Font</label>
                                    <select wire:model="hour_.font" class="form-control">
                                        @foreach($fonts as $font)
                                            @if(isset($certificate->hour_['font']) && $certificate->hour_['font'])
                                                <option @if($certificate->hour_['font'] == $font['path']) selected
                                                        @endif value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @else
                                                <option value="{{ $font['path'] }}">{{ $font['name'] }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="small">Size</label>
                                    <input wire:model="hour_.size" type="number"
                                           value="{{$certificate->hour_['size'] ?? 32}}" class="form-control">
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
