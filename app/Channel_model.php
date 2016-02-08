<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class Channel_model extends Model {
    public $table = 'channel';
	
  public static function get_all_channels() {            
              $result = DB::table('channel')
             ->where('trash', '!=', '1')   
             ->get();       
             return $result;
  }
  
  public static function get_channel_max_id(){
       $result = DB::table('channel')
              ->max('id');
       return $result;
  }
  
  public static function get_channel_details_by_id($id){
      $_result=DB::table('channel')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_channel($data){
       $_return=DB::table('channel')->insertGetId($data);
       return $_return;
  }
  
  public static function update_channel($id,$data_array){
      $_result=DB::table('channel')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_channel($id){
     $_result= DB::table('channel')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
  
  public static function check_channel_is_exist($id,$name){
      $_result=DB::table('channel')
             ->where('id', '!=', $id)
             ->where('name', '=', $name)
             ->first();
      return $_result; 
  }
  
}
