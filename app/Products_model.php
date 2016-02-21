<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class Products_model extends Model {
    public $table = 'product_category_tbl';
	
  public static function get_all_product_categories() {            
              $result = DB::table('product_category_tbl') 
             ->orderBy('id','desc')
             ->get();
             return $result;
  }
  
  public static function get_next_cat_code(){

      $cat_code_latest = DB::table('product_category_tbl')->max('p_cat_code');
      $code_number = explode('PCAT', $cat_code_latest);  
      ($code_number[1]!=""?$code_number = $code_number[1]: $code_number =0);  

      $pr_id = sprintf("%03d", $code_number+1);
      $next_cat_code = 'PCAT'.$pr_id; 

      return $next_cat_code;

   } 

   public static function insert_pcategory($data){
       $_return=DB::table('product_category_tbl')->insertGetId($data);
       return $_return;
  }

  public static function update_pcategory($id,$data_array){
     
      $_result=DB::table('product_category_tbl')->where('id',$id)->update($data_array);
      return $_result;
  }

  public static function get_pcategory_details_by_id($id){
      $_result=DB::table('product_category_tbl')
                ->where('id',$id) 
                ->first();
      return $_result;
  }

  public static function delete_pcategory($id){
     $_result= DB::table('product_category_tbl')->where('id',$id)->delete();
     return $_result;
  }
  
}
