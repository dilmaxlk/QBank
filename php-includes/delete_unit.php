<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
        

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["unit_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database values, and compare both tables with LEFT JOIN.
       $stmt_delete_unit = $db->prepare("SELECT cp_units.uni_id, cp_question.que_unit_id  FROM `cp_units` LEFT JOIN `cp_question` ON cp_units.uni_id = cp_question.que_unit_id WHERE cp_units.uni_id = '".$_POST["unit_id"]."' LIMIT 1" );
       $stmt_delete_unit->bind_result($uni_id, $que_unit_id );
       $stmt_delete_unit->execute();      
      
            
       //bellow Statment will delete Unit. 
       // Before delete, it will check, associated questions of the unit, if questions are avelable, you can't delete.
       //Delete buttton will disable.
       while ($stmt_delete_unit->fetch()) {

           
           if($uni_id == $que_unit_id){
              
               $output .= '
                Sorry, you can NOT delete this unit, because there are some questions associated with this unit. If you need to delete, first you need to delete questions.
                
                
                <script>
                  document.getElementById("submit_unit_delete").disabled = true;
                </script>

                ';
     
        // if not, you can delete the Unit.      
        } else {
               
              $output .= '
                Do you want to DELETE this Unit ??
                <input type="hidden" id="unit_id" name="unit_id" value="'.$uni_id.'">
                    

                <script>
                  document.getElementById("submit_unit_delete").disabled = false;
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