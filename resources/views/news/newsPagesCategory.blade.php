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
                @foreach($outputNews as $news)
                <a class="text-black text-decoration-none" href="/news/{{$news->category_news}}/{{$news->id_news}}">
                <div class="card mb-3" style="max-width: 1024px;">
                    <div class="row g-0">
                        <div class="col-md-15">
                        <div class="card-body">
                            <h5 class="card-title">{{$news->Tittle}}</h5>
                            <p class="card-text">{{$news->content}}</p>
                            <p class="card-text"><small class="text-muted">Автор статьи: {{$news->author_news}} </small></p>
                            <p class="card-text"><small class="text-muted">Новость добавлена: {{$news->public_date}} </small></p>
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="/news/page/{{$category}}/{{$current_page}}/prev">Previous</a></li>
                        @for($i=0;$i<$pages;$i++)
                        
                        <li class="page-item"><a class="page-link" href="/news/page/{{$category}}/{{$i+1}}">{{$i+1}}</a></li>
                        
                        @endfor
                        <li class="page-item"><a class="page-link" href="/news/page/{{$category}}/{{$current_page}}/next">Next</a></li>
                    </ul>
                </nav>
            </div>
            
        </div>
@endsection