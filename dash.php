<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];


//includes Files
include_once 'php-includes/connect.inc.php';
include_once 'php-includes/header.inc.php';
include_once 'php-includes/topnav.inc.php';
include_once 'php-includes/get-var.inc.php';
include_once 'php-includes/sidebarleft.inc.php'; 



// Function Files
include_once 'functions/addsubject.fn.php';
include_once 'functions/updatesubject.fn.php';
include_once 'functions/del_subject.fn.php';
include_once 'functions/addunit.fn.php';
include_once 'functions/updateunit.fn.php';
include_once 'functions/addquestion.fn.php';
include_once 'functions/updatequestion.fn.php'; 
include_once 'functions/addpaper.fn.php';
include_once 'functions/updatequestion.fn.php';
include_once 'functions/change_q_order.fn.php';
include_once 'functions/del_unit.fn.php';
include_once 'functions/updatepaper.fn.php';
include_once 'functions/adduser.fn.php';
include_once 'functions/updateuser.fn.php';


//This will link the pages
if ($page == "ViewAllSubjects"){
     require_once 'php-includes/allsubjects.inc.php'; 
}  else {
    if ($page == "ViewAllPapers"){
     require_once 'php-includes/viewallpapers.inc.php'; 
} else {
    if ($page == "AddQuestion-ViewSubjects"){
     require_once 'php-includes/addquestion-viewsubjects.inc.php'; 
} else {
     if ($page == "ViewAllUnits"){
     require_once 'php-includes/viewallunits.inc.php';  
} else {
     if ($page == "ViewQuestion"){
     require_once 'php-includes/viewquestion.inc.php';  
} else {
      if ($page == "AddQuestion-ViewSubjects-viewUnits"){
     require_once 'php-includes/addquestion-viewsubjects-viewunits.inc.php'; 
} else {
      if ($page == "AddQuestion-ViewSubjects-viewUnits-viewQuestion"){
     require_once 'php-includes/addquestion-viewsubjects-viewunits-viewquestion.inc.php';
} else {
      if ($page == "ViewPaperQuestions"){
     require_once 'php-includes/viewpaperquestions.inc.php';    
} else {
      if ($page == "ViewUsers"){
     require_once 'php-includes/viewusers.inc.php';  
} else {
       if ($page == "Help"){
     require_once 'php-includes/help.inc.php';  
}
}
}
}    
}
}
}
}
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
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						   <div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<?php 
                                                        
                                                            include_once 'php-includes/rightmenu.inc.php'; 
                                                        
                                                        ?>
						</div><!-- /.ace-settings-container -->
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->



                                                                
                                                                
                                                                
                                                                

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

// Page Footer
include_once 'php-includes/footer.inc.php';


?>