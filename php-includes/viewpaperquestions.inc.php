<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//linked with addquestion.fn.php
$Change_q_order = change_q_order();

//linked with updatequestion.fn.php
//$Update_Question = update_questions();



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
    
$Paper_ID = $_GET['PaperID'];
//$Unit_ID = $_GET['UnitID'];
                            
                            
// This first query is just to get the total count of rows
$sql = "SELECT COUNT(que_d_paper_id) FROM cp_question_details WHERE `que_d_paper_id`= $Paper_ID";
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

// This is your query again , it is for grabbing just one page worth of rows by applying $limit                                                                                                                                                                                                                                                                                                                                                                                                 // ORDER BY CAST will fix the number order
$sql = "SELECT cp_question_details.id, cp_question_details.que_d_paper_id, cp_question_details.que_d_subj_id, cp_question_details.que_d_unit_id, cp_question_details.que_d_question_id, cp_question_details.que_d_question_order, cp_question.que_que_id, cp_question.que_short_description, cp_question.que_long_description  FROM `cp_question_details` INNER JOIN `cp_question` ON cp_question_details.que_d_question_id=cp_question.que_que_id  WHERE `que_d_paper_id`= $Paper_ID ORDER BY CAST(que_d_question_order as unsigned) ASC $limit";

$query = mysqli_query($db, $sql);

// This shows the user what page they are on, and the total number of pages
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

$PP_id = $_GET[PaperID];


// Establish the $paginationCtrls variable
$paginationCtrls = '<ul class="pagination pagination-sm no-margin">';
 //If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo=1">&laquo;&laquo;</a></li>'
                                 .'<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo=1">&laquo;</a></li>';
                         
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-2; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo='.$i.'">'.$i.'</a></li>';
			}
	    }
    }
    
	// Render the target page number, but without it being a link
	$paginationCtrls .= '<li class="active" ><a href="#">'.$pagenum.'</a></li> ';
        
        
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo='.$i.'">'.$i.'</a></li>';
		if($i >= $pagenum+2){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo='.$next.'">&raquo;</a></li> '
                         .'<li><a href="index.php?page=ViewPaperQuestions&PaperID='.$PP_id.'&PageNo='.$last.'">&raquo;&raquo;</a></li>'
                         .'</ul>';
    }
}
    




 
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
							<li class="active">Paper Questions </li>
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
								Paper Questions

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    

<a style="margin-bottom: 10px;" type="button" href="index.php?page=ViewAllPapers"  class="btn btn-info btn-lg" data-toggle="modal" > << View all Papers</a>
<a style="margin-bottom: 10px;" target="_blank" type="button" href="php-includes/viewpaper.php?PaperID=<?php echo $_GET['PaperID']; ?>"  class="btn btn-pink btn-lg"  >Generate Paper</a>


<form id="form_add_Subject" role="form" action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div id="myModal_addSubject" class="modal fade" role="dialog">
  <div class="modal-dialog">

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
                        <h4 class="widget-title">All Questions</h4>
                        <p style="color: red; font-size: 16px;">NOTE: Please click the [Generate Paper] button to see the final Question paper, if the structure is OK, you can go ahead and print the Question paper, or if 
                            you need to edit the layout of the paper you can copy the entire paper and paste into MS word document or Google Docs.
                            <br>
                            අවසාන ප්‍රශ්න පත්‍රය බැලීමට කරුණාකර [Generate Paper] බොත්තම ක්ලික් කරන්න, ව්‍යුහය හරි නම්, ඔබට ඉදිරියට ගොස් ප්‍රශ්න පත්‍රය මුද්‍රණය කළ හැකිය, නැතහොත් ඔබට පත්‍රයේ පිරිසැලසුම සංස්කරණය කිරීමට අවශ්‍ය නම්, ඔබට සම්පූර්ණ පත්‍රය පිටපත් කළ හැකිය. 
                            MS word document හෝ Google Docs වෙත අලවන්න.                          
                            
                        </p>  
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
    <form name="myform2" action="" method="post">  
         <table id="vas_table"  class="table table-hover table-bordered table-responsive">
                         
                         
                    <thead>
                        <tr style="background-color: #629B58; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>Select</th> 
                         <th>Question Order</th>
                        <th>Question ID</th>
                        <th>Question Name</th>

                      </tr>
                    </thead>
                    <tbody>
    
                        <?php
                            
                        
                            // Loop to generate database values to table...       
                           while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                           {
                               
                               
                            //==================Auto Rank Start=========================  
                            
                            // break statement at the end has no effect since you are doing echo on top.
                            if ($rank == 10000)break; 

                            // If same total will skip $rank++
                            if($row['id'] != $previous)$rank++;



                            // Current row student's total 
                            $previous = $row['id'];
                            
                            //==================Auto Rank End=========================
                            
                            
                        ?>
                    
                        <tr >
                        
                         <td style=" vertical-align: middle;"><input name="checkbox[]" type="checkbox" style="width:15px; height: 15px; border-radius: 0px;" id="check_list" value="<?php echo $row['id'] ?>" /></td>   
                         <td style=" vertical-align: middle;">0<?php echo $rank ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_d_question_id'];  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_short_description']; ?></td>
                      </tr>

  

  
    
                      <?php
                      
                           }
                           
                      ?>

                    
                      
                         </tbody>                           
 </table>          
                       

                                   
    </form>     

 
                    <div style="" class="pull-left" id="pagination_controls"><?php echo $paginationCtrls; ?> </div> 
                 
                    <input title="Delete All" style=" " id="swalt" type="button" class="btn btn-danger pull-right fa fa-times-circle fa-2x" name="delete"  value="&#xf057" onClick="setDeleteAction();">
                    <input title="Uncheck All" style=" "type="button" class="btn btn-success pull-right fa fa-square fa-2x " name="Un_CheckAll" value="&#xf0c8" onClick="UnCheckAll(document.myform2.check_list)">  
                    <input title="Check All" style="" type="button" class="btn btn-primary pull-right fa fa-times-circle fa-2x" name="Check_All" value="&#xf14a" onClick="CheckAll(document.myform2.check_list)">
                                
                              
                                

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
                                    swal({   title: "Are you sure?",   text: "Do you want to delete these Questions ?",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete them all!",   cancelButtonText: "No, No.. Cancel Please!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  document.myform2.action = "functions/deletepaperquestions.php?page=ViewPaperQuestions&PaperID=<?php echo $_GET['PaperID']; ?>";  document.myform2.submit(); } else {     swal("Cancelled", "Your Questions are safe :)", "error");   } });
                                   
                                    };

                                 
                                    </script>


                                    
                                    
                                    
               





   
                                                                                
			
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