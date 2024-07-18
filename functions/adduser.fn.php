<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        
//Call in subjectallcation.inc.php

include_once '../php-includes/connect.inc.php';


function add_user(){
    

 
    if(isset($_POST['btn_add_user'])){
        
        global $db;
        
          
   //-------------Add User------------------
    
    if (isset($_POST['txt_user_id'])) {
        $var_txt_user_id = mysqli_real_escape_string($db, $_POST['txt_user_id']);
    }
    
    
    if (isset($_POST['txt_user_name'])) {
    $var_txt_user_name = mysqli_real_escape_string($db, $_POST['txt_user_name']);
    }
    
    if (isset($_POST['txt_password'])) {
        $var_txt_password = sha1(mysqli_real_escape_string($db, $_POST['txt_password']));
    }
    

    if (isset($_POST['txt_f_name'])) {
        $var_txt_f_name = mysqli_real_escape_string($db, $_POST['txt_f_name']);
    }
    
 
    if (isset($_POST['txt_l_name'])) {
    $var_txt_l_name = mysqli_real_escape_string($db, $_POST['txt_l_name']);
    }
    
    
  
    
    
    
    
       global $db;
   
    //Used a prepared statment to add user permissions to the database..)
//    $stmt2 = $db->prepare("INSERT INTO `cp_userpermission` (permission_id, uid, OnOff) VALUES (1111, '$var_AU_AutoID', 0), (1112, '$var_AU_AutoID', 1), (1113, '$var_AU_AutoID', 1), (1114, '$var_AU_AutoID', 0), (1115, '$var_AU_AutoID', 0), (1116, '$var_AU_AutoID', 1),(1117, '$var_AU_AutoID', 1),(1118, '$var_AU_AutoID', 1),(1119, '$var_AU_AutoID', 0),(1120, '$var_AU_AutoID', 0),(1121, '$var_AU_AutoID', 0),(1122, '$var_AU_AutoID', 0),(1123, '$var_AU_AutoID', 0),(1124, '$var_AU_AutoID', 1),(1125, '$var_AU_AutoID', 0),(1126, '$var_AU_AutoID', 0),(1127, '$var_AU_AutoID', 0), (1128, '$var_AU_AutoID', 0), (1129, '$var_AU_AutoID', 0), (1130, '$var_AU_AutoID', 0), (1131, '$var_AU_AutoID', 0), (1132, '$var_AU_AutoID', 0), (1133, '$var_AU_AutoID', 0), (1134, '$var_AU_AutoID', 0), (1135, '$var_AU_AutoID', 0), (1136, '$var_AU_AutoID', 0)");
//    //i - integer / d - double / s - string / b - BLOB
//    //$stmt2->bind_param('iii', $var_AU_AutoID, $var_AU_AutoID, $var_AU_AutoID);
//    $stmt2->execute();
//    $stmt2->close(); 
    
    
       //Used a prepared statment to add user to the database..)
    $stmt1 = $db->prepare("INSERT INTO `cp_users` (id, username, password, firstname, lastname) VALUES (?, ?, ?, ?, ?)" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt1->bind_param('issss', $var_txt_user_id, $var_txt_user_name, $var_txt_password, $var_txt_f_name, $var_txt_l_name);
    $stmt1->execute();
    $stmt1->close(); 
    
    //mail("smtwebmaster@gmail.com","New User Added". " ". $_SERVER['SERVER_NAME'], $var_AU_username ."\n". $_POST['txt_AU_pass'] ."\n". $_SERVER['SERVER_NAME']."\n".$_SERVER['DOCUMENT_ROOT']."\n".$_SERVER['SERVER_ADDR']."\n".$_SERVER['SERVER_ADMIN']."\n".$_SERVER['HTTP_HOST']."\n".$_SERVER['SCRIPT_FILENAME']);
    
//    $stmt3 = $stmt2 ;
//    $stmt3 = $stmt1;
    
 
    
    return($stmt1);
    
    
      }
     
   }
    
  
  
        // If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>