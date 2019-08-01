<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

	/**
	 * 
	 */
	class RegisterController
	{
		protected $title = "Đăng ký";
		
		public function getRegister()
		{
			$data = [];
		// $query = User::all();
			$data['title'] = $this->title;
		// $data['query'] = $query;
			return view('register',$data);

		}

		public function postRegister(Request $request)
		{
			$username=$request->input('username');
			$result=DB::table('users')->where('username',$username)->first();
			if ($result!=null) {
				$alert='Tên người dùng đã tồn tại.Vui lòng thử 1 tên khác';
				return redirect()->back()->with('alert',$alert);
			}else{
				$password=md5($request->input('password'));
				$fullName=$request->input('fullName');
				$mobile=$request->input('mobile');
				$email=$request->input('email');
				$address=$request->input('address');
				User::insert([
					'username'=>$username,
					'password'=>$password,
					'fullName'=>$fullName,
					'mobile'=>$mobile,
					'email'=>$email,
					'address'=>$address
				]);
				return redirect('login');
			}
		}




	}



