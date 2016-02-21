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


   // product sizes

  public static function get_all_product_sizes() {            
              $result = DB::table('product_size_tbl') 
             ->orderBy('id','desc')
             ->get();
             return $result;
  }
  
  public static function get_next_psize_code(){

      $size_code_latest = DB::table('product_size_tbl')->max('p_size_code');
      $code_number = explode('PSIZE', $size_code_latest);  
      ($code_number[1]!=""?$code_number = $code_number[1]: $code_number =0);  

      $pr_id = sprintf("%03d", $code_number+1);
      $next_size_code = 'PSIZE'.$pr_id; 

      return $next_size_code;

   } 

   public static function insert_psize($data){
       $_return=DB::table('product_size_tbl')->insertGetId($data);
       return $_return;
  }

  public static function get_psizes_details_by_id($id){
      $_result=DB::table('product_size_tbl')
                ->where('id',$id) 
                ->first();
      return $_result;
  }

  public static function update_psizes($id,$data_array){
     
      $_result=DB::table('product_size_tbl')->where('id',$id)->update($data_array);
      return $_result;
  }

  public static function delete_psize($id){
     $_result= DB::table('product_size_tbl')->where('id',$id)->delete();
     return $_result;
  }
  
  public static function get_next_product_code(){

      $product_code_latest = DB::table('products_master_tbl')->max('product_code');
      $code_number = explode('PROD', $product_code_latest);
      ($code_number[1]!=""?$code_number = $code_number[1]: $code_number =0);  

      $pr_id = sprintf("%03d", $code_number+1);
      $next_product_code = 'PROD'.$pr_id; 

      return $next_product_code;

   } 

   public static function get_all_merchandizer(){
       $result = DB::table('merchandiser') 
             ->orderBy('id','desc')
             ->get();
             return $result;
   }

   public static function insert_product($data){
       $_return=DB::table('products_master_tbl')->insertGetId($data);
       return $_return;
  }
   
  
}
