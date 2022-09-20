<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index()
    {
        DB::enableQueryLog();
        //$user = DB::table('user')->get(); // Взять все из user
        //foreach ($user as $value) { dump($value->Username); }   
        //$user_where = DB::table("user")->where("id_user", 1)->first();                                        // Взять первое значение по ид
        //$user_where = DB::table("user")->where("id_user", 2)->first()->Username;                              // где id_user == 2
        //$like_query = DB::table("user")->where("Username", "like", "Alex%")->get();                           // SQL оператор LIKE
        //$tets_sql = DB::table("user")->select("id_user")->get();                                              // Выборка только нужных полей
        //$where = DB::table("user")->where("id_user", "=", 1)->get();                                          // Нормальная выборка с условием ;)
        //$where = DB::table("user")->where("id_user", ">=", 1)->get();                                         // Нормальная выборка с условием ;)
        //$where = DB::table("user")->where("id_user", "!=", 1)->get();                                         // Нормальная выборка с условием ;)
        //$where = DB::table("user")->where("id_user", "=", 2)->where("Username", "=", "AlexMesser")->get();    // Несколько условий ;)
        //$where = DB::table("user")->where("Username", "=", "AlexMesser")->orWhere("id_user", "=", 1)->get();  // Условие ИЛИ
        //$dynamicSelect = DB::table("user")->whereIdUser(1)->get();                                            // Кастомные методы выборки данных !!!!!!!!!!!11
        //$orderBySelect = DB::table("user")->orderBy("Username")->get();                                       // Сортировка через группировку

        /*$insert =   DB::table("user")->insert(array(
            "email" => "newUser@gmail.com",
            "Username" => "AlexAnotherUser",
            "password" => password_hash('secret', PASSWORD_DEFAULT),
            "Status" => 0
        ));*/ // Вставка в таблицу

        /*$updCol = DB::table("user")->where("id_user", 3)->update(array(
            "Username" => "AlexAnotherUser2"
        ));*/ // Обновление столбца с условием

        //$delCol = DB::table("user")->where("id_user", 7)->delete(); // Удаление столбца 

        $user_where = DB::table("user")->pluck("id_user"); // Список айдишников
        $all_users = DB::table("user")->get(); // Взять все из user
        return view("main.Main", ["user_data" => $user_where, "all_users" => $all_users]);
    }
}
