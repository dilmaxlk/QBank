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
							<li class="active">View Subjects  </li>
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
     
    <a style="margin-bottom: 10px;" type="button" href="index.php?page=ViewAllPapers"  class="btn btn-info btn-lg" data-toggle="modal" > << View all Papers</a>
    
    
    
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Subjects</h4>

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
                             
                             
                             <a href="index.php?page=AddQuestion-ViewSubjects-viewUnits&SubjectID=<?php echo $sub_sub_id;  ?>&PaperID=<?php echo $_GET['PaperID']; ?>" title="View Unites" class="btn btn-info">
                                    <i class="ace-icon fa fa-eye  fa-3x icon-only"></i>
                             </a>                              
                            
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

 
                                         


                      <?php //} ?>
                      
                   </tbody>  
                     </table>    
   
                                                                                
			
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