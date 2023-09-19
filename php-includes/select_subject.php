<?php 

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["subject_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database setting value
       $stmt_view_subjects = $db->prepare("SELECT sub_sub_id, sub_name FROM `cp_subjects` WHERE sub_sub_id = '".$_POST["subject_id"]."'");
       $stmt_view_subjects->bind_result($sub_sub_id, $sub_name );
       $stmt_view_subjects->execute();      
      
      
       //$connect = mysqli_connect("localhost", "root", "", "testing"); 
      //$query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";  
      //$result = mysqli_query($connect, $query); 
       
       
       
      $output .= ''; 
      
      while ($stmt_view_subjects->fetch())  
      {  
           $output .= '  
               
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Subject ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_subj_id" value="'.$sub_sub_id.'" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Subject Name</label>
                            <input type="text" id="form-field-3" name="txt_subj_name"  value="'.$sub_name.'" class="form-control limited ">
                    </div> 
                    

                    
  
                ';  
      }  
      $output .= "";  
      echo $output;  
 }
 
 ?>
