<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PaymentController extends Controller
{

  public function viewPayment(){
  	$result = DB::table('payment_method')
             ->where('trash', '!=', '1')   
             ->get();    
  	return view('payment.view')->with('data',$result);
  } 

  public function viewForm(){
  	return view('payment.add');
  }

   public function payment_edit($id){
    	$row = DB::table('payment_method')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
    	return view('payment.edit')->with('row',$row);
    }
    
  public function payment_save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  		'payment_name' => 'required',
  		'payment_name'=> 'unique:payment_method,payment_name'   // object if it exists:
  	]);
        
	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
    		$data = array (
				'payment_name'=> $post['payment_name'], 
				'created_at'  => strtotime(date('Y-m-d H:i:s')), 
    			);

    		$i = DB::table('payment_method')->insert($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('payment-view');
    		}
    	}
  }

  public function update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'payment_name'=>'required',
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{            
                $user_favorites = DB::table('payment_method')
                    ->where('id', '!=', $post['id'])
                    ->where('payment_name', '=', $post['payment_name'])
                    ->first();

            if (!is_null($user_favorites)) {
               return redirect()->back()->withErrors('The payment name has already been taken.');
            } else {
                $data = array (
                            'payment_name'=> $post['payment_name'], 
                            'updated_at'  => strtotime(date('Y-m-d H:i:s')), 
    			);

    		$i = DB::table('payment_method')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('payment-view');
    		}
            }
    	}
    }

  public function delete($id){

      $i = DB::table('payment_method')->where('id',$id)->update(array('trash'=>'1'));
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('payment-view');
		}

    }

   
}