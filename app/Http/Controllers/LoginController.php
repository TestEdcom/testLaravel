<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{


	public function getRegister(){
		return view('auth.register');
	}

	public function doRegister( Request $request){
		$name = $request->name; 
		$date = date("Y-m-d H:i:s");               ;
		/* validating required fields */
		$validator = Validator::make(
			array(
				'username' => $request->name,
				'email' => $request->email,
				'password' => $request->password,
				'password_confirmation' => $request->password_confirmation
		    ),array(
		    	'username' => 'required',
				'email' => 'required | email',
				'password' =>'required',
				'password_confirmation' => 'required | same:password'
		    ));

		/* cheaking validations & save to db*/
		if($validator->fails()){
			return redirect('register')->withErrors($validator)->withInput();
		}else{
			
			$data = array(
				'username' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'remember_token' => $request->remember_token,
				'created_at' => $date,
				'updated_at' => $date,
				);

			$id_email = DB::table('users')->select('email')->where('email',$request->email)->get();

			if(count($id_email)==0){

				if(DB::table('users')->insert($data)){
					return redirect('login')->with('success','Successfully Sign Up');
				}else{
					return redirect('register')->with('error','Failed Sign Up');
				}

			}else{

				return redirect('register')->with('error','Email Already Exist');
			}

		}
	}


	public function getLogin(){

		return view('auth.login');
	}

	public function doLogin(Request $request){

		//var_dump($request->all());

		$user = array('email'=>$request->email,'password'=>$request->password);

		if(Auth::attempt($user)){
			Session::put('userEmail', Auth::user()->email);  
     		Session::put('userID', Auth::user()->id); 
     		
			return redirect()->intended('dashboard');
		}else {
			return redirect('login')->with('error','Login Failed');
		}
	}

	public function logout(){

		Auth::logout();
		return redirect()->intended('login');
	}

	public function dashboard(){
		 
		return view('dashboard.dashboard');
	}
}