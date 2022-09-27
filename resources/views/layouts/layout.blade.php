<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                overflow-x: hidden;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .lk:hover {
                color: #000;
                text-decoration: none;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .nav-link a{
                color: #fff
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .position-ref {
                position: relative;
                height: auto;
                padding: 5%
            }
            .content{
                padding: 5%
            }
            .imgChange{
                background: red;
                width: 256px;
                height: 256px;
                cursor: pointer;
            }
            .fileForm{
                width: 256px;
                height: 256px;
                
            }
            #searchDrop{
                position: absolute;
                top: 75%;
                z-index: 2;
                width: inherit
            }
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Логотип</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Контент
            </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="/store">Магазин</a></li>
            <li><a class="dropdown-item" href="/news/page">Новости</a></li>
            <li><a class="dropdown-item" href="/profile">Профиль</a></li>
            @if(Session::get('userData')->Username == "Admin")
                <li><a class="dropdown-item" href="/admin/panel">Панель администратора</a></li>
            @else @endif
          </ul>
             </li>
            <li class="nav-item">
            <a class="nav-link" href="/about">О разработчике</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/authentication/login">Выйти</a>
            </li>
                </ul>
            <form class="d-flex" method="post" style="width: 300px" role="search">
            @csrf
                <input id="srch_data" class="form-control me-2" type="search" placeholder="Поиск новостей" aria-label="Search">
                <button id="srch_btn" class="btn btn-outline-success w-25" type="submit">Поиск</button>
                <ol id="searchDrop" class="list-group list-group-numbered">
                </ol>
            </form>
                
        </div>
                
        </div>
        <a class="navbar-brand d-flex align-items-center justify-content-bg-around p-1" href="/profile">
      <img src="{{ asset(Session::get('userData')->Avatar) }}" alt="Logo" width="64"  height="64" id="" class="rounded-4 d-inline-block align-text-top m-2 ">
            {{Session::get('userData')->Username}}
        </a>
    </nav>
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
            @yield('content') <!-- Подключаем контент для шаблона -->
            <!-- Footer -->
            <footer class="bg-dark text-center text-white h-50 position-relative" style="max-height: 30%">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                ></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-github"></i
                ></a>
                </section>
                <!-- Section: Social media -->

                <!-- Section: Form -->
                <!-- Section: Form -->

                <!-- Section: Text -->
                <section class="mb-4 m-4">
                <p>Данный сайт является тестовой сборкой на основе фреймворка Laravel </p>
                </section>
                <!-- Section: Text -->

                <!-- Section: Links -->
                <!--Grid row-->
                
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center position-absolute bottom-0 w-100 end-0 p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-white" href="https://github.com/AlexMesser01">AlexDev)</a>
            </div>
            <!-- Copyright -->
            </footer>
            <!-- Footer -->

            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
            <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
            <script type="text/javascript" src="{{asset('/js/search.js')}}"></script>
        </body>
    
</html>
