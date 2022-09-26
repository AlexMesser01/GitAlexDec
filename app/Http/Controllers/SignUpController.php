<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;

use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{
    public function signup(Request $request){
        session_start();
        $userdata = $request->post(); // Данные пользователя на регистрацию  
        $userInfo = new UserInfo;
        $singupCheck = User::where("Email", "=", $userdata["email"])->get();
        //dump($singupCheck);
        if (!$singupCheck->isEmpty()) {
            $request->session()->put("authError", "На данный Email уже зарегестрирован аккаунт");
        } else {
            $request->session()->forget("authError");
            //dump($userdata);
            $userMod = new User;
            $userMod->Username = $userdata["username"];
            $userMod->Email = $userdata["email"];
            $userMod->Password = password_hash($userdata["password"], PASSWORD_DEFAULT);
            $userMod->Status = 0;
            $userMod->save(); 
            $this->saveData($userInfo, $userdata);
            $request->session()->put("successReg", "Вы успешно зарегестрированы!");
        }   
        return view('authentication.login');
    }
        public function saveData($data, $userdata){
            $data->user = $userdata["username"];
            $data->city = "Не выбран";
            $data->phone_number = "00000000000";
            $data->gender = 'Не выбран';
            $data->birthday = date('Y-m-d');
            $data->save();
        }
}
