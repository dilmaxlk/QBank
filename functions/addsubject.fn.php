<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//Call in allsubjects.inc.php
ob_start();

include_once '../php-includes/connect.inc.php'; 


function add_subject(){
    

 
    if(isset($_POST['btn_add_subject'])){
        
    
   //-------------Add Subject ------------------
    
    if (isset($_POST['txt_subj_id'])) {
        $var_txt_subj_id = $_POST['txt_subj_id'];
         
    }   

    if (isset($_POST['txt_subj_name'])) {
        $var_txt_subj_name = $_POST['txt_subj_name'];
         
    }   
   
    
       global $db;


    
       
       //Used a prepared statment to add Subjects to the database..)
    $stmt_add_subject = $db->prepare("INSERT INTO `cp_subjects` (sub_sub_id, sub_name) VALUES (?, ?)" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt_add_subject->bind_param('is', $var_txt_subj_id, $var_txt_subj_name );
    $stmt_add_subject->execute();
    $stmt_add_subject->close(); 
    
    
    
    return($stmt_add_subject);

     
     
      }
      

     
   }
    
  
  
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>