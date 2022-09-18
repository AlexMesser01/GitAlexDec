<?php
    namespace App\Http\Controllers;
    class ProfileController extends Controller
	{
		public function user($username_id)
		{
			//return "Hi, user your id is - ".$username_id;
            return view('profile.profile', ["user_id" => $username_id]);
		}
	}
?>  