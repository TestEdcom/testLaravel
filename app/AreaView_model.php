<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class AreaView_model extends Model {
    public $district_tbl = 'district_tbl';
	
   
  
   public static function get_districts(){

      $result = DB::table('district_tbl')
      ->select('district_tbl.id','district_tbl.districts_name','district_tbl.districts_code','district_tbl.province_code','provinces_tbl.province_name')
      ->join('provinces_tbl', 'provinces_tbl.province_code', '=', 'district_tbl.province_code')
      ->orderBy('id','desc')
      ->get();

       return $result;
   }

   public static function get_cities(){

      $result = DB::table('cities_tbl')
      ->select('cities_tbl.id','cities_tbl.city_name','cities_tbl.city_code','cities_tbl.districts_code','cities_tbl.province_code','provinces_tbl.province_name','district_tbl.districts_name')
      ->join('district_tbl', 'cities_tbl.districts_code', '=', 'district_tbl.districts_code')
      ->join('provinces_tbl', 'district_tbl.province_code', '=', 'provinces_tbl.province_code')
      ->orderBy('id','desc')
      ->get();

       return $result;
   }

   public static function get_areas_by_city_district(){

       $area_array = array();
       $results_area =  DB::table('areas_tbl')->where('status',1)->get();
       if($results_area!=""):
       foreach($results_area as $area):
          $area_name = $area->area_name;
          $area_code = $area->area_code;
          $area_id = $area->id;
          $area_cities_array = array();
          $results_area_cities =  DB::table('areas_cities_tbl')
          ->select('cities_tbl.id','cities_tbl.city_name','areas_cities_tbl.city_code','district_tbl.districts_name')
          ->join('cities_tbl', 'cities_tbl.city_code', '=', 'areas_cities_tbl.city_code')
          ->join('district_tbl', 'cities_tbl.districts_code', '=', 'district_tbl.districts_code')
          ->where('areas_cities_tbl.area_code',$area_code)
          ->get();

          foreach($results_area_cities as $area_cities){
             $city_name = $area_cities->city_name;
             $city_code = $area_cities->city_code;
             $districts_name = $area_cities->districts_name;
             array_push($area_cities_array,array('city_name'=>$city_name,'city_code'=>$city_code,'districts_name'=>$districts_name));
          }

         array_push($area_array,
            array('area'=>array('area_id'=>$area_id,'area_name'=>$area_name,'area_code'=>$area_code),'cities'=>$area_cities_array));
        
      endforeach;
      endif;

      return $area_array;

   }

   public static function get_next_area_code(){

      $area_code_latest = DB::table('areas_tbl')->max('area_code');
      $code_number = explode('AREA', $area_code_latest);  
      ($code_number[1]!=""?$code_number = $code_number[1]: $code_number =0);  

      $pr_id = sprintf("%03d", $code_number+1);
      $next_area_code = 'AREA'.$pr_id; 

      return $next_area_code;

   }

   public static function all_distrcts_cities_for_area(){
    
    $result_district = DB::table('district_tbl')->get(); 
    $all_distrcts_cities = array();
    if($result_district!=""):
    foreach($result_district as $r_district): 
     
      $districts_name = $r_district->districts_name;
      $districts_code =  $r_district->districts_code;
      $results_cities_in_district =  DB::table('cities_tbl')
                                      ->select('cities_tbl.id','cities_tbl.city_name','cities_tbl.city_code') 
                                      ->where('cities_tbl.districts_code',$districts_code)
                                      ->get();
      
      array_push($all_distrcts_cities,array('district'=>array('districts_name'=>$districts_name,'districts_code'=>$districts_code),'cities'=>$results_cities_in_district));
       
      endforeach;
      endif;

     return $all_distrcts_cities; 
   }
        
  
}
