<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];




//includes Files
include_once 'php-includes/connect.inc.php';
include_once 'php-includes/header.inc.php';
include_once 'php-includes/topnav.inc.php';
include_once 'php-includes/get-var.inc.php';
include_once 'php-includes/sidebarleft.inc.php'; 



// Function Files
include_once 'functions/addsubject.fn.php';
include_once 'functions/updatesubject.fn.php';
include_once 'functions/del_subject.fn.php';
include_once 'functions/addunit.fn.php';
include_once 'functions/updateunit.fn.php';
include_once 'functions/addquestion.fn.php';
include_once 'functions/updatequestion.fn.php'; 
include_once 'functions/addpaper.fn.php';
include_once 'functions/updatequestion.fn.php';
include_once 'functions/change_q_order.fn.php';
include_once 'functions/del_unit.fn.php';
include_once 'functions/updatepaper.fn.php';
include_once 'functions/adduser.fn.php';
include_once 'functions/updateuser.fn.php';
include_once 'functions/loading_indicator.fn.php';
include_once 'functions/del_user.fn.php';



//This will link the pages
if ($page == "ViewAllSubjects"){
     require_once 'php-includes/allsubjects.inc.php'; 
}  else {
    if ($page == "ViewAllPapers"){
     require_once 'php-includes/viewallpapers.inc.php'; 
} else {
    if ($page == "AddQuestion-ViewSubjects"){
     require_once 'php-includes/addquestion-viewsubjects.inc.php'; 
} else {
     if ($page == "ViewAllUnits"){
     require_once 'php-includes/viewallunits.inc.php';  
} else {
     if ($page == "ViewQuestion"){
     require_once 'php-includes/viewquestion.inc.php';  
} else {
      if ($page == "AddQuestion-ViewSubjects-viewUnits"){
     require_once 'php-includes/addquestion-viewsubjects-viewunits.inc.php'; 
} else {
      if ($page == "AddQuestion-ViewSubjects-viewUnits-viewQuestion"){
     require_once 'php-includes/addquestion-viewsubjects-viewunits-viewquestion.inc.php';
} else {
      if ($page == "ViewPaperQuestions"){
     require_once 'php-includes/viewpaperquestions.inc.php';    
} else {
      if ($page == "ViewUsers"){
     require_once 'php-includes/viewusers.inc.php';  
} else {
       if ($page == "Help"){
     require_once 'php-includes/help.inc.php';  
}
}
}
}    
}
}
}
}
}
}




// If session isn't meet, user will redirect to login page
} else { 
    header('Location: login.php');
}


?>





<?php
// Page Footer
include_once 'php-includes/footer.inc.php';

?>