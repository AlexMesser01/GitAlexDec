@extends('layouts.layout')
@section('content')
<head>
    <link href="{{asset('/css/news.css')}}" rel="stylesheet" type="text/css">
</head>
<div class="d-flex p-5" id="news_container">
    <div class="content " class="dropdown" > 
        <div class="accordion container-fluid" >
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Список категорий
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <ul class="nav d-flex flex-column w-55">
                        @foreach($categories_list as $catogory)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/news/page/{{$catogory->category_eng}}">{{$catogory->category}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>

            <div class="news">
                @for($i = 0; $i < count($outputNews);$i++)
                    <a class="text-black text-decoration-none" href="/news/{{$eng_cate[0][$i]}}/{{$outputNews[$i]['id_news']}}">
                <div class="card mb-3" style="max-width: 1024px;">
                    <div class="row g-0">
                        <div class="col-md-15">
                        <div class="card-body">
                        
                            <h5 class="card-title">{{$outputNews[$i]["Tittle"]}}</h5>
                            <p class="card-text">{{$outputNews[$i]["content"]}}</p>
                            <p class="card-text"><small class="text-muted">Автор статьи: {{$outputNews[$i]["author_news"]}} </small></p>
                            <p class="card-text"><small class="text-muted">Новость добавлена: {{$outputNews[$i]["public_date"]}} </small></p>
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                
                @endfor
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
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