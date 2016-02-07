<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SalesPersonController extends Controller
{

  public function view(){
  	$result = DB::table('salesperson_tbl')
             ->where('trash', '!=', '1')   
             ->get();    
  	return view('salesperson.view')->with('data',$result);
  } 

  public function add(){
      $result = DB::table('salesperson_tbl')
              ->max('id');
       if(is_null($result)){
           $result='001';
       } else{
           $result++;
           $result = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
  	return view('salesperson.add')->with('data',array('id'=>$result));      
  }

   public function edit($id){
    	$row = DB::table('salesperson_tbl')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
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
            
            $result = DB::table('salesperson_tbl')
              ->max('id');
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

    		$i = DB::table('salesperson_tbl')->insert($data);
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

    		$i = DB::table('salesperson_tbl')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('salesperson-view');
    		}
              
           
    	}
    }

  public function delete($id){

      $i = DB::table('salesperson_tbl')->where('id',$id)->update(array('trash'=>'1'));
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('salesperson-view');
		}

    }

   
}