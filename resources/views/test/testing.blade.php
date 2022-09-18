@extends('layouts.layout')
@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
            {{--Перебор массива--}}
                <div class="title m-b-md">Тестовая страница</div>
                @foreach    ($array as $key => $value)
                    <div>Ключи значений: {{$key}}</div>
                    <div>Значение: {{$value}}</div>
                    <div>Количество итераций: {{$loop->count}}</div>
                    <div>Индекс иетрации: {{$loop->index}}</div>
                    @if (count($array) > 0) 
                        <div>{{array_sum($array)}}</div>
                        @continue
                    @else
                        <div>Нуль</div>
                    @endif
                    @break
                @endforeach
                <div>Тесто блока PHP-кода: </div>
                @php 
                    echo "Код выведен, через директиву ECHO";
                @endphp
                <div>Тест вывода значения массива - {{$array["asoc1"]}}</div>
                <div>Тест вывода значения строки - {{empty($string) ? 'Москва' : $string}}</div>
                <div>Тесто вывода значения цифры - {{$integer}}</div>
                <div>Проверка тернарного оператора - {{$array["asoc2"] = 0 ? 2 : 1}}</div>
                {{--Условия--}}
                @if ($auth)
                    <div>Вы авторизованы</div>
                @else
                    <div>Вы не авторизованы</div>
                @endif
                <div>Подключаем ссылки: </div>
            </div>
        </div>
@endsection