<?php 

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["unit_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database setting value
       $stmt_view_Unit = $db->prepare("SELECT uni_id, uni_subj_id, uni_uni_id, uni_name FROM `cp_units` WHERE uni_id = '".$_POST["unit_id"]."'");
       $stmt_view_Unit->bind_result($uni_id, $uni_subj_id, $uni_uni_id, $uni_name );
       $stmt_view_Unit->execute();      
      
      
       //$connect = mysqli_connect("localhost", "root", "", "testing"); 
      //$query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";  
      //$result = mysqli_query($connect, $query); 
       
       
       
      $output .= ''; 
      
      while ($stmt_view_Unit->fetch())  
      {  
           $output .= '  
               
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Subject ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_subj_id" value="'.$uni_subj_id.'" class="form-control limited " readonly> 
                    </div>
                    
                     <div style="display: none;">
                            <label style="padding-top: 10px;" for="form-field-2">Unit ID (AUTO)</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_unit_auto_id" value="'.$uni_id.'" class="form-control limited " readonly> 
                    </div>
                    
                     <div>
                            <label style="padding-top: 10px;" for="form-field-2">Unit | Module ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_unit_id" value="'.$uni_uni_id.'" class="form-control limited "> 
                    </div>  
                    
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Unit | Module Name</label>
                            <input type="text" id="form-field-3" name="txt_unit_name"  value="'.$uni_name.'" class="form-control limited ">
                    </div> 
                    

                    
  
                ';  
      }  
      $output .= "";  
      echo $output;  
 }
 
 ?>
