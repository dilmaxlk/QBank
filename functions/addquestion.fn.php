<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//Call in viewquestion.inc.php
ob_start();

include_once '../php-includes/connect.inc.php'; 


function add_questions(){
    

 
    if(isset($_POST['btn_add_ques'])){
        
    
   //-------------Add Question ------------------
    
     if (isset($_POST['txt_que_subj_id'])) {
        $var_txt_que_subj_id = $_POST['txt_que_subj_id'];
         
    }       
        
      if (isset($_POST['txt_que_unit_id'])) {
        $var_txt_que_unit_id = $_POST['txt_que_unit_id'];
         
    }   
    
    
    if (isset($_POST['txt_que_id'])) {
        $var_txt_que_id = $_POST['txt_que_id'];
         
    }   

    if (isset($_POST['txt_que_name'])) {
        $var_txt_que_name = $_POST['txt_que_name'];
         
    }   
   
    if (isset($_POST['txt_que_question'])) {
        $var_txt_que_question = $_POST['txt_que_question'];
         
    }

    if (isset($_POST['txt_que_type'])) {
        $var_txt_que_type = $_POST['txt_que_type'];
         
    }
    
       global $db;


    
       
       //Used a prepared statment to add Subjects to the database..)
    $stmt_add_question = $db->prepare("INSERT INTO `cp_question` (que_subj_id, que_unit_id, que_que_id, que_short_description, que_long_description, que_que_type) VALUES (?, ?, ?, ?, ?, ?)" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt_add_question->bind_param('iiisss', $var_txt_que_subj_id, $var_txt_que_unit_id, $var_txt_que_id, $var_txt_que_name, $var_txt_que_question, $var_txt_que_type );
    $stmt_add_question->execute();
    $stmt_add_question->close(); 
    
    
    
    return($stmt_add_question);

     
     
      }
      

     
   }
    
  
  
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>