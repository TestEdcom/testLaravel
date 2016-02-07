<?php

 

class CustomHelper {

	// Get Status String (Active/ Deactive)
    public static function getStatus($status) {
    	$status_string ="";
        switch ($status) {
           case '1':
               $status_string = 'Active';
               break;
           
            case '0':
                $status_string = 'Deactive';
               break;
       }
        return $status_string; // 10/27/2014
      // }
   }

   // save User Log Data 
   public static function saveUserLog($userID,$event,$task,$taskID,$date){

   	$data = array (
			'userID'=> $userID,    		
			'event'=> $event, 
			'task'=> $task,
			'taskID'=> $taskID, 
			'date'=> $date
    	   );

   	$i = DB::table('user_log_tbl')->insert($data);
   }

   public static function isLogin(){
      $user_email = Auth::user()->email;
      $user_id = Auth::user()->id;

      if($user_id!="" && $user_email!=""){
        return true;
      }
      return false;
   }
}
?>