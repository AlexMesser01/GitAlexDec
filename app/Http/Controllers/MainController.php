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
       //return "Main::class";
       //$user = DB::table('user')->get(); // Взять все из user
	   //foreach ($user as $value) { dump($value->Username); } 
       
       //$user_where = DB::table("user")->where("id_user", 1)->first(); // Взять первое значение по ид
       //$user_where = DB::table("user")->pluck("id_user"); // Список айдишников
       
       $user_where = DB::table("user")->where("id_user", 2)->first()->Username;
       $all_users = DB::table("user")->get();

       //$tets_sql = DB::table("user")->select("id_user")->get(); // Выборка только нужных полей
       //$where = DB::table("user")->where("id_user", "=", 1)->get(); // Нормальная выборка с условием ;)
       //$where = DB::table("user")->where("id_user", ">=", 1)->get(); // Нормальная выборка с условием ;)
       //$where = DB::table("user")->where("id_user", "!=", 1)->get(); // Нормальная выборка с условием ;)
       //$where = DB::table("user")->where("id_user", "=", 2)->where("Username", "=", "AlexMesser")->get(); // Несколько условий ;)
       $where = DB::table("user")->where("Username", "=", "AlexMesser")->orWhere("id_user", "=", 1)->get(); // Условие ИЛИ
       dump($where);
       return view("main.Main", ["user_data" => $user_where, "all_users" => $all_users]);
    }
}
