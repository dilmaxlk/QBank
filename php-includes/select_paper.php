<?php 

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["paper_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database setting value
       $stmt_view_paper = $db->prepare("SELECT pp_id, cp_paper_id, pp_paper_name, pp_question_id, pp_question_paper_date, pp_question_paper_time, pp_question_paper_exam_name, pp_question_paper_subj_name, pp_question_paper_grade, pp_question_paper_note FROM `cp_papers` WHERE cp_paper_id = '".$_POST["paper_id"]."'");
       $stmt_view_paper->bind_result($pp_id, $cp_paper_id, $pp_paper_name, $pp_question_id, $pp_question_paper_date, $pp_question_paper_time, $pp_question_paper_exam_name, $pp_question_paper_subj_name, $pp_question_paper_grade, $pp_question_paper_note);
       $stmt_view_paper->execute();      
      
      
       //$connect = mysqli_connect("localhost", "root", "", "testing"); 
      //$query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";  
      //$result = mysqli_query($connect, $query); 
       

       
      $output .= ''; 
      
      while ($stmt_view_paper->fetch())  
      {  
           $output .= '  
               
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Paper ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_pp_paper_id" value="'.$cp_paper_id.'" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-2">Paper Name </label>
                            <input type="text" id="form-field-2" placeholder="(for your reference | ඔබගේ යොමු සටහන් සඳහා පමණි )" name="txt_pp_paper_name" value="'.$pp_paper_name.'" class="form-control limited " > 
                    </div>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Display Exam Name </label>
                            <input type="text" id="form-field-2" placeholder="(Ex: අපොස සමන්‍ය පෙළ)" name="txt_pp_question_paper_exam_name" value="'.$pp_question_paper_exam_name.'" class="form-control limited " > 
                    </div> 
                    
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Subject Name </label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_pp_question_paper_subj_name" value="'.$pp_question_paper_subj_name.'" class="form-control limited " > 
                    </div>

                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Grade </label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_pp_question_paper_grade" value="'.$pp_question_paper_grade.'" class="form-control limited " > 
                    </div>
                    

                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Question Paper Date</label>
                            <input type="date" id="form-field-3" name="txt_pp_question_paper_date" value="'.$pp_question_paper_date.'" placeholder="" class="form-control limited" >
                    </div>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Time</label>
                            <input type="text" id="form-field-3" name="txt_pp_question_paper_time" value="'.$pp_question_paper_time.'" placeholder="(කාලය පැය 03 | විනාඩි 45)" class="form-control limited" >
                    </div>  
                    
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Notes</label>
                            <textarea class="form-control" name="txt_pp_question_paper_note" id="form-field-8"  placeholder="">'.$pp_question_paper_note.'</textarea>
                    </div> 


  
                ';  
      }  
      $output .= "";  
      echo $output;  
 }
 
 ?>
