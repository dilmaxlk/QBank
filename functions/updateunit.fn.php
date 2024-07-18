<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in viewallunits.inc.php

include_once '../php-includes/connect.inc.php'; 


function update_unit(){
 
    if(isset($_POST['btn_edit_unit'])){
        
        
     if (isset($_POST['txt_unit_auto_id'])) {
        $var_uni_id_auto =  $_POST['txt_unit_auto_id'];
    }
     


     if (isset($_POST['txt_unit_id'])) {
      $var_unit_id = $_POST['txt_unit_id'];     
    }


    if (isset($_POST['txt_unit_name'])) {
        $var_unit_name =  $_POST['txt_unit_name'];
    }    
    
    
       global $db;

    //Used a prepared statment to update units to the database..)
    $stmt = $db->prepare("UPDATE cp_units SET  uni_uni_id=?, uni_name=? WHERE `uni_id`='$var_uni_id_auto'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('ss',  $var_unit_id, $var_unit_name);
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