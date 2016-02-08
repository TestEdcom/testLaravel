<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\SalesPerson_model;

class SalesPersonController extends Controller
{

  public function view(){
  	$result = SalesPerson_model::get_all_salesPersons();    
  	return view('salesperson.view')->with('data',$result);
  } 

  public function add(){
      $result = SalesPerson_model::get_salesPerson_max_id();
       
      if(is_null($result)){
           $result='001';
       } else{
           $result++;
           $result = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
  	return view('salesperson.add')->with('data',array('id'=>$result));      
  }

   public function edit($id){
    	$row = SalesPerson_model::get_salesPerson_details_by_id($id);
    	return view('salesperson.edit')->with('row',$row);
    }
    
  public function save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  		'name' => 'required',  		
  		'phone_land'=> 'required',   // object if it exists:
  		'phone_mobile'=> 'required',   // object if it exists:
  		'email'=> 'required',   // object if it exists:
  	]);
        
	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
            
            $result = SalesPerson_model::get_salesPerson_max_id();
            
       if(is_null($result)){
           $code='001';
       } else{
           $result++;
           $code = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
       
    		$data = array (
                    'name'=> $post['name'], 
                    'salesperson_code'=> $code, 
                    'phone_land'=> $post['phone_land'], 
                    'phone_mobile'=> $post['phone_mobile'], 
                    'email'=> $post['email'],
                );

    		$i = SalesPerson_model::insert_salesPerson($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('salesperson-view');
    		}
    	}
  }

  public function update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'name' => 'required',  		
  		'phone_land'=> 'required',   // object if it exists:
  		'phone_mobile'=> 'required',   // object if it exists:
  		'email'=> 'required',   // object if it exists:
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{  
                $data = array (
                            'name'=> $post['name'],                    
                            'phone_land'=> $post['phone_land'], 
                            'phone_mobile'=> $post['phone_mobile'], 
                            'email'=> $post['email'],
    			);

    		$i = SalesPerson_model::update_salesPerson($post['id'], $data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('salesperson-view');
    		}
              
           
    	}
    }

  public function delete($id){

      $i = SalesPerson_model::delete_salesPerson($id);
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('salesperson-view');
		}

    }

   
}