<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class Payment_model extends Model {
    public $table = 'payment_method';
	
  public static function get_all_payment_methods() {            
              $result = DB::table('payment_method')
             ->where('trash', '!=', '1')
             ->orderby('id','DESC')         
             ->get();       
             return $result;
  }
  
  public static function get_payment_method_max_id(){
       $result = DB::table('payment_method')
              ->max('id');
       return $result;
  }
  
  public static function get_payment_method_details_by_id($id){
      $_result=DB::table('payment_method')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_payment_method($data){
       $_return=DB::table('payment_method')->insertGetId($data);
       return $_return;
  }
  
  public static function update_payment_method($id,$data_array){
      $_result=DB::table('payment_method')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_payment_method($id){
     $_result= DB::table('payment_method')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
  
  public static function check_payment_method_is_exist($id,$name){
      $_result=DB::table('payment_method')
             ->where('id', '!=', $id)
             ->where('payment_name', '=', $name)
             ->first();
      return $_result; 
  }
        
  
}
