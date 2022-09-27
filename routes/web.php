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
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RequestController;

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

Route::match(['get', 'post'], '/', [MainController::class, "index"]);

Route::match(['get', 'post'], '/request', [RequestController::class, "searchData"]);

Route::match(['get', 'post'], "/news/page/{page_num?}/{category?}/{remote?}", [NewsController::class, "newsList"])->where('page_num', "\d+")->name('newsPage');
Route::match(['get', 'post'], "/news/page/{category?}/{page_num?}/{remote?}", [NewsController::class, "CategoryNews"])->where('page_num', "\d+")->name('newsPage');
Route::match(['get', 'post'], "/news/{category}/{id_news}", [NewsController::class, "show"])->where('category', "[^page]+")->where('id_news', "\d+")->name('newsByCat');


//Route::get('/store', [StoreController::class, 'index'])->name('storeList');
Route::match(['get', 'post'], "/store/page/{page_num?}/{remote?}", [StoreController::class, "ProductList"])->where('page_num', "\d+")->name('productList');
Route::match(['get', 'post'], "/store/page/{category}/{page_num?}/{remote?}", [StoreController::class, "Category"])->where('page_num', "\d+")->name('newsPage');
Route::match(['get', 'post'], "/store/{category}/{id_product}", [StoreController::class, "ShowProduct"])->where('category', "[^page]+")->where('id_news', "\d+")->name('newsByCat');


Route::get('/test', [TestController::class, 'testing']);


Route::match(['get', 'post'], "/profile/show/{id_user?}", [ProfileController::class, "show"])->where('id_user', "\d+");
Route::match(['get', 'post'], "/profile", [ProfileController::class, "user"]);

Route::match(['get', 'post'], "/about/", [AboutController::class, "Me"]);

Route::match(['get', 'post'], "/authentication/login", [LoginController::class, "login"]);


Route::match(['get', 'post'], "/admin/panel", [AdminController::class, "panel"]);


Route::match(['get', 'post'], "/authentication/signup", [SignUpController::class, "signup"]);


//Route::get("/authentication/signup", [SignUpController::class, "signup"]);

// Тестовые пути для обучения
Route::get('/user/{id}/{name}', function($id, $name){

    return "Профиль пользователя с ником :".$name. " и модификация - ".$id;
})->where("id", "\d+")->where("name", "[a-z-]{2,}");
// where - обычное условие, whereAlpha() - только буквы, whereNumber - только цифры, whereAlphaNumeric() - числа с буквами.
