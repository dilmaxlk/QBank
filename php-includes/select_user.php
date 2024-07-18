<?php 

include_once '../php-includes/connect.inc.php'; 

 if(isset($_POST["user_id"]))  
 { 
     
      global $db;
         
      $output = '';  


        //Select the database setting value
       $stmt_view_user = $db->prepare("SELECT id, username, password, firstname, lastname FROM `cp_users` WHERE id = '".$_POST["user_id"]."'");
       $stmt_view_user->bind_result($id, $username, $password, $firstname, $lastname);
       $stmt_view_user->execute();      
      
       
      $output .= ''; 
      
      while ($stmt_view_user->fetch())  
      {  
           $output .= '  
               
                    <div>
                                           
                            <label style="padding-top: 10px;" for="form-field-2">User ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_user_id" value="'.$id.'" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">First Name</label>
                            <input type="text" id="form-field-3" name="txt_f_name" placeholder="" value="'.$firstname.'" class="form-control limited ">
                    </div>         
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Last Name</label>
                            <input type="text" id="form-field-3" name="txt_l_name" placeholder="" value="'.$lastname.'" class="form-control limited ">
                    </div> 
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Username</label>
                            <input type="text" id="form-field-3" name="txt_user_name" placeholder="" value="'.$username.'" class="form-control limited ">
                    </div> 
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Password</label>
                            <input type="password" id="form-field-3" name="txt_password" placeholder="Keep empty, if you do not want to change." value="" class="form-control limited ">
                    </div> 
                     <div style="padding-top: 30px; float: left;">
                     <input type="hidden" id="form-field-2" placeholder="" name="txt_user_id" value="'.$id.'" class="form-control limited " readonly>
                     <input title="Delete this user" class="del_user btn btn-danger btn-sm" name="btn_delete_user" value="Delete User"  type="submit" id="del_user" >
                    </div>                    
                    
  

 

                ';  
      }  
      $output .= "";  
      echo $output;  
 }
 
 ?>
