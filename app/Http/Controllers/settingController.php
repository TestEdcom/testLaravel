<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class settingController extends Controller
{

  public function view(){  	
     if(Auth::check()){
         $result = DB::table('settings')->get();    
         $_details=array();
         
         if(!empty($result)){
             foreach ($result as $_data){
                 $_details[$_data->option_name]=$_data->value;
             } 
         }
         
         $FmyFunctions1 = new myFunctions;
  $is_ok = ($FmyFunctions1->is_ok());
  var_dump($is_ok); exit;
  	return view('setting.edit')->with('data',$_details);
     }else{
         return redirect('login')->with('error','Login Failed');
     }       	
  } 

  public function update(Request $request)
    {     
    	$post = $request->all();
          
    	$v = \Validator::make($request->all() , 
    		[
    		 'company_name'=>'required',
    		 'company_address'=>'required',
    		 'company_email'=>'required|email',                    
                 'company_phone' => 'required',
    		]);            
        
    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{
                unset($post['_token']);
                
                foreach ($post as $_key=>$_value){
                     $name = DB::table('settings')->where('option_name', $_key)->pluck('id');
                     if(is_null($name)){                         
                          $data = array (
                            'option_name'=> $_key, 
                            'value'  => $_value,
    			);
                        $i = DB::table('settings')->insert($data);                
                     }else{
                       $data = array (
                            'option_name'=> $_key, 
                            'value'  => $_value,
    			);
                        $i = DB::table('settings')->where('option_name',$_key)->update($data);                 
                     }
                }
    		\ Session::flash('message','Settings Have been updated succesfully!');
    			return redirect('setting-view');
        }
    }

     
}