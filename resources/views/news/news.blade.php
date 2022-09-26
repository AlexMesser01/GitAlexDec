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
                <div>
                        <div>
                            <h1 class=" m-b-md">{{$news->Tittle}}</h1>
                            <h2>Категория: {{$news->category_news}}</h2>
                            <div>Дата публикации: {{$news->public_date}}</div><div>Автор: {{$news->author_news}} </div>
                            <div>
                                {{$news->content}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection