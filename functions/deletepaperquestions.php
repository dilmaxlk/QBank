<?php
// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//linked with viewallquestions.inc.php
        
        
include_once '../php-includes/connect.inc.php'; 

//Select multi recodes

 if(isset($_GET["SearchKey"])){
    
//     $rowCount = count($_POST["checkbox"]);
//
//            for($i=0;$i<$rowCount;$i++) {
//                
//
//            //Delete Student
//            $stmt = $db2->prepare("DELETE FROM cp_question WHERE que_id='" . $_POST["checkbox"][$i] . "'");
//            $stmt->execute();      
//            $stmt->close();
//
//
//
//
//            }
//            

// We get page number to redirect the user to the same records page that the user entered..
//$SearchKey = $_GET["SearchKey"];

$SubjectID = $_GET['SubjectID'];
$UnitID = $_GET['UnitID'];

//Jump to the same page after deleteing the image
//header('Location: ../index.php?page=ViewQuestion&SearchKey='.$SearchKey.'&SubjectID='.$SubjectID.'&UnitID='.$UnitID); 

 } else {
     
$rowCount = count($_POST["checkbox"]);

            for($i=0;$i<$rowCount;$i++) {

            
            $stmt = $db->prepare("DELETE FROM cp_question_details WHERE id='" . $_POST["checkbox"][$i] . "'");
            $stmt->execute(); 
            $stmt->close();




            }
            

// We get page number to redirect the user to the same records page that the user entered..
//$PNo = $_GET["PageNo"];

$PaperID = $_GET['PaperID'];


//Jump to the same page after deleteing the image
header('Location: ../index.php?page=ViewPaperQuestions&PaperID='.$PaperID); 

     
 }




// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


?>