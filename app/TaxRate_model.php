<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class TaxRate_model extends Model {
    public $table = 'tax_rates';
	
  public static function get_all_taxrates() {            
              $result = DB::table('tax_rates')
             ->where('trash', '!=', '1') 
             ->orderBy('id','desc')
             ->get();
             return $result;
  }
  
  public static function get_taxrate_details_by_id($id){
      $_result=DB::table('tax_rates')
                ->where('id',$id)
                ->where('trash', '!=', '1')
                ->first();
      return $_result;
  }
  
  public static function insert_taxrate($data){
       $_return=DB::table('tax_rates')->insertGetId($data);
       return $_return;
  }
  
  public static function update_taxrate($id,$data_array){
      $_result=DB::table('tax_rates')->where('id',$id)->update($data_array);
      return $_result;
  }
  
  public static function delete_taxrate($id){
     $_result= DB::table('tax_rates')->where('id',$id)->update(array('trash'=>'1'));
     return $_result;
  }
        
  
}
