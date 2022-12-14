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
                <form action="/admin/panel" method="post">
                <div class="mb-3">
                    @csrf
                    <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                    <input type="text" name="tittle" class="form-control" id="exampleFormControlInput1" placeholder="Новостной заголовок" required>
                    <label for="exampleFormControlInput1" class="form-label">Дата публикации:   </label>
                    <input type="date" name="public_date" class="form-control" id="exampleFormControlInput2" placeholder="Новостной заголовок" required>
                    <label for="exampleFormControlInput1" class="form-label">Категория:   </label>
                    <select name="category" id="">
                        @foreach($category  as $item)
                            <option value="{{$item->category}}">{{$item->category}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" name="content" class="form-label">Контент</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" required ></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" name="add" value="new_news" class="btn btn-primary mb-3">Добавить новость</button>
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
                <form action="/admin/panel" enctype="multipart/form-data" method="post">
                <div class="mb-3">
                @csrf
                    <label for="exampleFormControlInput1" class="form-label">Название подписки</label>
                    <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1" placeholder="Название" required>
                    <label for="exampleFormControlInput1" class="form-label">Описание подписки:   </label>
                    <textarea class="form-control" name="descript" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    <label for="exampleFormControlInput1" class="form-label">Стоимость:   </label>
                    <input type="number" name="cost" class="form-control" id="exampleFormControlInput2" placeholder="Стоимость" required>
                    
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" name="avaliable" class="form-label">Доступно:</label>
                    <input type="number" name="avaliable" class="form-control" id="exampleFormControlInput2" placeholder="Описание" required>
                    <label for="exampleFormControlTextarea1" name="ProdImg" class="form-label">Изображение:</label>
                    <input type="file" name="ProdImg" class="form-control" id="exampleFormControlInput2" placeholder="Описание" required>
                </div>
                <div class="col-auto">
                    <button type="submit" name="add" value="new_sub" class="btn btn-primary mb-3">Добавить подписку</button>
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
                            <form action="/admin/panel" method="post">
                            @csrf
                            <button type="submit" name="del_user" class="bg-dark border-0 text-white float-end p-3" value="{{$item->Username}}" class="btn btn-primary mb-3">X</button>
                            </form>
                        </div>
                        @endforeach
                    </ul>
                    </div>
                </div> 
            </div>
            
            </section>
        </div>
        
@endsection