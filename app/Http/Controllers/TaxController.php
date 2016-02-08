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
use App\TaxRate_model;

class TaxController extends Controller
{
 

  public function viewTax(){  
     //var_dump(Session::get('userEmail'));    
  	$result = TaxRate_model::get_all_taxrates();
  	return view('tax.view')->with('data',$result);
  } 

  public function viewForm(){
  	return view('tax.add');
  }

  public function tax_save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  	'tax_name' => 'required',
        'tax_name'=> 'unique:tax_rates,tax_name',   // object if it exists:
  	'tax_rate' => 'regex:/[\d]{1,2}.[\d]{1,2}/' ,
  	]);

	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
    		$data = array (
			'tax_name'=> $post['tax_name'], 
                        'tax_rate'=> $post['tax_rate'],
                        'status'=> $post['status'], 
			'date'=> strtotime(date('Y-m-d H:i:s'))
    			);

    		$i = TaxRate_model::insert_taxrate($data);
    		if($i > 0){
            $userID = Auth::user()->id;
            $event = "Tax Rates";
            $task = "New Tax Record Saved";
            $taskID = $i;
            $date = strtotime(date('Y-m-d H:i:s'));
            // \ CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('tax-view');
    		}
    	}
  }

   public function update(Request $request)
    {
    	$post = $request->all();  
    	$v = \Validator::make($request->all() , 
    		[
    		 'tax_name'=>'required',
    		 'tax_rate'=>'required'  
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}
    	else{
    		$data = array (
				'tax_name'=> $post['tax_name'],
				'tax_rate'=> $post['tax_rate'],
                                'status'=> $post['status']
    			);

    		$i = TaxRate_model::update_taxrate($post['id'], $data);
    		if($i > 0){
            $userID = Auth::user()->id;
            $event = "Tax Rates";
            $task = "Tax Record Updated";
            $taskID = $post['id'];
            $date = strtotime(date('Y-m-d H:i:s'));
            // \ CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
    			\ Session::flash('message','Record Have been updated   succesfully!');
    			return redirect('tax-view');
    		}
    	}
    }


  public function delete($id){

		$i = TaxRate_model::delete_taxrate($id); //update(['trash' => 1]);
		if($i > 0){
        $userID = Auth::user()->id;
        $event = "Tax Rates";
        $task = "Tax Record Moved To Trash";
        $taskID = $id;
        $date = strtotime(date('Y-m-d H:i:s'));
        // CustomHelper::saveUserLog($userID,$event,$task,$taskID,$date);
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('tax-view');
		}

    }

    public function tax_edit($id){
    	$row = TaxRate_model::get_taxrate_details_by_id($id);
    	return view('tax.edit')->with('row',$row);
    }
}