<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AreaViewController extends Controller
{

  public function viewpage(){

    $result = array();
    $result_province = DB::table('provinces_tbl')->orderBy('id','desc')->get(); 
    
    $result_district = DB::table('district_tbl')
      ->select('district_tbl.id','district_tbl.districts_name','district_tbl.districts_code','district_tbl.province_code','provinces_tbl.province_name')
      ->join('provinces_tbl', 'provinces_tbl.province_code', '=', 'district_tbl.province_code')
      ->orderBy('id','desc')
      ->get();

    $result_cities = DB::table('cities_tbl')
    ->select('cities_tbl.id','cities_tbl.city_name','cities_tbl.city_code','cities_tbl.districts_code','cities_tbl.province_code','provinces_tbl.province_name','district_tbl.districts_name')
      ->join('district_tbl', 'cities_tbl.districts_code', '=', 'district_tbl.districts_code')
      ->join('provinces_tbl', 'district_tbl.province_code', '=', 'provinces_tbl.province_code')
      ->orderBy('id','desc')
      ->get();

    //var_dump($result_cities);
    $result['provinces'] = $result_province;
    $result['districts'] = $result_district;
    $result['cities'] = $result_cities;
 
  	return view('area-route.view')->with('data',$result);
  } 


  // Area Section 
  public function add_area_form(){ 

    $area_code_latest = DB::table('areas_tbl')->max('area_code');
    $code_number = explode('AREA', $area_code_latest); 
    ($code_number[0]!=""?$code_number = $code_number[1]: $code_number =0);  
    $pr_id = sprintf("%03d", $code_number+1);
    $next_area_code = 'AREA'.$pr_id; 


    return view('area-route.area-add')->with('next_area_code',$next_area_code);;
  }

  public function area_save(Request $request){
    $post = $request->all(); 
    $validation = \Validator::make($request->all(),
    [
      'province_name' => 'required', 
      'province_name' => 'unique:provinces_tbl,province_name',   // object if it exists:
    ]);

    if($validation->fails()){

      return redirect()->back()->withErrors($validation->errors());

    }else{
          $data = array (
          'province_name'=> trim($post['province_name']), 
          'province_code'=> trim($post['province_code'])
            );

          $i = DB::table('provinces_tbl')->insert($data);
          if($i > 0){
            \ Session::flash('message','Record Have been saved succesfully!');
            return redirect('area-view#province');
          }
        }
    }

   public function area_update(Request $request)
    {
      $post = $request->all();  
      $v = \Validator::make($request->all() , 
        [
         'province_name'=>'required', 
        ]);

      if($v->fails()){
        return redirect()->back()->withErrors($v->errors());
      }
      else{
        $data = array (
        'province_name'=> trim($post['province_name']), 
          );

        $i = DB::table('provinces_tbl')->where('id',$post['id'])->update($data);
        if($i > 0){
          \ Session::flash('message','Record Have been updated   succesfully!');
           return redirect('area-view#province');
        }
      }
    }


  public function  area_delete($id){

    $i = DB::table('provinces_tbl')->where('id',$id)->delete();
    if($i > 0){
      \ Session::flash('message','Record Have been Deleted succesfully!');
      return redirect('area-view#province');
    }

    }

    public function edit_area_form($id){
      $row = DB::table('provinces_tbl')->where('id',$id)->first();
      return view('area-route.province-edit')->with('row',$row);
    }



  // Province Section 
  public function add_province_form(){ 

    $province_code_latest = DB::table('provinces_tbl')->max('province_code');
    $code_number = explode('PROVINCE', $province_code_latest);
    
    ($code_number[1]!=""? $code_number = $code_number[1]: $code_number =0);  
     
    $pr_id = sprintf("%03d", $code_number+1);
    $next_province_code = 'PROVINCE'.$pr_id;
     
  	return view('area-route.province-add')->with('next_province_code',$next_province_code);;
  }

  public function province_save(Request $request){
  	$post = $request->all(); 
  	$validation = \Validator::make($request->all(),
  	[
  		'province_name' => 'required', 
      'province_name' => 'unique:provinces_tbl,province_name',   // object if it exists:
  	]);

  	if($validation->fails()){

  		return redirect()->back()->withErrors($validation->errors());

  	}else{
      		$data = array (
  				'province_name'=> trim($post['province_name']), 
  				'province_code'=> trim($post['province_code'])
      			);

      		$i = DB::table('provinces_tbl')->insert($data);
      		if($i > 0){
      			\ Session::flash('message','Record Have been saved succesfully!');
      			return redirect('area-view#province');
      		}
      	}
    }

   public function province_update(Request $request)
    {
    	$post = $request->all();  
    	$v = \Validator::make($request->all() , 
    		[
    		 'province_name'=>'required', 
    		]);

    	if($v->fails()){
    		return redirect()->back()->withErrors($v->errors());
    	}
    	else{
    		$data = array (
				'province_name'=> trim($post['province_name']), 
    			);

    		$i = DB::table('provinces_tbl')->where('id',$post['id'])->update($data);
    		if($i > 0){
    			\ Session::flash('message','Record Have been updated   succesfully!');
    			 return redirect('area-view#province');
    		}
    	}
    }


  public function  province_delete($id){

		$i = DB::table('provinces_tbl')->where('id',$id)->delete();
		if($i > 0){
			\ Session::flash('message','Record Have been Deleted succesfully!');
			return redirect('area-view#province');
		}

    }

    public function edit_province_form($id){
    	$row = DB::table('provinces_tbl')->where('id',$id)->first();
    	return view('area-route.province-edit')->with('row',$row);
    }


   // District Section 
  public function add_district_form(){ 

    $district_code_latest = DB::table('district_tbl')->max('districts_code');
    $code_number = explode('DISTRICT', $district_code_latest);
   ($code_number[1]!=""? $code_number = $code_number[1]: $code_number =0);  
    $pr_id = sprintf("%03d", $code_number+1);
    $next_district_code = 'DISTRICT'.$pr_id;
    $result_province = DB::table('provinces_tbl')->get(); 

    return view('area-route.district-add')->with('next_district_code',$next_district_code)->with('result_province',$result_province);
  }

  public function district_save(Request $request){
    $post = $request->all(); 
    $validation = \Validator::make($request->all(),
    [
      'districts_name' => 'required', 
      'districts_name' => 'unique:district_tbl,districts_name' ,  // object if it exists:
      'districts_code' => 'required',   // object if it exists:
      'province_code' => 'required'   // object if it exists:
    ]);

    if($validation->fails()){

      return redirect()->back()->withErrors($validation->errors());

    }else{
          $data = array (
          'districts_name'=> trim($post['districts_name']), 
          'districts_code'=> trim($post['districts_code']),
          'province_code'=> trim($post['province_code'])
            );

          $i = DB::table('district_tbl')->insert($data);
          if($i > 0){
            \ Session::flash('message','Record Have been saved succesfully!');
            return redirect('area-view#districts');
          }
        }
    }

   public function district_update(Request $request)
    {
      $post = $request->all();  
     
      $v = \Validator::make($request->all() , 
        [
         'districts_name'=>'required', 
         'province_code'=>'required', 
        ]);

      if($v->fails()){
        return redirect()->back()->withErrors($v->errors());
      }
      else{
        $data = array (
        'districts_name'=> trim($post['districts_name']), 
        'province_code'=> trim($post['province_code']), 
          );

        $i = DB::table('district_tbl')->where('id',$post['id'])->update($data);
        if($i > 0){
          \ Session::flash('message','Record Have been updated   succesfully!');
           return redirect('area-view#districts');
        }
      }
    }


  public function  district_delete($id){

    $i = DB::table('district_tbl')->where('id',$id)->delete();
    if($i > 0){
      \ Session::flash('message','Record Have been Deleted succesfully!');
      return redirect('area-view#districts');
    }

    }

    public function edit_district_form($id){
      $row = DB::table('district_tbl')
      ->select('district_tbl.id','district_tbl.districts_name','district_tbl.districts_code','district_tbl.province_code','provinces_tbl.province_name')
      ->join('provinces_tbl', 'provinces_tbl.province_code', '=', 'district_tbl.province_code')->where('district_tbl.id',$id)->first();
      
      $result_province = DB::table('provinces_tbl')->get(); 

      return view('area-route.district-edit')->with('row',$row)->with('result_province',$result_province);
    }

  // City Section 
  public function add_city_form(){ 

    $district_code_latest = DB::table('cities_tbl')->max('city_code');
    $code_number = explode('CITY', $district_code_latest);
    ($code_number[0]!=""? $code_number = $code_number[1]: $code_number =0);  
    $pr_id = sprintf("%06d", $code_number+1);
    $next_city_code = 'CITY'.$pr_id;
    $result_district = DB::table('district_tbl')->get(); 
    // $result_province = DB::table('provinces_tbl')->get(); 

    return view('area-route.city-add')->with('next_city_code',$next_city_code)->with('result_district',$result_district);
  }

  public function city_save(Request $request){
    $post = $request->all(); 
    $validation = \Validator::make($request->all(),
    [
      'city_name' => 'required', 
      'city_name' => 'unique:cities_tbl,city_name' ,  // object if it exists:
      'district_code' => 'required',   // object if it exists: 
    ]);

    if($validation->fails()){

      return redirect()->back()->withErrors($validation->errors());

    }else{
          $data = array (
          'city_name'=> trim($post['city_name']), 
          'city_code'=> trim($post['city_code']),
          'districts_code'=> trim($post['district_code']), 
            );

          $i = DB::table('cities_tbl')->insert($data);
          if($i > 0){
            \ Session::flash('message','Record Have been saved succesfully!');
            return redirect('area-view#cities');
          }
        }
    }

   public function city_update(Request $request)
    {
      $post = $request->all();  
     
      $v = \Validator::make($request->all() , 
        [  
          'city_name'=>'required',  
          'districts_code' => 'required',   // object if it exists:
        ]);

      if($v->fails()){
        return redirect()->back()->withErrors($v->errors());
      }
      else{
        $data = array (
        'city_name'=> trim($post['city_name']),  
        'districts_code'=> trim($post['districts_code']), 
          );

        $i = DB::table('cities_tbl')->where('id',$post['id'])->update($data);
        if($i > 0){
          \ Session::flash('message','Record Have been updated   succesfully!');
           return redirect('area-view#cities');
        }
      }
    }


  public function  city_delete($id){

    $i = DB::table('district_tbl')->where('id',$id)->delete();
    if($i > 0){
      \ Session::flash('message','Record Have been Deleted succesfully!');
      return redirect('area-view#cities');
    }

    }

    public function edit_city_form($id){

      $row = DB::table('cities_tbl')
      ->select('cities_tbl.id','cities_tbl.city_name','cities_tbl.city_code','cities_tbl.districts_code','district_tbl.districts_name')
      ->join('district_tbl', 'district_tbl.districts_code', '=', 'cities_tbl.districts_code')
      ->where('cities_tbl.id',$id)->first();
      
      
      $result_district = DB::table('district_tbl')->get(); 
      $result_province = DB::table('provinces_tbl')->get(); 

      return view('area-route.city-edit')->with('row',$row)->with('result_province',$result_province)->with('result_district',$result_district);
    }
}