<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Auth\AuthController;
 use App\CustomHelper; 
 use Session;
use Auth;
use App\Products_model;

class ProductController extends Controller
{
 

  public function category_view(){  
     //var_dump(Session::get('userEmail'));    
  	$result = Products_model::get_all_product_categories();
  	return view('products.pcategory.view')->with('data',$result);
  } 

  public function pcat_add_form(){

    $next_cat_code = Products_model::get_next_cat_code();

  	return view('products.pcategory.add')->with('next_cat_code',$next_cat_code);
  }

  public function pcat_save(Request $request){

  	$post = $request->all();

  	$validation = \Validator::make($request->all(),
  	[
  	'p_cat_name' => 'required'  
  	]);

	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
    		$data = array (
        'p_cat_name'=> $post['p_cat_name'],  
        'p_cat_code'=> $post['p_cat_code'],
        'p_cat_description'=> $post['p_cat_description'],
        'status'=> $post['status'], 
  			'date'=> strtotime(date('Y-m-d H:i:s'))
    			);

    		$i = Products_model::insert_pcategory($data);

    		if($i > 0){
            // $userID = Auth::user()->id;
            // $event = "Product Category";
            // $task = "New Product Category Saved";
            // $taskID = $i;
            // $date = strtotime(date('Y-m-d H:i:s'));
            // \ CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
    			\Session::flash('message','Record Have been saved succesfully!');
    			return redirect('product-category');
    		}
    	}
  }

   public function pcat_update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'p_cat_name' => 'required'
    		]); 
    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}
    	else{
    		$data = array (
          'p_cat_name'=> $post['p_cat_name'],
          'p_cat_description'=> $post['p_cat_description'],
          'status'=> $post['status']
    			);

    		$i = Products_model::update_pcategory($post['id'], $data); var_dump($i);
    		if($i > 0){
            // $userID = Auth::user()->id;
            // $event = "Product Category";
            // $task = "Product Category Updated";
            // $taskID = $post['id'];
            // $date = strtotime(date('Y-m-d H:i:s'));
            // \ CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
    			\Session::flash('message','Record Have been updated  succesfully!');
    			return redirect('product-category');
    		}
    	}
    }


  public function delete($id){

		$i = Products_model::delete_pcategory($id); //update(['trash' => 1]);
		if($i > 0){
        // $userID = Auth::user()->id;
        // $event = "Product Category";
        // $task = "Product Category Moved To Trash";
        // $taskID = $id;
        // $date = strtotime(date('Y-m-d H:i:s'));
        // CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
			\Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('product-category');
		}

    }

    public function pcat_edit_form($id){
    	$row = Products_model::get_pcategory_details_by_id($id);
    	return view('products.pcategory.edit')->with('row',$row);
    }
}