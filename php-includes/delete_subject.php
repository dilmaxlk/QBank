<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["subject_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database values, and compare both tables with LEFT JOIN.
       $stmt_view_subjects = $db->prepare("SELECT cp_subjects.sub_sub_id, cp_units.uni_subj_id  FROM `cp_subjects` LEFT JOIN `cp_units` ON cp_subjects.sub_sub_id = cp_units.uni_subj_id WHERE cp_subjects.sub_sub_id = '".$_POST["subject_id"]."' LIMIT 1" );
       $stmt_view_subjects->bind_result($sub_sub_id, $uni_subj_id );
       $stmt_view_subjects->execute();      
      
            
       //bellow Statment will delete subject. 
       // Before delete, it will check, associated units of the subject, if units are avelable, you can't delete.
       //Delete buttton will disable.
       while ($stmt_view_subjects->fetch()) {

           
           if($sub_sub_id == $uni_subj_id){
              
               $output .= '
                Sorry, you can NOT delete this subject, because there are some units associated with this Subject. If you need to delete, first you need to delete units.
                
                
                <script>
                  document.getElementById("submit_delete").disabled = true;
                </script>

                ';
     
        // if not, you can delete the subject.      
        } else {
               
              $output .= '
                Do you want to DELETE this subject ??
                <input type="hidden" id="sub_id" name="subj_id" value="'.$sub_sub_id.'">
                    

                <script>
                  document.getElementById("submit_delete").disabled = false;
                </script>
                
                ';
        }
        
         
       
     }     
           
       
       
            
               
           
 echo $output;  
     

      
// Get the value as a hidden html object <input type="hidden"      
//      while ($stmt_view_subjects->fetch())  
//      {  
//           $output .= '  
//               
//                    <div>
//                        Do you want to delete '.$sub_name.' ?
//                    </div>
//                    
//                     <input type="hidden" id="sub_id" name="subj_id" value="'.$sub_sub_id.'">
//         
//                ';  
//      }  
 //$output .= "";  
      

 }
 
  
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: ../login.php');
}


    
    
    
?>