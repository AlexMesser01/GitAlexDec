@extends('layouts.layout')
@section('content')
        <section class="d-flex justify-content-center h-100 bg-light w-100 align-items-center p-4" style="">
            <div class=" w-75 h-100 d-flex justify-content-around border">
                <div style="--bs-bg-opacity: .5;" class="bg-success p-2 w-25 text-white d-flex justify-content-center h-100">
                    <div class="d-flex justify-content-center h-50">
                        <div class="bg-transparent" style="--bs-bg-opacity: .5;" class="card bg-success  d-flex justify-content-center align-items-center" style="width: 18rem;">
                        <img class="rounded-circle" src='{{ asset(Session::get("userData")->Avatar) }}' width="256" height="256"  alt="...">
                        <div class="card-body d-flex justify-content-start flex-column align-items-center">
                            <h5 class="card-title">{{Session::get('userData')->Username}}</h5>
                            <p class="card-text">{{Session::get('userData')->Email}}</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="text-bg-light w-75 d-flex justify-content-center bg-white h-100 p-4">
                    <div class="w-100 text-left">
                        Информация
                        <hr class="w-100">
                        <div>
                        <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Город</div>
                            <div>{{$userData->city}}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Номер телефона</div>
                            <div>{{$userData->phone_number}}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Пол</div>
                            <div>{{$userData->gender}}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Дата рождения</div>
                            <div>{{$userData->birthday}}</div>
                        </li>
                        <ol>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
@endsection