<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MerchandisersController extends Controller
{

  public function view(){
  	$result = DB::table('merchandiser')
             ->where('trash', '!=', '1')   
             ->get();    
  	return view('merchandisers.view')->with('data',$result);
  } 

  public function add(){
      $result = DB::table('merchandiser')
              ->max('id');
       if(is_null($result)){
           $result='001';
       } else{
           $result++;
           $result = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
  	return view('merchandisers.add')->with('data',array('id'=>$result));      
  }

   public function edit($id){
    	$row = DB::table('merchandiser')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
    	return view('merchandisers.edit')->with('row',$row);
    }
    
  public function save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  		'name' => 'required|unique:merchandiser,name',  		
  		'contact_no'=> 'required',   // object if it exists:
  		'email'=> 'required',   // object if it exists:
  	]);
        
	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
            
            $result = DB::table('merchandiser')
              ->max('id');
       if(is_null($result)){
           $code='001';
       } else{
           $result++;
           $code = str_pad($result, 3, '0', STR_PAD_LEFT);
       }         
       
    		$data = array (
				'name'=> $post['name'], 
				'code'=> 'MERCH'.$code, 
				'contact_no'=> $post['contact_no'], 
				'email'=> $post['email'],
    			);

    		$i = DB::table('merchandiser')->insert($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('merchandiser-view');
    		}
    	}
  }

  public function update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'name' => 'required',  		
  		'contact_no'=> 'required',   // object if it exists:
  		'email'=> 'required',
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{            
                $user_favorites = DB::table('merchandiser')
                    ->where('id', '!=', $post['id'])
                    ->where('name', '=', $post['name'])
                    ->first();

            if (!is_null($user_favorites)) {
               return redirect()->back()->withErrors('The Merchandiser name has already been taken.');
            } 
            else {
                $data = array (
                            'name'=> $post['name'],                             
                            'contact_no'=> $post['contact_no'], 
                            'email'=> $post['email'],
    			);

    		$i = DB::table('merchandiser')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('merchandiser-view');
    		}
              
            }
    	}
    }

  public function delete($id){

      $i = DB::table('merchandiser')->where('id',$id)->update(array('trash'=>'1'));
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('merchandiser-view');
		}

    }

   
}