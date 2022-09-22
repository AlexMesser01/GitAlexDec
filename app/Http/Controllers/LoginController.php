<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function login(Request $request)
		{
			//return "Hi, user your id is - ".$username_id
            /*$user = User::all();
            foreach ($user as  $user_one) {
                dump($user_one->Username);
            }*/ // Выборка записей с помощью модели, также действуют условия из Query Builder

            // Создание записей 
            /*$newUser = new User; // 1. Создание новой модели
            $newUser->Username = "AlexBot1";
            $newUser->Email = Str::random(10)."@gmail.com";
            $newUser->Password = password_hash("secret", PASSWORD_DEFAULT);
            $newUser->Status = 0;
            $newUser->save();*/ // Добавление новой записи в БД

            //$getuser = User::where("id_user", "=", 2)->get();
            //$getuser->username = "newpassword10022001";
            //$getuser->save();
                //$request->session()->put("isAuth", 1);
                //$request->session()->put("someSession", "fool");
                //$req = $request->session()->get("isAuth");
                //$request->session()->forget("isAuth");
            //$request->session()->flush();
            ///dump($request->session()->all());
            $userdata = $request->post();
            
            
            $checkOut = $request->session()->get("userData");
            if (isset($checkOut)) {
                $out = User::find($checkOut->id_user);
                $out->Status = 0;
                $request->session()->forget("userData");
            }
            if (!empty($userdata)) {
                $checkLogin = User::where("email", "=", $userdata["email"])->first();
                // Данные пользователя на авторизацию
                if (empty($checkLogin) || !password_verify($userdata["password"], $checkLogin->Password)) {
                    $request->session()->put("loginError", "Неверный email или пароль");
                } else {
                    $request->session()->forget("loginError");
                    $request->session()->forget("authError");
                    $request->session()->forget("successReg");
                    $changeStatus = User::find($checkLogin->id_user);
                    

                    $request->session()->put("userData", $checkLogin);
                    //dump($request->session()->all());
                    $changeStatus->Status = 1;
                    $changeStatus->save();
                    return redirect('/');
                }
            }
            
            return view('authentication.login');
            
		}
}
