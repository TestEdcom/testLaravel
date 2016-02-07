<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SupplierController extends Controller
{

  public function view(){
        $result = DB::table('suppliers_tbl')
             ->where('trash', '!=', '1')   
             ->get();    
  	return view('suppliers.view')->with('data',$result);
        
  } 

  public function add(){
      $result = DB::table('suppliers_tbl')
              ->max('id');
       if(is_null($result)){
           $result='001';
       } else{
           $result++;
           $result = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
  	return view('suppliers.add')->with('data',array('id'=>$result));
  }

   public function edit($id){
    	$row = DB::table('suppliers_tbl')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();        
    	return view('suppliers.edit')->with('row',$row);
    }
    
  public function save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  		'supplier_name' => 'required',  		
  		'company_name' => 'required',
  		'address_1' => 'required',
  		'address_2' => 'required',
  		'city' => 'required',
  		'district' => 'required',  		
  	]);
        
	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
            
            $result = DB::table('suppliers_tbl')
              ->max('id');
       if(is_null($result)){
           $code='001';
       } else{
           $result++;
           $code = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
       
    		$data = array (
				'supplier_code'=> $code, 
				'supplier_name'=> $post['supplier_name'], 
				'contact_person_name'=> $post['contact_person_name'], 
				'phone_land'=> $post['phone_land'], 
				'phone_mobile'=> $post['phone_mobile'], 
				'fax'=> $post['fax'], 
				'email'=> $post['email'], 
				'web_address'=> $post['web_address'], 
				'company_name'=> $post['company_name'], 
				'address_1'=> $post['address_1'], 
				'address_2'=> $post['address_2'], 
				'city'=> $post['city'], 
				'district'=> $post['district'], 
				'status'=> '1', 
				'trash'=> '0'
    			);

    		$i = DB::table('suppliers_tbl')->insert($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('suppliers-view');
    		}
    	}
  }

  public function update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'supplier_name' => 'required',  		
  		'company_name' => 'required',
  		'address_1' => 'required',
  		'address_2' => 'required',
  		'city' => 'required',
  		'district' => 'required',  
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{            
               
                $data = array (
                            'supplier_name'=> $post['supplier_name'], 
				'contact_person_name'=> $post['contact_person_name'], 
				'phone_land'=> $post['phone_land'], 
				'phone_mobile'=> $post['phone_mobile'], 
				'fax'=> $post['fax'], 
				'email'=> $post['email'], 
				'web_address'=> $post['web_address'], 
				'company_name'=> $post['company_name'], 
				'address_1'=> $post['address_1'], 
				'address_2'=> $post['address_2'], 
				'city'=> $post['city'], 
				'district'=> $post['district'], 
    			);

    		$i = DB::table('suppliers_tbl')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('suppliers-view');
    		}
            
    	}
    }

  public function delete($id){

      $i = DB::table('suppliers_tbl')->where('id',$id)->update(array('trash'=>'1'));
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('suppliers-view');
		}

    }

   
}