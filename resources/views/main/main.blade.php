@extends('layouts.layout')
@section('content')
        <div class="flex-center position-ref">
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


            <section>
                <div>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="{{ asset('img/HTML.png') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="{{ asset('img/CSS.png') }}" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="{{ asset('img/js.png') }}" class="d-block" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                </div>
            
            
            <div class="content">
                <div class="title m-b-md fs-4 text">Последние новости:</div>
                <div>Пользовательские данные: {{$user_data}}</div>
                <div>Все пользователи:
                @foreach ($all_users as $value)  
                    <div>{{$value->Username}}</div>
                @endforeach
                </div> 
                
            </div>
            </section>
        </div>
@endsection