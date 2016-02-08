<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Payment_model;

class PaymentController extends Controller
{

  public function viewPayment(){
  	$result = Payment_model::get_all_payment_methods();    
  	return view('payment.view')->with('data',$result);
  } 

  public function viewForm(){
  	return view('payment.add');
  }

   public function payment_edit($id){
    	$row = Payment_model::get_payment_method_details_by_id($id);
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
    		$i = Payment_model::insert_payment_method($data);
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
                $user_favorites = Payment_model::check_payment_method_is_exist($post['id'], $post['payment_name']);
                 
            if (!is_null($user_favorites)) {
               return redirect()->back()->withErrors('The payment name has already been taken.');
            } else {
                $data = array (
                            'payment_name'=> $post['payment_name'], 
                            'updated_at'  => strtotime(date('Y-m-d H:i:s')), 
    			);

    		$i = Payment_model::update_payment_method($post['id'], $data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('payment-view');
    		}
            }
    	}
    }

  public function delete($id){

      $i = Payment_model::delete_payment_method($id);
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('payment-view');
		}

    }

   
}