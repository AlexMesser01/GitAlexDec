<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login()
		{
			//return "Hi, user your id is - ".$username_id
            return view('authentication.login');
		}
}
