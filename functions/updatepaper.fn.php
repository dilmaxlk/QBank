<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in viewallunits.inc.php

include_once '../php-includes/connect.inc.php'; 


function update_paper(){
 
    if(isset($_POST['btn_edit_paper'])){
        
//-------------Edit Question ------------------
    
    if (isset($_POST['txt_pp_paper_id'])) {
        $var_txt_pp_paper_id = $_POST['txt_pp_paper_id'];
         
    }       
        
      if (isset($_POST['txt_pp_paper_name'])) {
        $var_txt_pp_paper_name = $_POST['txt_pp_paper_name'];
         
    }   
    
    
    if (isset($_POST['txt_pp_question_paper_exam_name'])) {
        $var_txt_pp_question_paper_exam_name = $_POST['txt_pp_question_paper_exam_name'];
         
    }   

    if (isset($_POST['txt_pp_question_paper_date'])) {
        $var_txt_pp_question_paper_date = $_POST['txt_pp_question_paper_date'];
         
    }   
   
    if (isset($_POST['txt_pp_question_paper_time'])) {
        $var_txt_pp_question_paper_time = $_POST['txt_pp_question_paper_time'];
         
    }

    if (isset($_POST['txt_pp_question_paper_subj_name'])) {
        $var_txt_pp_question_paper_subj = $_POST['txt_pp_question_paper_subj_name'];
         
    }
    
    if (isset($_POST['txt_pp_question_paper_grade'])) {
        $var_txt_pp_question_paper_grade = $_POST['txt_pp_question_paper_grade'];
         
    }  
    
    
    if (isset($_POST['txt_pp_question_paper_note'])) {
        $var_txt_pp_question_paper_note = $_POST['txt_pp_question_paper_note'];
         
    } 


    
       global $db;
       
       

    //Used a prepared statment to update questions to the database..)
    $stmt = $db->prepare("UPDATE cp_papers SET pp_paper_name=?, pp_question_paper_date=?, pp_question_paper_time=?, pp_question_paper_exam_name=?, pp_question_paper_subj_name=?, pp_question_paper_grade=?, pp_question_paper_note=? WHERE `cp_paper_id`='$var_txt_pp_paper_id'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('sssssss',  $var_txt_pp_paper_name, $var_txt_pp_question_paper_date, $var_txt_pp_question_paper_time, $var_txt_pp_question_paper_exam_name, $var_txt_pp_question_paper_subj, $var_txt_pp_question_paper_grade, $var_txt_pp_question_paper_note );
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