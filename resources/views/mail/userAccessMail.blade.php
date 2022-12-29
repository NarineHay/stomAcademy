@if($data['password'])
    <p><b>Логин: </b></p> {{$data['email']}}
    <p><b>Пароль: </b></p> {{$data['password']}}
@endif
<p>-- {{ $data['name'] }} -- </p>
    @if($data['type'] =='course')
        <p>Вам открыт доступ к просмотру курса {{$data['course']->info->title}}</p>
    @elseif($data['type'] =='webinar')
        <p>Вам открыт доступ к просмотру вебинара {{$data['webinar']->info->title}}</p>
    @endif

    @if($data['access_time'])
        <p>Доступность {{$data['duration']}} дней</p>
    @else
        <p>У вас есть постоянный доступ</p>
    @endif

    <a href="{{route("login")}}">Логин</a>

