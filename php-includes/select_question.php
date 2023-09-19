<?php 

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["question_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database setting value
       $stmt_view_Question = $db->prepare("SELECT que_id, que_subj_id, que_unit_id, que_que_id, que_short_description, que_long_description, que_que_type FROM `cp_question` WHERE que_id = '".$_POST["question_id"]."'");
       $stmt_view_Question->bind_result($que_id, $que_subj_id, $que_unit_id, $que_que_id, $que_short_description, $que_long_description, $que_que_type);
       $stmt_view_Question->execute();      
      
      
       //$connect = mysqli_connect("localhost", "root", "", "testing"); 
      //$query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";  
      //$result = mysqli_query($connect, $query); 
       
              
       
      $output .= ''; 
      
      while ($stmt_view_Question->fetch())  
      {  
           $output .= '  
               
                    <div style="display: none;">
                            <label style="padding-top: 10px;" for="form-field-2">Subject ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_que_subj_id" value="'.$que_subj_id.'" class="form-control limited " readonly>                                 
                    </div>
                    
                     <div style ="display: none;">
                            <label style="padding-top: 10px;" for="form-field-2">Unit ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_que_unit_id" value="'.$que_unit_id.'"  class="form-control limited " readonly>                     </div>
                    
                     <div>
                            <label style="padding-top: 10px;" for="form-field-2">Question ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_que_id" value="'.$que_que_id.'"  class="form-control limited " readonly>                     </div>  
                    
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Question Name</label>
                            <input type="text" id="form-field-3" name="txt_que_name" value="'.$que_short_description.'"  placeholder="" class="form-control limited" required>

                    </div>
                    
                    <div>
                       <label style="padding-top: 10px;" for="form-field-select-1">Question Type</label>
                       <select class="form-control" name="txt_que_type" id="form-field-select-1">
                       
                                <option value="'.$que_que_type.'">'.$que_que_type.'</option>
                                <option value="MCQ">MCQ</option>
                                <option value="Essay">Essay</option>
                       </select>
                    </div> 
                    
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Question</label>
                            <textarea name="txt_selected_que_question" id="editor2" rows="10" cols="80">'.$que_long_description.'</textarea> 
                    </div>                    

            <script>
                // Replace the <textarea id="editor2"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( "txt_selected_que_question" );
            </script>
  
                ';  
      }  
      $output .= "";  
      echo $output;  
 }
 
 ?>
