<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in allsubjects.inc.php

include_once '../php-includes/connect.inc.php'; 


function update_subject(){
 
    if(isset($_POST['btn_edit_subject'])){
        
 
     
     if (isset($_POST['txt_subj_id'])) {
      $var_subj_id = $_POST['txt_subj_id'];     
    }


    if (isset($_POST['txt_subj_name'])) {
        $var_subj_name =  $_POST['txt_subj_name'];
    }
    
    
    
    
       global $db;

    //Used a prepared statment to update subject to the database..)
    $stmt = $db->prepare("UPDATE cp_subjects SET sub_sub_id=?, sub_name=? WHERE `sub_sub_id`='$var_subj_id'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('is', $var_subj_id, $var_subj_name);
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