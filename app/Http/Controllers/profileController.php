<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class profileController extends Controller
{

  public function viewProfile(){  	
     if(Auth::check()){
         $result=array(
             'username'=>Auth::user()->username,
             'email'=>Auth::user()->email
         );
         
         return view('profile.edit')->with('data',$result);
     }else{
         return redirect('login')->with('error','Login Failed');
     }       	
  } 

  public function update(Request $request)
    {     
    	$post = $request->all();
    	
        if($post['password'] != ''){
            $v = \Validator::make($request->all() , 
    		[
    		 'user_name'=>'required',
    		 'user_email'=>'required|email',                    
                 'password' => 'required|min:3|confirmed',
                 'password_confirmation' => 'required|min:3'
    		]);            
        }else{
            $v = \Validator::make($request->all() , 
    		[
    		 'user_name'=>'required',
    		 'user_email'=>'required|email', 
    		]);
        } 
    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{
            $data = array (
                            'username'=> $post['user_name'], 
                            'email'  => $post['user_email'], 
                            'password'  =>Hash::make($post['password']) , 
    			);

    		$i = DB::table('users')->where('id',Auth::user()->id)->update($data);
    		if($i > 0){
    			\ Session::flash('message','Profile Details Have been updated succesfully!');
    			return redirect('profile-view');
    		}
        }
    }

     
}