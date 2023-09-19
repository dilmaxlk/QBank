<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//linked with viewallunits.inc.php

//include
include_once '../php-includes/connect.inc.php'; 



function delete_unit(){
    

if (isset($_POST['btn_delete_unit'])) {   
   
    if (isset($_POST['unit_id'])) {
      $var_unit_id = $_POST['unit_id'];     
    }
    
    
   }
   
        global $db;

        $stmt = $db->prepare("DELETE FROM `cp_units` WHERE `uni_id` = ?");
        $stmt->bind_param('i', $var_unit_id);
        $stmt->execute(); 
        $stmt->close();


        
}        
 
 // If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}

    
    ?>
