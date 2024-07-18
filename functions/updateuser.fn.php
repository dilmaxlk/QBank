<?php

 // Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];  
        
        
//Call in viewallunits.inc.php

include_once '../php-includes/connect.inc.php'; 


function update_user(){
    
    global $db;
 
    if(isset($_POST['btn_edit_user'])){
        
        
    //-------------Update User------------------
    
    if (isset($_POST['txt_user_id'])) {
        $var_txt_user_id = $_POST['txt_user_id'];
    }
    
    if (isset($_POST['txt_user_name'])) {
    $var_txt_user_name = $_POST['txt_user_name'];
    }
    
//---------Password------------------------------        
        
    if(empty($_POST['txt_password'])){
 
        
        $stmt2 = $db->prepare("SELECT id, password FROM `cp_users` WHERE id = '$var_txt_user_id' ");
        $stmt2->bind_result($Uid, $password);
        $stmt2->execute();



        while ($stmt2->fetch()){ 
            
          $var_AU_Pass = $password; 
            
        } 
 
        
    } else {
        
        $var_AU_Pass = sha1($_POST['txt_password']);
    }
    
 
//---------Password------------------------------ 
    

    if (isset($_POST['txt_f_name'])) {
        $var_txt_f_name = $_POST['txt_f_name'];
    }
    
 
    if (isset($_POST['txt_l_name'])) {
    $var_txt_l_name = $_POST['txt_l_name'];
    }
    
    
    
       global $db;

    //Used a prepared statment to update units to the database..)
    $stmt = $db->prepare("UPDATE cp_users SET  username=?, password=?, firstname=?, lastname=? WHERE `id`='$var_txt_user_id'" );
    //i - integer / d - double / s - string / b - BLOB
    $stmt->bind_param('ssss',  $var_txt_user_name, $var_AU_Pass, $var_txt_f_name, $var_txt_l_name );
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