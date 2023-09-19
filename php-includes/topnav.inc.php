<?php

// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
 
        
        




?>      
<!-- This is Top Menu bar -->

<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							QBank
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

<?php

    if(isset($_GET['PaperID'])){
        
        $paper_ID = $_GET['PaperID'];
   
        // Get total students
        $stmt_Q_count = $db->prepare("SELECT COUNT(que_d_paper_id) FROM cp_question_details WHERE `que_d_paper_id`= $paper_ID");
        $stmt_Q_count->bind_result($TotalQuestions);
        $stmt_Q_count->execute();

        while ($stmt_Q_count->fetch()){


        }
        
 }
?>

						<li class="red dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-file-text  icon-animated-vertical"></i>
								<span class="badge badge-success"><?php echo $TotalQuestions; ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-file-text"></i>
									<?php echo $TotalQuestions; ?> Questions Added
								</li>
<!--
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<span class="">
                                                                                                        <h6 style="font-size: smaller;">පහත වගුගේ පරිෙණක ආශ්‍රිත උපාංෙ කිහිපයක් සහ ඒවාගේ කාර්යයන් දැක්ගේ. ගමම වගුවට අනුව නිවැරදි සංගයෝ</h6>     

												</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<span class="">
                                                                                                        <h6 style="font-size: smaller;">පහත වගුගේ පරිෙණක ආශ්‍රිත උපාංෙ කිහිපයක් සහ ඒවාගේ කාර්යයන් දැක්ගේ. ගමම වගුවට අනුව නිවැරදි සංගයෝ</h6>     

												</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<span class="">
                                                                                                        <h6 style="font-size: smaller;">පහත වගුගේ පරිෙණක ආශ්‍රිත උපාංෙ කිහිපයක් සහ ඒවාගේ කාර්යයන් දැක්ගේ. ගමම වගුවට අනුව නිවැරදි සංගයෝ</h6>     

												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<span class="">
                                                                                                        <h6 style="font-size: smaller;">පහත වගුගේ පරිෙණක ආශ්‍රිත උපාංෙ කිහිපයක් සහ ඒවාගේ කාර්යයන් දැක්ගේ. ගමම වගුවට අනුව නිවැරදි සංගයෝ</h6>     

												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<span class="">
                                                                                                        <h6 style="font-size: smaller;">පහත වගුගේ පරිෙණක ආශ්‍රිත උපාංෙ කිහිපයක් සහ ඒවාගේ කාර්යයන් දැක්ගේ. ගමම වගුවට අනුව නිවැරදි සංගයෝ</h6>     

												</span>
											</a>
										</li>
									</ul>
								</li>
   -->
   <?php
       if(isset($_GET['PaperID'])){
        
        $paper_ID = $_GET['PaperID'];
        
        $link = "index.php?page=ViewPaperQuestions&PaperID=$paper_ID"; 
        
       } else {
           $link = "#"; 
       }
   
   
   ?>
								<li class="dropdown-footer">
									<a href="<?php echo $link; ?>">
										Go to This Question Paper
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
<?php
        
        $stmt = $db->prepare("SELECT id, firstname, lastname FROM `cp_users` WHERE id= {$_SESSION['user_id']}"); 
        $stmt->bind_result($id, $FirstName, $LastName);
        $stmt->execute();
      

?>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
                                                                        
                                                                            <?php
                                                                        while ($stmt->fetch()){ 
                                                                       
                                                                        
                                                                        
									echo $FirstName; 
                                                                        
                                                                       
                                                                        }
                                                                        ?>
                                                                        
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<!-- 	
                                                            <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>
                                                        -->
								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
                
                

<?php
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: login.php');
}



?>