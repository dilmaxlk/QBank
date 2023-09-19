<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in viewallunits.inc.php

include_once '../php-includes/connect.inc.php'; 


function change_q_order(){
 
    if(isset($_POST['btn_change_q_order'])){
        
//-------------Edit Question ------------------
    
//     if (isset($_POST['txt_p_id'])) {
//        $var_txt_p_id = $_POST['txt_p_id'];
//         
//    }        
      
    
      if (isset($_POST['txt_q_id'])) {
        $var_txt_q_id = $_POST['txt_q_id'];
         
    } 
    
    
        
     if (isset($_POST['txt_ch_que_order'])) {
        $var_txt_change_q_order = $_POST['txt_ch_que_order'];
         
    }       
        




    
       global $db;
       
       

    //Used a prepared statment to update questions to the database..)
    $stmt = $db->prepare("UPDATE cp_question_details SET que_d_question_order=? WHERE `id`='$var_txt_q_id'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('s',  $var_txt_change_q_order);
    $stmt->execute();
    $stmt->close(); 
    

    
    return($stmt);
    
    
      }
      
   }
    
  
    
 // If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
?>