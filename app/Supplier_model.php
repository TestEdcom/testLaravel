<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class Supplier_model extends Model {
    public $table = 'suppliers_tbl';
	
  public static function get_all_suppliers() {            
              $result = DB::table('suppliers_tbl')
             ->where('trash', '!=', '1')   
             ->get();       
             return $result;
  }
  
  public static function get_supplier_max_id(){
       $result = DB::table('suppliers_tbl')
              ->max('id');
       return $result;
  }
  
  public static function get_supplier_details_by_id($id){
      $_result=DB::table('suppliers_tbl')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_supplier($data){
       $_return=DB::table('suppliers_tbl')->insertGetId($data);
       return $_return;
  }
  
  public static function update_supplier($id,$data_array){
      $_result=DB::table('suppliers_tbl')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_supplier($id){
     $_result= DB::table('suppliers_tbl')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
        
  
}
