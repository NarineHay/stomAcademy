@if($password)
    <p><b>Логин: </b></p> {{$email}}
    <p><b>Пароль: </b></p> {{$password}}
@endif
{{-- <p>-- {{ $name }} -- </p> --}}
    @if($type =='course')
        <p>Вам открыт доступ к просмотру курса {{$course->info->title}}</p>
    @elseif($type =='webinar')
        <p>Вам открыт доступ к просмотру вебинара {{$webinar->info->title}}</p>
    @endif

    @if($access_time)
        <p>Доступность {{$duration}} дней</p>
    @else
        <p>У вас есть постоянный доступ</p>
    @endif

    <a href="{{route("login")}}">Логин</a>

