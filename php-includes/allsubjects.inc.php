<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//linked with addsubject.fn.php
$Add_Subject = add_subject();

//linked with updatesubject.fn.php
$update_subject = update_subject();

//linked with del_subject.fn.php
$delete_subject = delete_subject();


?>

	<div class="main-content">
            
            <?php 
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
                                                        <li >Subjects </li>
							<li class="active">View All Subjects </li>
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
								View Subjects
		
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    
<button style="margin-bottom: 10px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_addSubject">Add Subject</button>
     
<form id="form_add_Subject" role="form" action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div id="myModal_addSubject" class="modal fade" role="dialog">
  <div class="modal-dialog">

      
      
<!-- Modal content | Add New Subject-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Subject</h4>
      </div>
      <div class="modal-body">
          

          <div style="display: none;">
                    
                    <?php
                    
                        $RNuber = rand(1000,10000);
                    
                    ?>
                        
                            <label style="padding-top: 10px; " for="form-field-2">Subject ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_subj_id" value="<?php echo $RNuber; ?>" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Subject Name</label>
                            <input type="text" id="form-field-3" name="txt_subj_name" placeholder="" class="form-control limited ">
                    </div>         
 
          <br>
      </div>
      <div class="modal-footer">
          
       <input  style="" class="btn  btn-success"  type="submit" id="btn_submit_cus" name="btn_add_subject" value="Add Subject">  
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
 <!-- END Modal content | Add New Subject-->
 
 
 
  </div>
</div>
</form>
    
    
<?php

         

        // Get total questions
        $stmt_Q_count = $db->prepare("SELECT COUNT(que_id) FROM cp_question");
        $stmt_Q_count->bind_result($TotalQuestions);
        $stmt_Q_count->execute();

        while ($stmt_Q_count->fetch()){


        }

?>     
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Subjects | Total Questions: <?php echo $TotalQuestions; ?> </h4>

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
                        <th style="display: none;" >Subject ID</th>
                        <th>Subject Name</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                            //Select the database setting value
                           $stmt_view_subjects = $db->prepare("SELECT sub_sub_id, sub_name FROM `cp_subjects` ");
                           $stmt_view_subjects->bind_result($sub_sub_id, $sub_name );
                           $stmt_view_subjects->execute();

                        
                        
                            // Loop to generate database values to table...       
                           while ($stmt_view_subjects->fetch()){ 
                        ?>
                    
                        <tr >
                        
                            
                         <td style=" vertical-align: middle; display: none;"><?php echo $sub_sub_id;  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $sub_name; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="Edit Subject" class="btn btn-info btn-sm view_data"  type="button"  id="<?php echo $sub_sub_id;  ?>"><i class="ace-icon fa fa-pencil fa-2x icon-only "></i></button>      
                             
                             
                             <a href="index.php?page=ViewAllUnits&SubjectID=<?php echo $sub_sub_id;  ?>" title="Add Unites" class="btn btn-pink btn-sm">
                                    <i class="ace-icon fa fa-calendar-check-o fa-2x icon-only"></i>
                             </a>                              
                            
                             <button title="Delete" class="view_subject_delete_data btn btn-danger btn-sm"  type="button" id="<?php echo $sub_sub_id;  ?>" ><i class="ace-icon fa fa-trash fa-2x icon-only"></i></button> 
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

 
                                         


                  
                      
                   </tbody>  
                     </table>    

  <!-- Modal Window for delete Subject, this window will appear after the ajax request successful execrated -->    
 <form id="form_delete_Subject" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal_delete_subj" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Delete Subject</h4>  
                </div>  
                <div class="modal-body" id="subject_delete_detail">  
                </div>  

                             
          
                 <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-success" id="submit_delete" type="submit" id="btn_edit_subj" name="btn_delete_subject" value="Delete Subject">   
                     
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>       
  
                 </div>  
      </div>  
 </div>                

 </form>






    
  <!-- Modal Window for display Subject Details, this window will appear after the ajax request successful execrated -->    
 <form id="form_update_Subject" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Subject Details</h4>  
                </div>  
                <div class="modal-body" id="subject_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-success"  type="submit" id="btn_edit_subj" name="btn_edit_subject" value="Edit Subject">   
                     
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