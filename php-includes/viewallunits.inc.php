<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//linked with addunit.fn.php
$Add_Unit = add_unit();

//linked with updateunit.fn.php
$update_unit = update_unit();

//linked with del_unit.fn.php
$delete_unit = delete_unit();

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
							<li class="active">View All Units </li>
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
    

    <a style="margin-bottom: 10px;" type="button" href="index.php?page=ViewAllSubjects"  class="btn btn-info btn-lg" data-toggle="modal" > << View all Subjects</a>
<button style="margin-bottom: 10px;" type="button" class="btn btn-pink btn-lg" data-toggle="modal" data-target="#myModal_addSubject">Add Unit | Module</button>


<form id="form_add_Subject" role="form" action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div id="myModal_addSubject" class="modal fade" role="dialog">
  <div class="modal-dialog">

      
      
<!-- Modal content | Add New Subject-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Unit | Module </h4>
      </div>
      <div class="modal-body">
          

                    <div style="display: none;">
                    

                        
                            <label style="padding-top: 10px;" for="form-field-2">Subject ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_ui_subj_id" value="<?php echo $_GET['SubjectID']; ?>" class="form-control limited " readonly> 
                    </div>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Unit | Module ID</label>
                            <input type="text" id="form-field-3" name="txt_uni_id" value="" placeholder="" class="form-control limited" required>
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Unit | Module Name</label>
                            <input type="text" id="form-field-3" name="txt_uni_name" placeholder="" class="form-control limited" required>
                    </div>         
 
          <br>
      </div>
      <div class="modal-footer">
          
       <input  style="" class="btn  btn-pink"  type="submit" id="btn_submit_cus" name="btn_add_unit" value="Add Unit | Module">  
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
 <!-- END Modal content | Add New Subject-->
 

 
  </div>
</div>
</form>
    
    
<?php

            $SubjectID = $_GET['SubjectID'];

        // Get total students
        $stmt_Q_count = $db->prepare("SELECT COUNT(que_subj_id) FROM cp_question WHERE `que_subj_id`= $SubjectID");
        $stmt_Q_count->bind_result($TotalQuestions);
        $stmt_Q_count->execute();

        while ($stmt_Q_count->fetch()){


        }

?>    
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Units or Modules | Total Questions: <?php echo $TotalQuestions; ?></h4>

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
                        <th>Unit | Module ID</th>
                        <th>Unit | Module Name</th>
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
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="Edit Unit | Module" class="btn btn-pink btn-sm view_Unit_data"  type="button"  id="<?php echo $uni_id;  ?>"><i class="ace-icon fa fa-pencil fa-2x icon-only "></i></button>      
                             
                             
                             <a href="index.php?page=ViewQuestion&SubjectID=<?php echo $uni_subj_id; ?>&UnitID=<?php echo $uni_id; ?>" title="View Question" class="btn btn-success btn-sm">
                                    <i class="ace-icon fa fa-file-text-o fa-2x icon-only"></i>
                             </a>                              
                            
                             <button title="Delete" class="view_unit_delete_data btn btn-pink btn-sm"  type="button" id="<?php echo $uni_id;  ?>" ><i class="ace-icon fa fa-trash fa-2x icon-only"></i></button> 
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

 
                                         


                      <?php //} ?>
                      
                   </tbody>  
                     </table>    

  <!-- Modal Window for delete unit, this window will appear after the ajax request successful execrated -->    
 <form id="form_delete_unit" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal_delete_unit" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Delete Unit | Module</h4>  
                </div>  
                <div class="modal-body" id="unit_delete_detail">  
                </div>  

                             
          
                 <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-pink"  type="submit" id="submit_unit_delete" name="btn_delete_unit" value="Delete Unit">   
                     
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
                     <h4 class="modal-title">Unit | Module Details</h4>  
                </div>  
                <div class="modal-body" id="unit_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-pink"  type="submit" id="btn_edit_unit" name="btn_edit_unit" value="Edit Unit | Module">   
                     
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