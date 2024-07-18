<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//linked with viewusers.inc.php AJAX with select_user.php

//include
include_once '../php-includes/connect.inc.php'; 

function delete_user(){
    

if (isset($_POST['btn_delete_user'])) {   
   
    if (isset($_POST['txt_user_id'])) {
      $var_user_id = $_POST['txt_user_id'];     
    }
    
    
   }
   
        global $db;

        $stmt = $db->prepare("DELETE FROM `cp_users` WHERE `id` = ?");
        $stmt->bind_param('i', $var_user_id);
        $stmt->execute(); 
        $stmt->close();

        
}        
 
 // If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}

    
    ?>
