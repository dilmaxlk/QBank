<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in viewallunits.inc.php

include_once '../php-includes/connect.inc.php'; 


function update_questions(){
 
    if(isset($_POST['btn_edit_question'])){
        
//-------------Edit Question ------------------
    
     if (isset($_POST['txt_que_id'])) {
        $var_txt_que_id = $_POST['txt_que_id'];
         
    }       
        


    if (isset($_POST['txt_que_name'])) {
        $var_txt_que_name = $_POST['txt_que_name'];
         
    }
    
   
    if (isset($_POST['txt_selected_que_question'])) {
        $var_txt_selected_que_question = $_POST['txt_selected_que_question'];
         
    }

    if (isset($_POST['txt_que_type'])) {
        $var_txt_que_type = $_POST['txt_que_type'];
         
    }
    
       global $db;
       
       

    //Used a prepared statment to update questions to the database..)
    $stmt = $db->prepare("UPDATE cp_question SET  que_short_description=?, que_long_description=?, que_que_type=? WHERE `que_que_id`='$var_txt_que_id'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('sss',  $var_txt_que_name, $var_txt_selected_que_question, $var_txt_que_type);
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