<?php
    namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\User;
	use App\Models\News;
	use App\Models\UserInfo;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Session;

    class ProfileController extends Controller
	{
		public $postData;
		public function user(request $request)
		{
			
			
			$this->postData = $request->post();
			$hasChange = $request->post("change_info");
			$userInfo = new UserInfo;
			$user = new User;
			$findUser = $userInfo::find(Session::get('userData')->Username);
			if ($request->hasFile("updAvatar")) {
				$this->changeAvatar($request);
				$upd = User::find($request->session()->get("userData")->id_user);
				$request->session()->put('userData', $upd );
			}
			if ($hasChange == "Сохранить изменения") {
				//echo "Change info";
				if (is_null($findUser)) {
					$this->saveInfo($userInfo);
				} else {
					$this->changeInfo($findUser);
					// $this->changeData($user);
				}
			} else if ($hasChange == "Сохранить пользовательские данные") {
				$findUser = $user::find(Session::get('userData')->id_user);
				$hasUser = $user::where("email", "=", $this->postData["email"])->where("Username", "=", $this->postData["username"])->first();
				if (is_null($hasUser)) {
					$this->changeData($findUser);
					$upd = User::where("Username", "=", $this->postData["username"] )->first();
					$request->session()->put('userData', $upd );
					$request->session()->forget("hasUserData");
				} else {
					$request->session()->put("hasUserData", "Такой пользователь уже существует!");
				}

			}
            return view('profile.profile', ["userData" => $findUser]);
		}
		public function saveInfo($data){
			$data->user = Session::get('userData')->Username;
			$data->city = $this->postData["city"];
			$data->phone_number = $this->postData["phone"];
			$data->gender = $this->postData["gender"];
			$data->birthday = $this->postData["birthday"];
			$data->save();
		}
		public function changeInfo($data){
			$data->city = $this->postData["city"];
			$data->phone_number = $this->postData["phone"];
			$data->gender = $this->postData["gender"];
			$data->birthday = $this->postData["birthday"];
			$data->save();
		}
		public function changeData($data){
			$data->Username = $this->postData["username"];
			$data->Email = $this->postData["email"];
			$data->Password = password_hash($this->postData["password"], PASSWORD_DEFAULT);
			$data->Status = 1;
			$data->save();
		}
		public function show(request $request, $user_id = 14){
			$userInfo = new UserInfo;
			$user = User::find($user_id);
			$findUser = $userInfo::find($user->Username);
			return view('profile.show', ["userData" => $findUser]);
		}
		public function changeAvatar($request){
			$file = $request->file('updAvatar');
			$basepath = explode( "\\", $file->getPathName());
			$tmp_name = end($basepath);
			$filename = explode(".",$tmp_name)[0].".png";
			$file->move(base_path("public\\img"), $filename);
			$updUser = User::find($request->session()->get("userData")->id_user);
			$updUser->Avatar = "img/".$filename;
			$updUser->save();
		}

	}
?>  