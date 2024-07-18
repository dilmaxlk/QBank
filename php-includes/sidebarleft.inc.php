<!-- This is Main Menu of the system -->
    <?php
    
// Browser Session Start here
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
        
  
    // If page name is set on URL, Nav bar will forcus on the to the page....
    if(isset($_GET['page'])){
        $setpage = $_GET['page'];
        
        if ($setpage == "ViewAllSubjects"){
            $active1 = "active"; 
        }
        
       if ($setpage == "ViewAllPapers"){
            $active2 = "active"; 
        }
       if ($setpage == "ViewUsers"){
            $active3 = "active"; 
        } 
       if ($setpage == "Help"){
            $active4 = "active"; 
        }  
    }
    ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li class="">
						<a href="dash.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo $active1; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								Subjects
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php echo $active1; ?>">
								<a href="index.php?page=ViewAllSubjects">
									<i class="menu-icon fa fa-caret-right"></i>

									View All Subjects
								
								</a>

							</li>


						</ul>
					</li>

					<li class="<?php echo $active2; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Papers </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu <?php echo $active2; ?>">
							<li class="<?php echo $active2; ?>">
								<a href="index.php?page=ViewAllPapers">
									<i class="menu-icon fa fa-caret-right"></i>
									View All Papers
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="<?php echo $active3; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php echo $active3; ?>">
								<a href="index.php?page=ViewUsers">
									<i class="menu-icon fa fa-caret-right"></i>
									All Users
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php echo $active4; ?>">
						<a href="index.php?page=Help" >
							<i class="menu-icon fa fa-info"></i>
							<span class="menu-text"> Help </span>	
						</a>
					</li>
                                        
					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out "></i>
							<span class="menu-text"> Logout </span>
						</a>

	
					</li>                                        
                                        
                                        
				</ul><!-- /.nav-list -->
                                



				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
                        
                        
<?php
// If session isn't meet, user will redirect to login page
} else { 
    header('Location: login.php');
}



?>