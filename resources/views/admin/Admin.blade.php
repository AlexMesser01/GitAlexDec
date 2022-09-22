@extends('layouts.layout')
@section('content')
        <div class="flex-center position-ref">
            <section class="w-100 d-flex justify-content-center flex-column align-items-center">

            <div class="d-flex mb-3 justify-content-center title m-b-md flex-column align-items-center fs-2 text w-100 ">Управление новостными данными: 

                <div class="d-flex justify-content-center w-100 align-items-center">
            <div class="flex-column align-items-center d-flex justify-content-center title m-b-md fs-2 text m-2 r w-100 ">Список новостей: 
                <ul>
                @foreach($news as $item)
                            <li>{{$item->Tittle}}</li>
                @endforeach
                </ul>
            </div>

            <div class="flex-column align-items-center d-flex justify-content-center title m-b-md fs-2 text m-2 w-100 ">Добавить новость: 
                <form action="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                    <input type="email" name="tittle" class="form-control" id="exampleFormControlInput1" placeholder="Новостной заголовок">
                    <label for="exampleFormControlInput1" class="form-label">Дата публикации:   </label>
                    <input type="date" name="public_date" class="form-control" id="exampleFormControlInput2" placeholder="Новостной заголовок">
                    <label for="exampleFormControlInput1" class="form-label">Категория:   </label>
                    <select name="category" id="">
                        @foreach($category  as $item)
                            <option value="{{$item}}">{{$item->category}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" name="content" class="form-label">Контент</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" name="add_news" class="btn btn-primary mb-3">Добавить новость</button>
                </div>
                </form>
            </div>
                </div>
            
            </div>
            
            <div class=" d-flex mb-3 justify-content-center title m-b-md flex-column align-items-center fs-2 text w-100 ">Управление данными продукции: 
            <div class="d-flex justify-content-center w-100 align-items-center">
            <div class="flex-column align-items-center d-flex justify-content-center title m-b-md fs-2 text m-2 r w-100  ">Список подписок:
                    <ul>
                        @foreach($products as $item)
                                <li>{{$item->product_name}}</li>
                        @endforeach
                    </ul>
            </div>
            <div class=" flex-column align-items-center d-flex justify-content-center title m-b-md fs-2 text m-2 w-100  ">Добавить подписку: 
                <form action="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Название подписки</label>
                    <input type="email" name="product_name" class="form-control" id="exampleFormControlInput1" placeholder="Название">
                    <label for="exampleFormControlInput1" class="form-label">Описание подписки:   </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                    <label for="exampleFormControlInput1" class="form-label">Стоимость:   </label>
                    <input type="number" name="cost" class="form-control" id="exampleFormControlInput2" placeholder="Стоимость">
                    
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" name="content" class="form-label">Доступно:</label>
                    <input type="number" name="descript" class="form-control" id="exampleFormControlInput2" placeholder="Описание">
                    <label for="exampleFormControlTextarea1" name="content" class="form-label">Изображение:</label>
                    <input type="file" name="descript" class="form-control" id="exampleFormControlInput2" placeholder="Описание">
                </div>
                <div class="col-auto">
                    <button type="submit" name="add_subscribe" class="btn btn-primary mb-3">Добавить подписку</button>
                </div>
                </form>
            </div>
                </div>

            </div>
                <div class="content  w-100 d-flex justify-content-center">
                    <div class= "d-flex justify-content-center align-items-center flex-column title m-b-md fs-4 text bg-dark w-100">Пользователи:
                    <ul class="d-flex flex-wrap">
                        @foreach($users as $item)
                        <div class="d-flex align-items-center justify-content-between ms-auto p-2 w-25">
                            <a class="navbar-brand " href="#">
                            <img src="{{ asset($item->Avatar) }}" alt="Logo" width="64" height="64" class="d-inline-block  m-2">
                            <span>{{$item->Username}}</span>
                            
                            </a>
                            <span class="float-end p-3">X</span>
                        </div>
                        @endforeach
                    </ul>
                    </div>
                </div> 
            </div>
            
            </section>
        </div>
@endsection