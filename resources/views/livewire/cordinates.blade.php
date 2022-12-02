<div>
    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ X</label>
        <input wire:model="certificate.name_x" type="number" name="name_x" value="{{$certificate->name_x ?? ""}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ Y</label>
        <input wire:model="certificate.name_y" type="number" name="name_y" value="{{$certificate->name_y ?? ""}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ X</label>
        <input wire:model="certificate.hour_x" type="number" name="hour_x" value="{{$certificate->hour_x ?? ""}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ Y</label>
        <input wire:model="certificate.hour_y" type="number" name="hour_y" value="{{$certificate->hour_y ?? ""}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ID X</label>
        <input wire:model="certificate.id_x" type="number" name="id_x" value="{{$certificate->id_x ?? ""}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">КООРДИНАТА ID Y</label>
        <input wire:model="certificate.id_y" type="number" name="id_y" value="{{$certificate->id_y ?? ""}}" class="form-control">
    </div>
</div>
