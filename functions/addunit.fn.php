<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//Call in viewallunits.inc.php
ob_start();

include_once '../php-includes/connect.inc.php'; 


function add_unit(){
    

 
    if(isset($_POST['btn_add_unit'])){
        
    
   //-------------Add Subject ------------------
    
    if (isset($_POST['txt_ui_subj_id'])) {
        $var_txt_ui_subj_id = $_POST['txt_ui_subj_id'];
         
    }   

    if (isset($_POST['txt_uni_id'])) {
        $var_txt_uni_id = $_POST['txt_uni_id'];
         
    }   
   
    if (isset($_POST['txt_uni_name'])) {
        $var_txt_uni_name = $_POST['txt_uni_name'];
         
    } 
    
       global $db;


    
       
       //Used a prepared statment to add Subjects to the database..)
    $stmt_add_unit = $db->prepare("INSERT INTO `cp_units` (uni_subj_id, uni_uni_id, uni_name) VALUES (?, ?, ?)" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt_add_unit->bind_param('iss', $var_txt_ui_subj_id, $var_txt_uni_id, $var_txt_uni_name );
    $stmt_add_unit->execute();
    $stmt_add_unit->close(); 
    
    
    
    return($stmt_add_unit);

     
     
      }
      

     
   }
    
  
  
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>