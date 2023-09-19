<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//Call in viewquestion.inc.php
ob_start();

include_once '../php-includes/connect.inc.php'; 




   


        
    
   //-------------Add Question to paper------------------
    
     if (isset($_GET['SubjectID'])) {
        $var_txt_subj_id = $_GET['SubjectID'];
         
    }       
        
      if (isset($_GET['UnitID'])) {
        $var_txt_unit_id = $_GET['UnitID'];
         
    }   
    
    
    if (isset($_GET['PaperID'])) {
        $var_txt_PaperID = $_GET['PaperID'];
         
    }   

    if (isset($_GET['QuestionID'])) {
        $var_txt_QuestionID = $_GET['QuestionID'];
         
    }  
    
    
    
    $stmt1 = $db->prepare("SELECT COUNT(que_d_question_order)  FROM `cp_question_details` WHERE `que_d_paper_id`= $var_txt_PaperID ORDER BY que_d_question_order DESC");
    $stmt1->bind_result($cp_question_details);
    $stmt1->execute();
    

    
    while ($stmt1->fetch()){ 
        
        
        
    }
    
    $order_rank = $cp_question_details + 01;
   


    
       global $db;


    
       
       //Used a prepared statment to add Subjects to the database..)
    $stmt_add_question = $db->prepare("INSERT INTO `cp_question_details` (que_d_paper_id, que_d_subj_id, que_d_unit_id, que_d_question_id, que_d_question_order) VALUES (?, ?, ?, ?, ?)" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt_add_question->bind_param('iiiis', $var_txt_PaperID, $var_txt_subj_id, $var_txt_unit_id, $var_txt_QuestionID, $order_rank );
    $stmt_add_question->execute();
    $stmt_add_question->close(); 
    
    
    
    //return($stmt_add_question);

 header('Location: ../index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID=' .$var_txt_subj_id. '&UnitID=' .$var_txt_unit_id.' &PaperID=' .$var_txt_PaperID );     
     
      
      

     
   
    
  
  
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>