<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>Вам выставлен счет по этим продуктам</p>
    @foreach ($data->infos as $item)

        @if($item->type =='course')
            <p>курс:  {{$item->item->info->title}}</p>
        @else
            <p>вебинар: {{$item->item->info->title}}</p>
        @endif
    @endforeach
    <h5>Чтобы получить доступ, пожалуйста оплатите счет</h5>
    <p>{{$item->manager_comment}}</p>
@php
     $url = url(''). "/payment-account/$data->id";
@endphp
    <a href="{{route('payment_account_to_mail', $data->id)}}">Логин</a>

</body>
</html>
