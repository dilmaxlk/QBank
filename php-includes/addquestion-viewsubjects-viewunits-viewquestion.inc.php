<?php


// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];



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
$sql = "SELECT COUNT(que_id) FROM cp_question WHERE `que_subj_id`=$Subject_ID && `que_unit_id`=$Unit_ID";
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
$sql = "SELECT * FROM cp_question WHERE `que_subj_id`=$Subject_ID && `que_unit_id`=$Unit_ID ORDER BY que_id ASC $limit";

$query = mysqli_query($db, $sql);

// This shows the user what page they are on, and the total number of pages
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

$Subj_ID = $_GET[SubjectID];
$Uni_ID = $_GET[UnitID];
$Pap_ID = $_GET[PaperID];

// Establish the $paginationCtrls variable
$paginationCtrls = '<ul class="pagination pagination-sm no-margin">';
 //If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo=1">&laquo;&laquo;</a></li>'
                                 .'<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo=1">&laquo;</a></li>';
                         
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-2; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo='.$i.'">'.$i.'</a></li>';
			}
	    }
    }
    
	// Render the target page number, but without it being a link
	$paginationCtrls .= '<li class="active" ><a href="#">'.$pagenum.'</a></li> ';
        
        
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo='.$i.'">'.$i.'</a></li>';
		if($i >= $pagenum+2){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo='.$next.'">&raquo;</a></li> '
                         .'<li><a href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID='.$Subj_ID.'&UnitID='.$Uni_ID.'&PaperID='.$Pap_ID.'&PageNo='.$last.'">&raquo;&raquo;</a></li>'
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
							<li class="active">View All Questions </li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
                                                    <form class="form-search" action="" method="get">
								<span class="input-icon">
                                                                    <input style="padding-top: 0px; width: 300px;" type="text" placeholder="Search: Use QID or QName" class="nav-search-input" name="SearchKey" value="<?php echo $_GET['SearchKey']; ?>" id="nav-search-input" autocomplete="off" />
                                                                        <a style="margin-bottom: 2px;" type="button" href="index.php?page=AddQuestion-ViewSubjects-viewUnits-viewQuestion&SubjectID=<?php echo $_GET['SubjectID']; ?>&UnitID=<?php echo $_GET['UnitID']; ?>&PaperID=<?php echo $_GET['PaperID']; ?>"  class="btn btn-minier btn-danger"  >View All</a>
									 <input type="hidden" id="page_id" name="page" value="AddQuestion-ViewSubjects-viewUnits-viewQuestion">
                                                                         <input type="hidden" id="subj_id" name="SubjectID" value="<?php echo $_GET['SubjectID']; ?>">
                                                                         <input type="hidden" id="unit_id" name="UnitID" value="<?php echo $_GET['UnitID']; ?>">
                                                                         <input type="hidden" id="paper_id" name="PaperID" value="<?php echo $_GET['PaperID']; ?>">
                                                                         
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
								View All Questions

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="col-xs-12 col-sm-12">
    

<a style="margin-bottom: 10px;" type="button" href="index.php?page=AddQuestion-ViewSubjects-viewUnits&SubjectID=<?php echo $_GET['SubjectID']; ?>&PaperID=<?php echo $_GET['PaperID']; ?>"  class="btn btn-info btn-lg" data-toggle="modal" > << View all Units</a>
<a style="margin-bottom: 10px;" type="button" href="index.php?page=ViewAllPapers"  class="btn btn-success btn-lg">View All Papers</a>
<button style="margin-bottom: 10px;" title="Refresh Paper" class="btn btn-pink" onclick="RefreshPaper()" type="button"  id=""><i class="ace-icon fa fa-refresh icon-only "></i></button>      

<script>
function RefreshPaper() {
  location.reload();
}
</script>
    
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
                        <th>Question ID</th>
                        <th>Question Name</th>
                        <th>Question Type</th>
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
                            <td style=" vertical-align: middle;"><input name="checkbox[]" type="checkbox" style="width:15px; height: 15px; border-radius: 0px;" id="check_list" value="<?php echo $row['que_que_id'];  ?>" <?php echo $checked; ?> /></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_que_id'];  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_short_description']; ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_que_type']; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="View Question" class="btn btn-success view_question_data"  type="button"  id="<?php echo $row['que_id'];  ?>"><i class="ace-icon fa fa-eye fa-3x icon-only "></i></button>      
                             
                             
                            <!-- <a href="functions/addquestiontopaper.php?SubjectID=<?php //echo $_GET['SubjectID']; ?>&UnitID=<?php //echo $_GET['UnitID']; ?>&PaperID=<?php //echo $_GET['PaperID']; ?>&QuestionID=<?php //echo $row['que_que_id']; ?>" title="Add To Question Paper" class="btn btn-primary add_question_to_paper">
                                    <i class="ace-icon fa fa-plus-circle fa-3x icon-only"></i>
                             </a>  -->                            
                            
                             <button title="Add Question to the Paper" class="btn btn-pink view_question_to_paper"  type="button"  id="<?php echo $row['que_que_id'];  ?>"><i class="ace-icon fa fa-plus-circle fa-3x icon-only "></i></button>      
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

                      
                   </tbody>  
                     </table>    

         
     </form>   
    
    
 
 <div style="" class="pull-left" id="pagination_controls"><?php echo $paginationCtrls; ?> </div> 
                 
    <?php 
    
                           } else {
        
        
                      $SearchKey =  $_GET["SearchKey"]; 
                       
                       $sql_2 = "SELECT * FROM cp_question WHERE que_que_id LIKE '%{$SearchKey}%' OR que_short_description LIKE '%{$SearchKey}%' OR que_long_description LIKE '%{$SearchKey}%' OR que_que_type LIKE '%{$SearchKey}%'";
                       $query_2 = mysqli_query($db, $sql_2);
                       
                                                      
        ?> 
 
 
 
 
 
<div class="box-body table-responsive no-padding">
     <form name="myform" action="" method="post">
         <table id="vas_table"  class="table table-hover table-bordered table-responsive">
                         
                         
                    <thead>
                        <tr style="background-color: #629B58; color: white; padding-top: 12px; padding-bottom: 12px;">
                        <th>Question ID</th>
                        <th>Question Name</th>
                        <th>Question Type</th>
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
                         <td style=" vertical-align: middle;"><?php echo $row['que_que_id'];  ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_short_description']; ?></td>
                         <td style=" vertical-align: middle;"><?php echo $row['que_que_type']; ?></td>
                         <td>
                             
                             <!-- "view_data" will use as a class at Ajax request | refer the footer.inc.php file to see the Ajax request -->
                             <button title="View Question" class="btn btn-success btn-sm view_question_data"  type="button"  id="<?php echo $row['que_id'];  ?>"><i class="ace-icon fa fa-eye fa-3x icon-only "></i></button>      
                             
                             
                            <!-- <a href="functions/addquestiontopaper.php?SubjectID=<?php //echo $_GET['SubjectID']; ?>&UnitID=<?php //echo $_GET['UnitID']; ?>&PaperID=<?php //echo $_GET['PaperID']; ?>&QuestionID=<?php //echo $row['que_que_id']; ?>" title="Add To Question Paper" class="btn btn-pink">
                                    <i class="ace-icon fa fa-plus-circle fa-3x icon-only"></i>
                             </a> -->
                             
                             <button title="Add Question to the Paper" class="btn btn-pink view_question_to_paper"  type="button"  id="<?php echo $row['que_que_id'];  ?>"><i class="ace-icon fa fa-plus-circle fa-3x icon-only "></i></button>      
                            
                             
                      <?php
                      
                           }
                           
                      ?>
                         </td>
                      </tr>

                      
                   </tbody>  
                     </table>    

         
     </form>   
    
    
 
 <div style="" class="pull-left" id="pagination_controls"><?php echo $paginationCtrls; ?> </div>  
 
 
<?php

    }

?>
  <!-- Modal Window for display Question Details, this window will appear after the ajax request successful execrated -->    
  <div id="dataModal_Select_question" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Question</h4>  
                </div>  
                <div class="modal-body" id="question_detail">  
                </div>  
                <div class="modal-footer"> 
                    
                     
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>  
           </div>  
      </div>  
 </div> 
   
  
			
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