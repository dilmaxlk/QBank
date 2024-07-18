<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//linked with adduser.fn.php
$Add_User = add_user();

//linked with updatesubject.fn.php
$update_user = update_user();

//linked with del_user.fn.php
$delete_users = delete_user();


?>

	<div class="main-content">
            
            <?php 
                //Loding indocator, link with loading_indicator.fn.php
                $loadNow = Loading_indicator(); 
                echo $loadNow;
            ?>             <?php 
                //Loding indocator, link with loading_indicator.fn.php
                $loadNow = Loading_indicator(); 
                echo $loadNow;
            ?>             
            
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
                                                        <li >Users </li>
							<li class="active">View All Users </li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						
                                            
                                            
                                            
                                            <div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<?php 
                                                        
                                                            //This is Small right side Toglling Menu
                                                            include_once 'php-includes/rightmenu.inc.php'; 
                                                        
                                                        ?>
						</div><!-- /.ace-settings-container -->

                                                
                                                
                                                
						<div class="page-header">
							<h1>
								View All Users
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    
<button style="margin-bottom: 10px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_addUser">Add User</button>
     
<form id="form_add_Subject" role="form" action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div id="myModal_addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

      
      
<!-- Modal content | Add New User-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New User</h4>
      </div>
      <div class="modal-body">
          

                    <div>
                    
                    <?php
                    
                        $RNuber = rand(1000,10000);
                    
                    ?>
                        
                            <label style="padding-top: 10px;" for="form-field-2">User ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_user_id" value="<?php echo $RNuber; ?>" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">First Name</label>
                            <input type="text" id="form-field-3" name="txt_f_name" placeholder="" class="form-control limited ">
                    </div>         
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Last Name</label>
                            <input type="text" id="form-field-3" name="txt_l_name" placeholder="" class="form-control limited ">
                    </div> 
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Username</label>
                            <input type="text" id="form-field-3" name="txt_user_name" placeholder="" class="form-control limited ">
                    </div> 
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Password</label>
                            <input type="password" id="form-field-3" name="txt_password" placeholder="" class="form-control limited ">
                    </div> 
          
          
          <br>
      </div>
      <div class="modal-footer">
          
       <input  style="" class="btn  btn-success"  type="submit" id="btn_submit_cus" name="btn_add_user" value="Add User">  
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
 <!-- END Modal content | Add New Subject-->
 
 
 
  </div>
</div>
</form>
    
    
    
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Users</h4>

                        <div class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                </a>

                                <a href="#" data-action="close">
                                        <i class="ace-icon fa fa-times"></i>
                                </a>
                        </div>
                </div>

                <div class="widget-body">
                        <div class="widget-main">
                                <div>
                                                                                                                    
<div class="box-body table-responsive no-padding">
  <table id="vas_table" class="table table-hover table-bordered table-responsive">
                         
                         
                    <thead>
                        <tr style="background-color: #6fb3e0; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                            //Select the database setting value
                           $stmt_view_users = $db->prepare("SELECT id, firstname, lastname FROM `cp_users` ");
                           $stmt_view_users->bind_result($id, $firstname, $lastname );
                           $stmt_view_users->execute();

                        
                        
                            // Loop to generate database values to table...       
                           while ($stmt_view_users->fetch()){ 
                        ?>
                    
                        <tr >
                        
                            
                         <td style=" vertical-align: middle;"><?php echo $id;  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $firstname .' '. $lastname; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="Edit Subject" class="btn btn-info btn-sm view_data"  type="button"  id="<?php echo $id;  ?>"><i class="ace-icon fa fa-pencil fa-2x icon-only "></i></button>      
                                                         
                            
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

 
                                         


                  
                      
                   </tbody>  
                     </table>    








    
  <!-- Modal Window for display User Details, this window will appear after the ajax request successful execrated -->    
 <form id="form_edit_user" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal_select_user" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit User</h4>  
                </div>  
                <div class="modal-body" id="user_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                    
                    <input  style="" class="btn  btn-success"  type="submit" id="btn_edit_subj" name="btn_edit_user" value="Edit User">   
                     
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>  
           </div>  
      </div>  
 </div> 
 </form>    
                                                                                
			
                    </div>
            </div>
    </div>

    </div>                                                             
                                                                
                            <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div>
    </div><!-- /.main-content -->


<?php
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: login.php');
}



?>