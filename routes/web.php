<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name("mainpage");

Route::get('/news/{category?}', [NewsController::class, 'newsList'])->where('page_num', "\w+")->name('pages');

Route::match(['get', 'post'], "/news/{category}/{id_news?}", [NewsController::class, "show"])->where('id_cat', "[a-z-]+")->where('id_news', "\d+")->name('newsByCat');

Route::get('/store', [StoreController::class, 'index'])->name('storeList');

Route::get('/profile/user/{username_id}', [ProfileController::class, 'user'])->name('profle');

Route::get('/test', [TestController::class, 'testing']);

Route::match(['get', 'post'], "/authentication/login", [LoginController::class, "login"]);

Route::match(['get', 'post'], "/admin/panel", [AdminController::class, "panel"]);

Route::match(['get', 'post'], "/authentication/signup", [SignUpController::class, "signup"]);

//Route::get("/authentication/signup", [SignUpController::class, "signup"]);

// Тестовые пути для обучения
Route::get('/user/{id}/{name}', function($id, $name){

    return "Профиль пользователя с ником :".$name. " и модификация - ".$id;
})->where("id", "\d+")->where("name", "[a-z-]{2,}");
// where - обычное условие, whereAlpha() - только буквы, whereNumber - только цифры, whereAlphaNumeric() - числа с буквами.
