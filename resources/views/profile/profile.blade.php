@extends('layouts.layout')
@section('content')
        <section class="d-flex justify-content-center h-100 bg-light w-100 align-items-center p-4" style="">
            <div class=" w-75 h-100 d-flex justify-content-around border">
                <div style="--bs-bg-opacity: .5;" class="bg-success p-2 w-25 text-white d-flex justify-content-center h-100">
                    <div class="d-flex justify-content-center h-50">
                        <div class="bg-transparent" style="--bs-bg-opacity: .5;" class="card bg-success  d-flex justify-content-center align-items-center" style="width: 18rem;">
                        <form class="fileForm" method="post" enctype="multipart/form-data" action="/profile" class="h-50 position-relative">
                            @csrf
                            <input class="imgChange opacity-0 d-flex align-items-stretch position-absolute rounded-circle" type="file" name="updAvatar">
                            <img class="img_edit rounded-circle" src='{{ asset(Session::get("userData")->Avatar) }}' width="256" height="256"  alt="...">
                        </form>
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
                        <div class="d-flex flex-row justify-content-around w-100 h-100 ">
                            <div class="flex-column  align-items-center d-flex justify-content-start title m-b-md fs-2 text m-2 w-100 "> Изменить данные пользователя
                                <form action="/profile" method="post">
                                <div class="mb-3">
                                @csrf
                                    <label for="exampleFormControlInput1" class="form-label">Город</label>
                                    <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="Город">
                                    <label for="exampleFormControlInput1" class="form-label">Номер телефона:   </label>
                                    <input type="tel" maxlength="11" name="phone" class="form-control" id="exampleFormControlInput2" placeholder="Номер телефона">
                                    <label for="exampleFormControlInput1" class="form-label">Пол:   </label>
                                    <select name="gender" id="" class="m-4">
                                            <option value="Мужской">Мужской</option>
                                            <option value="Женский">Женский</option>
                                    </select></br>
                                    <label for="exampleFormControlTextarea1" name="content" class="form-label">Дата рождения:</label>
                                    <input type="date" name="birthday" class="form-control" id="exampleFormControlInput2" placeholder="Дата рождения">
                                    </div>
                                    <div class="mb-3">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="change_info" value="Сохранить изменения" class="btn btn-primary mb-3 w-100">Сохранить изменения</button>
                                </div>
                                </form>
                            </div>
                            <div class="flex-column align-items-center d-flex justify-content-start title m-b-md fs-2 text m-2 w-100 "> Изменить данные аккаунта
                                <form action="/profile" method="post">
                                <div class="mb-3">
                                @csrf
                                    <label for="exampleFormControlInput1" class="form-label">Имя пользователя:</label>
                                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Имя пользователя">
                                    <label for="exampleFormControlInput1" class="form-label">Почта:   </label>
                                    <input type="email"  name="email" class="form-control" id="exampleFormControlInput2" placeholder="Почта">
                                    <label for="exampleFormControlInput1" class="form-label">Пароль:   </label>
                                    <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="Пароль">
                                    <div class="m-3 text-danger fs-6 text">
                                    @if (!empty($message = Session::get('hasUserData')))
                                        {{$message}}
                                    @else @endif
                                    </div>
                                <div class="col-auto">
                                    <button type="submit" name="change_info" value="Сохранить пользовательские данные" class="btn btn-primary mb-3 w-100">Сохранить изменения</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <script>
                var input = document.querySelector("input[type='file']");
                    input.onchange = function () {
                    this.form.submit();
                }
            </script>   
@endsection