@extends("layouts.loginLayout")
@section("Login") 

<div class="d-flex justify-content-center flex-column align-items-center">
  <ul class="nav nav-pills nav-justified mb-3 tab-content w-100 p-3">
    <li role="presentation" class="nav-item"><a class="nav-link active"  aria-controls="pills-login" aria-selected="true" role="tab" data-toggle="tab" href="#reg">Регистрация</a></li>
    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#login">Авторизация</a></li>
  </ul>

  <div class="tab-content w-100 p-3">
      <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="tab-login">
          <form method="POST" action="/authentication/login">
            <div class="text-center mb-3">
              <p>Авторизация:</p>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">Почта:</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" class="form-control" />
              <label class="form-label" for="loginPassword">Пароль:</label>
            </div>

            <!-- 2 column grid layout -->
            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check mb-3 mb-md-0">
                  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck"> Заопмнить меня </label>
                </div>
              </div>

              <div class="col-md-6 d-flex justify-content-center">
                <!-- Simple link -->
                <a href="#!">Забыли пароль?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Войти</button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>Вы не зарегестрированы? <a href="/authentication/login">Регистрация</a></p>
            </div>
          </form>
        </div>


      <div class="tab-pane active" id="reg" role="tabpanel" aria-labelledby="tab-login">
        <form method="post" action="">
          <div class="text-center mb-3">
            <p>Регистрация:</p>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="loginName" name="email" class="form-control" required/>
            <label class="form-label" for="loginName">Почта:</label>
          </div>
          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="loginName" name="email" class="form-control" required/>
            <label class="form-label" for="loginName">Никнейм:</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="loginPassword" class="form-control" required/>
            <label class="form-label" for="loginPassword">Пароль:</label>
          </div>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                <label class="form-check-label" for="loginCheck"> Заопмнить меня </label>
              </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
              <!-- Simple link -->
              <a href="#!">Забыли пароль?</a>
            </div>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Регистрация</button>

          <!-- Register buttons -->
          <div class="text-center">
            <p>Вы не зарегестрированы? <a href="/authentication/login">Регистрация</a></p>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection