<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ChannelController extends Controller
{

  public function view(){
  	$result = DB::table('channel')
             ->where('trash', '!=', '1')   
             ->get();    
  	return view('channel.view')->with('data',$result);
  } 

  public function add(){
      $result = DB::table('channel')
              ->max('id');
       if(is_null($result)){
           $result='00001';
       } else{
           $result++;
           $result = str_pad($result, 5, '0', STR_PAD_LEFT);
       }         
  	return view('channel.add')->with('data',array('id'=>$result));      
  }

   public function edit($id){
    	$row = DB::table('channel')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
    	return view('channel.edit')->with('row',$row);
    }
    
  public function save(Request $request){
  	$post = $request->all();
  	$validation = \Validator::make($request->all(),
  	[
  		'name' => 'required|unique:channel,name',  	
  	]);
        
	if($validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}else{
            
            $result = DB::table('channel')
              ->max('id');
       if(is_null($result)){
           $code='00001';
       } else{
           $result++;
           $code = str_pad($result, 5, '0', STR_PAD_LEFT);
       }         
       
    		$data = array (
				'name'=> $post['name'], 
				'code'=> 'CH'.$code, 
				'description'=> $post['description'], 
    			);

    		$i = DB::table('channel')->insert($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been saved succesfully!');
    			return redirect('channel-view');
    		}
    	}
  }

  public function update(Request $request)
    {
    	$post = $request->all(); 
    	$v = \Validator::make($request->all() , 
    		[
    		 'name' => 'required',  	
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}else{            
                $user_favorites = DB::table('channel')
                    ->where('id', '!=', $post['id'])
                    ->where('name', '=', $post['name'])
                    ->first();

            if (!is_null($user_favorites)) {
               return redirect()->back()->withErrors('The channel name has already been taken.');
            } 
            else {
                $data = array (
                            'name'=> $post['name'],                             
                            'description'=> $post['description'], 
    			);

    		$i = DB::table('channel')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated succesfully!');
    			return redirect('channel-view');
    		}
              
            }
    	}
    }

  public function delete($id){

      $i = DB::table('channel')->where('id',$id)->update(array('trash'=>'1'));
    		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('channel-view');
		}

    }

   
}