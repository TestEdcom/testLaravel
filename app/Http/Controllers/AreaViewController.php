<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AreaView_model;
use Auth;

class AreaViewController extends Controller
{

  public function viewpage(){

    $result = array();
    $result_province = DB::table('provinces_tbl')->orderBy('id','desc')->get(); 
    
    $result_district = AreaView_model::get_districts();

    $result_cities = AreaView_model::get_cities(); 
    
    $area_array = AreaView_model::get_areas_by_city_district(); 
 
    $result['provinces'] = $result_province;
    $result['districts'] = $result_district;
    $result['cities'] = $result_cities;
    $result['areas'] = $area_array;
 
  	return view('area-route.view')->with('data',$result);
  } 


  // Area Section 
  public function add_area_form(){ 

    $next_area_code = AreaView_model::get_next_area_code();

    $all_distrcts_cities = AreaView_model::all_distrcts_cities_for_area();
    
    return view('area-route.area-add')->with('next_area_code',$next_area_code)->with('all_distrcts_cities',$all_distrcts_cities);
  }

  public function area_save(Request $request){
    $post = $request->all();  
     
    $validation = \Validator::make($request->all(),
    [
      'area_name' => 'required', 
      'selected_cities' => 'required',   // object if it exists:
    ]);

    if($validation->fails()){

      return redirect()->back()->withErrors($validation->errors());

    }else{
          $data = array (
          'area_name'=> trim($post['area_name']), 
          'area_code'=> trim($post['area_code']),
          'status'=> 1,
            );

           
           $selected_cities = trim($post['selected_cities']);
           $selected_city_array = explode(',', $selected_cities); 
           
          $i = DB::table('areas_tbl')->insert($data);
          $flag = true;
          if($i > 0){
              foreach($selected_city_array as $selected_c){
             
                  $data_cities_for_area = array (
                  'area_code'=> trim($post['area_code']), 
                  'city_code'=> trim($selected_c)
                    );
                  $j = DB::table('areas_cities_tbl')->insert($data_cities_for_area);
                    if($j > 0){ 
                      $flag = true;
                    }else{
                      $flag = false;
                    }
               }
               if($flag)
            \ Session::flash('message','Record Have been saved succesfully!');
            return redirect('area-view#area');
          }
        }
    }

   public function area_update(Request $request)
    {
      $post = $request->all();   
      $v = \Validator::make($request->all() , 
          [
              'area_name' => 'required', 
              'selected_cities' => 'required', 
          ]);

        if($v->fails()){
          return redirect()->back()->withErrors($v->errors());
        }
        else{

          $post_selected_cities = trim($post['selected_cities']);
          $post_selected_city_array = explode(',', $post_selected_cities);

          $saved_selected_cities_all = DB::table('areas_cities_tbl')->where('area_code',trim($post['area_code']))->get();
          $saved_selected_cities_array = array();
  

          foreach( $saved_selected_cities_all as  $selected_cities){
            array_push($saved_selected_cities_array,$selected_cities->city_code); 
          }   


          $newitems = array_diff($post_selected_city_array, $saved_selected_cities_array); 

          $deleteitems = array_diff($saved_selected_cities_array,$post_selected_city_array); 

          $data = array (
          'area_name'=> trim($post['area_name']), 
          'status'=> trim($post['status']), 
            );
           $flagI = true;
           $flagD = true;

          $i = DB::table('areas_tbl')->where('id',$post['id'])->update($data); 
           
                if(!empty($newitems)):
                foreach($newitems as $new_city):
             
                  $new_cities = array (
                  'area_code'=> trim($post['area_code']), 
                  'city_code'=> trim($new_city)
                    ); 
                  $j = DB::table('areas_cities_tbl')->insert($new_cities);

                    if($j > 0){ 
                      $flagI = true;
                    }else{
                      $flagI = false;
                    }

               endforeach;
               endif;

               if(!empty($deleteitems)):
               foreach($deleteitems as $delete_city):
                 
                    $k = DB::table('areas_cities_tbl')->where('city_code',$delete_city)->delete();

                      if($k > 0){ 
                        $flagD = true;
                      }else{
                        $flagD = false;
                      }

                 endforeach;
                 endif; 

               if($flagD && $flagI)
              \ Session::flash('message','Record Have been updated succesfully!');
               return redirect('area-view#area');
          
        }
    }


  public function  area_delete($id){
    $flagD = true;
    $area_code = DB::table('areas_tbl')->select('area_code') ->where('id',$id)->first();
    $i = DB::table('areas_tbl')->where('id',$id)->delete();
    if($i > 0){
        $k = DB::table('areas_cities_tbl')->where('area_code',$area_code->area_code)->delete();

          if($k > 0){ 
            $flagD = true;
          }else{
            $flagD = false;
          }
      if($flagD)
      \ Session::flash('message','Record Have been Deleted succesfully!');
      return redirect('area-view#area');
    }

    }

    public function edit_area_form($id){
      $row = DB::table('areas_tbl')->where('id',$id)->first();
 

      $selected_cities_all = DB::table('areas_cities_tbl')->where('area_code',$row->area_code)->get();
      $selected_cities_array = array();

      foreach( $selected_cities_all as  $selected_cities){
        array_push($selected_cities_array,$selected_cities->city_code); 
      }  

      $result_district = DB::table('district_tbl')->get(); 
      $all_distrcts_cities = array();
      foreach($result_district as $r_district){ 
       
        $districts_name = $r_district->districts_name;
        $districts_code =  $r_district->districts_code;
        $results_cities_in_district =  DB::table('cities_tbl')
        ->select('cities_tbl.id','cities_tbl.city_name','cities_tbl.city_code') 
        ->where('cities_tbl.districts_code',$districts_code)
        ->get();
        array_push($all_distrcts_cities,array('district'=>array('districts_name'=>$districts_name,'districts_code'=>$districts_code),'cities'=>$results_cities_in_district));
         
        
      } 
      return view('area-route.area-edit')->with('row',$row)->with('all_distrcts_cities',$all_distrcts_cities)->with('selected_cities_array',$selected_cities_array);
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
    ($code_number[1]!=""? $code_number = $code_number[1]: $code_number =0);  
    $pr_id = sprintf("%06d", $code_number  +1);
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