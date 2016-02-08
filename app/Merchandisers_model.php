<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class Merchandisers_model extends Model {
    public $table = 'merchandiser';
	
  public static function get_all_merchandisers() {            
              $result = DB::table('merchandiser')
             ->where('trash', '!=', '1')
             ->orderby('id','DESC')         
             ->get();       
             return $result;
  }
  
  public static function get_merchandiser_max_id(){
       $result = DB::table('merchandiser')
              ->max('id');
       return $result;
  }
  
  public static function get_merchandiser_details_by_id($id){
      $_result=DB::table('merchandiser')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_merchandiser($data){
       $_return=DB::table('merchandiser')->insertGetId($data);
       return $_return;
  }
  
  public static function update_merchandiser($id,$data_array){
      $_result=DB::table('merchandiser')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_merchandiser($id){
     $_result= DB::table('merchandiser')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
  
  public static function check_merchandiser_is_exist($id,$name){
      $_result=DB::table('merchandiser')
             ->where('id', '!=', $id)
             ->where('name', '=', $name)
             ->first();
      return $_result; 
  }
        
  
}
