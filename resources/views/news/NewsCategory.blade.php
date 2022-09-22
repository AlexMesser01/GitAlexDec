@extends('layouts.layout')
@section('content')
        <div class="d-flex p-5">
                <div class="content w-25"> 
                    <ul class="nav d-flex flex-column w-55">
                        <li class="nav-item ">
                            <a class="nav-link text-black" disabled>Категории новостей: </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/news/">Все новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/news/Культура">Культура</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/Политика">Политика</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/Спорт">Спорт</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/Наука и техника">Наука и техника</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/Экология">Экология</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/news/Экономика">Экономика</a>
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
            </div>
        </div>
@endsection