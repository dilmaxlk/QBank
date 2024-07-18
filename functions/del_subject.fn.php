<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//linked with allsubjects.inc.php

//include
include_once '../php-includes/connect.inc.php'; 

function delete_subject(){
    

if (isset($_POST['btn_delete_subject'])) {   
   
    if (isset($_POST['subj_id'])) {
      $var_subj_id = $_POST['subj_id'];     
    }
    
    
   }
   
        global $db;

        $stmt = $db->prepare("DELETE FROM `cp_subjects` WHERE `sub_sub_id` = ?");
        $stmt->bind_param('i', $var_subj_id);
        $stmt->execute(); 
        $stmt->close();

        
}        
 
 // If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}

    
    ?>
