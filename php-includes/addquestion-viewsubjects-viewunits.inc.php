<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];





?>

	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
                                                        <li >Papers </li>
							<li class="active">View All Units  </li>
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
								View All Units | Modules

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    

    <a style="margin-bottom: 10px;" type="button" href="index.php?page=AddQuestion-ViewSubjects&PaperID=<?php echo $_GET['PaperID']; ?>"  class="btn btn-info btn-lg" data-toggle="modal" > << View all Subjects</a>
    <a style="margin-bottom: 10px;" type="button" href="index.php?page=ViewAllPapers"  class="btn btn-success btn-lg">View All Papers</a>


    
    
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Units | Modules</h4>

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
                        <tr style="background-color: #d64e7e; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>Unit ID</th>
                        <th>Unit Name</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                        <?php
                            
                            $Subject_ID = $_GET['SubjectID'];
                            
                        
                            //Select the database setting value
                           $stmt_view_units = $db->prepare("SELECT uni_id, uni_subj_id, uni_uni_id, uni_name FROM `cp_units` WHERE `uni_subj_id`=$Subject_ID ");
                           $stmt_view_units->bind_result( $uni_id, $uni_subj_id, $uni_uni_id, $uni_name );
                           $stmt_view_units->execute();

                        
                        
                            // Loop to generate database values to table...       
                           while ($stmt_view_units->fetch()){ 
                        ?>
                    
                        <tr >
                        
                            
                         <td style=" vertical-align: middle;"><?php echo $uni_uni_id;  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $uni_name; ?></td>
                         <td>
                             

                             
                             <a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID=<?php echo $uni_subj_id; ?>&UnitID=<?php echo $uni_id; ?>&PaperID=<?php echo $_GET['PaperID']; ?>" title="View Question" class="btn btn-pink">
                                    <i class="ace-icon fa fa-eye fa-3x icon-only"></i>
                             </a>                              
                            
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

 
                                         


                      <?php //} ?>
                      
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
                    
                    <input  style="" class="btn  btn-success"  type="submit" id="btn_edit_subj" name="btn_delete_subject" value="Delete Subject">   
                     
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>       
  
                 </div>  
      </div>  
 </div>                

 </form>






    
  <!-- Modal Window for display Unit Details, this window will appear after the ajax request successful execrated -->    
 <form id="form_update_unit" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal_Select_unit" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Unit Details</h4>  
                </div>  
                <div class="modal-body" id="unit_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-success"  type="submit" id="btn_edit_unit" name="btn_edit_unit" value="Edit Unit">   
                     
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