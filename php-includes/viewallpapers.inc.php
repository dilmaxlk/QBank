<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//linked with addpaper.fn.php
$Add_paper = add_paper();

//linked with updatepaper.fn.php
$Update_Paper = update_paper();



    // If the value is set form POST request to $ShowRecords1, that value will update on the database...
     if (isset($_POST["shorec"])){
   $ShowRecords1 = $_POST["shorec"];



     // Update the database from selected value
     $stmt2 = $db->prepare("UPDATE cp_settings SET showrecords=? WHERE `setting_id`=1 ");
     $stmt2->bind_param('i',$ShowRecords1);
     $stmt2->execute(); 
     //$stmt->close();

   }
   
?>


<?php
    

global $db;

                   
     //Select the database "setting" value and Set that value to $ShowRecords1 to genarate the records...
    $stmt1 = $db->prepare("SELECT showrecords FROM `cp_settings` WHERE `setting_id`=1 ");
    $stmt1->bind_result($ShowRecords1);
    $stmt1->execute();
    

    
    while ($stmt1->fetch()){ 
        
    }   
    
$Subject_ID = $_GET['SubjectID'];
$Unit_ID = $_GET['UnitID'];
                            
                            
// This first query is just to get the total count of rows
$sql = "SELECT COUNT(pp_id) FROM cp_papers ";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_row($query);

// Here we have the total row count
$rows = $row[0];

// This is the number of results we want displayed per page, $ShowRecords1 select form database "setting" table...
$page_rows = $ShowRecords1;

// This tells us the page number of our last page
$last = ceil($rows/$page_rows);

// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}

// Establish the $pagenum variable (Page Numbers)
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['PageNo'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['PageNo']);
}

// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}

// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

// This is your query again , it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT * FROM cp_papers ORDER BY pp_id ASC $limit";

$query = mysqli_query($db, $sql);

// This shows the user what page they are on, and the total number of pages
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

$Subj_ID = $_GET[SubjectID];
$Uni_ID = $_GET[UnitID];

// Establish the $paginationCtrls variable
$paginationCtrls = '<ul class="pagination pagination-sm no-margin">';
 //If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<li><a href="index.php?page=ViewAllPapers&PageNo=1">&laquo;&laquo;</a></li>'
                                 .'<li><a href="index.php?page=ViewAllPapers&PageNo=1">&laquo;</a></li>';
                         
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-2; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li><a href="index.php?page=ViewAllPapers&PageNo='.$i.'">'.$i.'</a></li>';
			}
	    }
    }
    
	// Render the target page number, but without it being a link
	$paginationCtrls .= '<li class="active" ><a href="#">'.$pagenum.'</a></li> ';
        
        
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li><a href="index.php?page=ViewAllPapers&PageNo='.$i.'">'.$i.'</a></li>';
		if($i >= $pagenum+2){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li><a href="index.php?page=ViewAllPapers&PageNo='.$next.'">&raquo;</a></li> '
                         .'<li><a href="index.php?page=ViewAllPapers&PageNo='.$last.'">&raquo;&raquo;</a></li>'
                         .'</ul>';
    }
}
    




 
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
                                                        <li >Papers </li>
							<li class="active">View All Papers </li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
                                                    <form class="form-search" action="" method="get">
								<span class="input-icon">
                                                                    <input style="padding-top: 0px; width: 300px;" type="text" placeholder="Search: use PID or PName" class="nav-search-input" name="SearchKey" value="<?php echo $_GET['SearchKey']; ?>" id="nav-search-input" autocomplete="off" />
                                                                        <a style="margin-bottom: 2px;" type="button" href="index.php?page=ViewAllPapers"  class="btn btn-minier btn-danger"  >View All</a>
									 <input type="hidden" id="page_id" name="page" value="ViewAllPapers">
                                                                         
                                                                        <i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
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
								View All Papers
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    

<button style="margin-bottom: 10px;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal_addSubject">Add Paper</button>


<form id="form_add_Subject" role="form" action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div id="myModal_addSubject" class="modal fade" role="dialog">
  <div class="modal-dialog">


          
      
<!-- Modal content | Add New Paper-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Paper</h4>
      </div>
      <div class="modal-body">
          
                            <?php 
                                    $RNuber = rand(1000,100000);
                                    $date = date("Ym");
                                    $pp_id = $date + $RNuber; 
                            ?>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Paper ID</label>
                            <input type="text" id="form-field-2" placeholder="" name="txt_pp_paper_id" value="<?php echo $pp_id; ?>" class="form-control limited " readonly> 
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-2">Paper Name </label>
                            <input type="text" id="form-field-2" placeholder="(for your reference | ඔබගේ යොමු සටහන් සඳහා පමණි )" name="txt_pp_paper_name" value="" class="form-control limited " > 
                    </div>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Display Exam Name </label>
                            <input type="text" id="form-field-2" placeholder="(Ex: අපොස සමන්‍ය පෙළ)" name="txt_pp_question_paper_exam_name" value="" class="form-control limited " > 
                    </div>          

                    <div>
                            <label style="padding-top: 10px;" for="form-field-2">Subject Name </label>
                            <input type="text" id="form-field-2" placeholder="(Ex: තොරතුරු හා සන්නිවේදන තාක්ෂණය - 1)" name="txt_pp_question_paper_subj_name" value="" class="form-control limited " > 
                    </div> 

                     <div>
                            <label style="padding-top: 10px;" for="form-field-2">Grade </label>
                            <input type="text" id="form-field-2" placeholder="(Ex: ශේණිය 11)" name="txt_pp_question_paper_grade" value="ශේණිය" class="form-control limited " > 
                    </div> 
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Question Paper Date</label>
                            <input type="date" id="form-field-3" name="txt_pp_question_paper_date" value="" placeholder="" class="form-control limited" >
                    </div>
          
                    <div>
                            <label style="padding-top: 10px;" for="form-field-3">Time (කාලය පැය 03 | විනාඩි 45)</label>
                            <input type="text" id="form-field-3" name="txt_pp_question_paper_time" value="කාලය පැය" placeholder="" class="form-control limited" >
                    </div>
          
                     <div>
                            <label style="padding-top: 10px;" for="form-field-3">Notes</label>
                            <textarea class="form-control" name="txt_pp_question_paper_note" id="form-field-8"  placeholder="">
>> සියලුම ප්‍රශ්නවලට පිළිතුරු සපයන්න.
>> අංක 1 - 40 තෙක් ප්‍රශ්න සදහා දී ඇති  (1),(2),(3),(4) පිළිතුරුවලින් නිවැරදි / වඩාත් ගැලපෙන පිළිතුර තෝරන්න.
                            </textarea>
                    </div>     
          
          
      
           
  

          <br>
      </div>
      <div class="modal-footer">
          
       <input  style="" class="btn  btn-success"  type="submit" id="btn_submit_cus" name="btn_add_paper" value="Add Paper">  
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
 <!-- END Modal content | Add New Paper-->
 

 
  </div>
</div>
</form>
    
             <!-- Paging Text -->   
             <div><?php echo $textline2; ?></div>   
            <form class="form-inline" method="POST" action="">  
                
                   <div class="form-group">
                     <input style="margin-bottom: 10px;" class="btn btn-sm btn-success" type="submit" value="Show" onclick="" name="submit" />                   
                      <div class="input-group">                     
                          <select style="margin-bottom: 10px;" name="shorec" class="form-control input-sm">
                          
                          <?php
                          
                            //Select the database setting value
                           $stmt = $db->prepare("SELECT showrecords FROM `cp_settings` WHERE `setting_id`=1 ");
                           $stmt->bind_result($ShowRecords1);
                           $stmt->execute();

                           
                           
                           while ($stmt->fetch()){ 
                               
                          
                          
                          ?>
                                <option><?php echo $ShowRecords1; ?></option> 
                        
                            <?php
                             }
                            ?>
                        
                        <option>5</option>
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                        <option>250</option>
                        <option>500</option>
                        <option>1000</option>
                        <option>2500</option>
                        <option>5000</option>
                      </select>
                          

                      </div>
                       
                   </div>

                    
               </form>         
        
             <!-- Paging Text  END -->      
    
    <div class="widget-box">
        <div class="widget-header">
                        <h4 class="widget-title">All Papers</h4>

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


<?php

 if(!isset($_GET["SearchKey"])){ 
     
 
 ?>
                                    
<div class="box-body table-responsive no-padding">
     <form name="myform" action="" method="post">
         <table id="vas_table"  class="table table-hover table-bordered table-responsive">
                         
                         
                    <thead>
                        <tr style="background-color: #629B58; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>Select</th> 
                        <th>Paper ID</th>
                        <th>Paper Name</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                        <?php
                            
             
                            // Loop to generate database values to table...       
                           while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                           {
                        ?>
                    
                        <tr >
                        
                         <td style=" vertical-align: middle;"><input name="checkbox[]" type="checkbox" style="width:15px; height: 15px; border-radius: 0px;" id="check_list" value="<?php echo $row['pp_id'] ?>" />
</td>   
                         <td style=" vertical-align: middle;"><?php echo $row['cp_paper_id'];  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['pp_paper_name']; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="Edit Paper" class="btn btn-info btn-sm view_paper_data"  type="button"  id="<?php echo $row['cp_paper_id'];  ?>"><i class="ace-icon fa fa-pencil fa-3x icon-only "></i></button>      
                             
                             
                             <a href="index.php?page=AddQuestion-ViewSubjects&PaperID=<?php echo $row['cp_paper_id'];  ?>" title="Add Questions to the paper" class="btn btn-success btn-sm">
                                    <i class="ace-icon fa fa-plus-circle fa-3x icon-only"></i>
                             </a> 
                             
                             <a  href="index.php?page=ViewPaperQuestions&PaperID=<?php echo $row['cp_paper_id']; ?>" title="View All Questions and Generate the paper" class="btn btn-danger btn-sm ">
                                    <i class="ace-icon fa fa-eye fa-3x icon-only"></i>
                             </a>                           
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>
                   </tbody>  
                     </table>    

         
     </form>   
    
    
 
                    <div style="" class="pull-left" id="pagination_controls"><?php echo $paginationCtrls; ?> </div> 
                 
                    <input title="Delete All" style=" " id="swalt" type="button" class="btn btn-danger pull-right fa fa-times-circle fa-2x" name="delete"  value="&#xf057" onClick="setDeleteAction();">
                    <input title="Uncheck All" style=" "type="button" class="btn btn-success pull-right fa fa-square fa-2x " name="Un_CheckAll" value="&#xf0c8" onClick="UnCheckAll(document.myform.check_list)">  
                    <input title="Check All" style="" type="button" class="btn btn-primary pull-right fa fa-times-circle fa-2x" name="Check_All" value="&#xf14a" onClick="CheckAll(document.myform.check_list)">
                                
                               
                                

			<SCRIPT LANGUAGE="JavaScript">
                                    <!-- 
                                    function CheckAll(chk)
                                    {
                                    for (i = 0; i < chk.length; i++)
                                    chk[i].checked = true ;
                                    }

                                    function UnCheckAll(chk)
                                    {
                                    for (i = 0; i < chk.length; i++)
                                    chk[i].checked = false ;
                                    }
                                    // End -->
                                    
                                    //Sweet Alert Class (linked with head)
                                    document.querySelector('#swalt').onclick = function setDeleteAction(){
                                    swal({   title: "Are you sure?",   text: "Do you want to delete these Question Papers ?",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete them all!",   cancelButtonText: "No, No.. Cancel Please!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  document.myform.action = "functions/deletepapers.php?page=ViewAllPapers";  document.myform.submit(); } else {     swal("Cancelled", "Your Papers are safe :)", "error");   } });
                                   
                                    };

                                 
                                    </script>


<?php } else {                                   

                      $SearchKey =  $_GET["SearchKey"]; 
                       
                       $sql_2 = "SELECT * FROM cp_papers WHERE cp_paper_id LIKE '%{$SearchKey}%' OR pp_paper_name LIKE '%{$SearchKey}%' OR pp_question_paper_exam_name LIKE '%{$SearchKey}%'";
                       $query_2 = mysqli_query($db, $sql_2);
                       
                       
?>
    
                                    
                                    
<div class="box-body table-responsive no-padding">
     <form name="myform" action="" method="post">
         <table id="vas_table"  class="table table-hover table-bordered table-responsive">
                         
                         
                    <thead>
                        <tr style="background-color: #629B58; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>Select</th> 
                        <th>Paper ID</th>
                        <th>Paper Name</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                        <?php
                            

                        
                            // Loop to generate database values to table...       
                           while($row = mysqli_fetch_array($query_2, MYSQLI_ASSOC))
                           {
                        ?>
                    
                        <tr >
                        
                         <td style=" vertical-align: middle;"><input name="checkbox[]" type="checkbox" style="width:15px; height: 15px; border-radius: 0px;" id="check_list" value="<?php echo $row['pp_id'] ?>" />
</td>   
                         <td style=" vertical-align: middle;"><?php echo $row['cp_paper_id'];  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['pp_paper_name']; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="Edit Paper" class="btn btn-info btn-sm view_question_data"  type="button"  id="<?php echo $row['que_id'];  ?>"><i class="ace-icon fa fa-pencil fa-2x icon-only "></i></button>      
                             
                             
                             <a href="index.php?page=AddQuestion-ViewSubjects&PaperID=<?php echo $row['cp_paper_id'];  ?>" title="Add Questions" class="btn btn-success btn-sm">
                                    <i class="ace-icon fa fa-plus-circle fa-2x icon-only"></i>
                             </a> 
                             
                              <a href="index.php?page=ViewPaperQuestions&PaperID=<?php echo $row['cp_paper_id']; ?>" title="View All Questions" class="btn btn-danger btn-sm">
                                    <i class="ace-icon fa fa-eye fa-2x icon-only"></i>
                             </a>                           
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

                   </tbody>  
                     </table>    

         
     </form>   
    
    
 
                
                 
                    <input title="Delete All" style=" " id="swalt" type="button" class="btn btn-danger pull-right fa fa-times-circle fa-2x" name="delete"  value="&#xf057" onClick="setDeleteAction();">
                    <input title="Uncheck All" style=" "type="button" class="btn btn-success pull-right fa fa-square fa-2x " name="Un_CheckAll" value="&#xf0c8" onClick="UnCheckAll(document.myform.check_list)">  
                    <input title="Check All" style="" type="button" class="btn btn-primary pull-right fa fa-times-circle fa-2x" name="Check_All" value="&#xf14a" onClick="CheckAll(document.myform.check_list)">
                                
                               
                                

			<SCRIPT LANGUAGE="JavaScript">
                                    <!-- 
                                    function CheckAll(chk)
                                    {
                                    for (i = 0; i < chk.length; i++)
                                    chk[i].checked = true ;
                                    }

                                    function UnCheckAll(chk)
                                    {
                                    for (i = 0; i < chk.length; i++)
                                    chk[i].checked = false ;
                                    }
                                    // End -->
                                    
                                    //Sweet Alert Class (linked with head)
                                    document.querySelector('#swalt').onclick = function setDeleteAction(){
                                    swal({   title: "Are you sure?",   text: "Do you want to delete these Question papers ?",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete them all!",   cancelButtonText: "No, No.. Cancel Please!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  document.myform.action = "functions/deletepapers.php?page=ViewAllPapers";  document.myform.submit(); } else {     swal("Cancelled", "Your papers are safe :)", "error");   } });
                                   
                                    };

                                 
                                    </script>                                    
                                    
                                    
                                    
                                    
                                    
       
<?php

   }
?>
    
  <!-- Modal Window for display paper Details, this window will appear after the ajax request successful execrated -->    
 <form id="form_update_paper" role="form" action="" method="post" enctype="multipart/form-data" > 
  <div id="dataModal_Select_paper" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Paper</h4>  
                </div>  
                <div class="modal-body" id="paper_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                    <input  style="" class="btn  btn-success"  type="submit" id="btn_edit_paper" name="btn_edit_paper" value="Save">   
                     
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