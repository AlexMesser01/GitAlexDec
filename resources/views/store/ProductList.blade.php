@extends('layouts.layout')
@section('content')
        <div class="d-flex p-5">
                <div class="content w-25"> 
                    <ul class="nav d-flex flex-column w-55">
                        <li class="nav-item ">
                            <a class="nav-link text-black" disabled>Категории новостей: </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/news/page/">Все новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/news/page/Культура">Культура</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/page/Политика">Политика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/page/Спорт">Спорт</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/page/Наука и техника">Наука и техника</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/page/Экология">Экология</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/page/Экономика">Экономика</a>
                        </li>
                    </ul>
                </div>

            <div class="news">
                @foreach($outputProduct as $product)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{asset($product->img)}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">Доступно: {{$product->fdfdf}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="/news/page/{{$current_page}}/prev">Previous</a></li>
                        @for($i=0;$i<$pages;$i++)
                        
                        <li class="page-item"><a class="page-link" href="/news/page/{{$i+1}}">{{$i+1}}</a></li>
                        
                        @endfor
                    <li class="page-item"><a class="page-link" href="/news/page/{{$current_page}}/next">Next</a></li>
                    </ul>
                </nav>
            </div>
            
        </div>
@endsection