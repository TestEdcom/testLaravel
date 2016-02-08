<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class SalesPerson_model extends Model {
    public $table = 'salesperson_tbl';
	
  public static function get_all_salesPersons() {            
              $result = DB::table('salesperson_tbl')
             ->where('trash', '!=', '1')   
             ->get();       
             return $result;
  }
  
  public static function get_salesPerson_max_id(){
       $result = DB::table('salesperson_tbl')
              ->max('id');
       return $result;
  }
  
  public static function get_salesPerson_details_by_id($id){
      $_result=DB::table('salesperson_tbl')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_salesPerson($data){
       $_return=DB::table('salesperson_tbl')->insertGetId($data);
       return $_return;
  }
  
  public static function update_salesPerson($id,$data_array){
      $_result=DB::table('salesperson_tbl')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_salesPerson($id){
     $_result= DB::table('salesperson_tbl')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
        
  
}
