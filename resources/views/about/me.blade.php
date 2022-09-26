@extends("layouts.layout")
@section("content")
<div class="h-100 d-flex justify-content-center align-items-center">
    <div class="card mb-3 h-75 w-90 d-flex justify-content-center align-items-center" style="max-width: 90%">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="{{asset('img/me.jpeg')}}" class="img-fluid rounded-5 p-3" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body fs-4 text">
            <h5 class="title">О проекте</h5>
            <p class="card-text">Здравствуй уважаемый посетитель, кто бы ты ни был). Предлагаю ознакомиться с этим чудесным веб-приложением
            на базе фреймворка Laravel, который в свою очередь основывается на базе шаблона проектирования MVC. Несмотря на то, что разработка дается легко, сделать такое большое приложение одному - непростая задача. 
            В данный момент в разработке находяться:</p>
            <ul>
                <li>Страница просмотра товаров</li>
                <li>Функция поиска новостей</li>
            </ul>
            <p class="card-text"><small class="text-muted">Немного о себе: Я начинающий веб-разработчик, ввиду отсутствия опыта работы, могу предложить
                 к просмотру пэт проекты, которые разрабатывал на дипломный проект и в процессе обучения. В данный момент нахожусь в поиске работы
                  для начала карьерного пути в IT. Ссылка на репозиторий GitHub: https://github.com/AlexMesser01 </small></p>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection