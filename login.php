<?php

// Some servers, header syntax not working,..Use this code if php header not working...
ob_start();

// Datebase Connection
include_once 'php-includes/connect.inc.php';


session_start();


?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login | QBank</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="white" id="id-text2">QBank</span>
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main align-center">
                                                                                    
                                                                                    <img src="assets/images/dilmax_logo.png" width="300px" alt="dilmax logo"/>
                                                                                    <hr>                                                                                    
											<h4 class="header blue lighter bigger">
											
												Please Enter Your Login Information
											</h4>

											<div class="space-6"></div>

											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="txt-Name" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="txt-pass" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

														<button type="submit" type="button" name="btn_login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										
                    <?php
        
        

  		
                //if submit button (name="btn-login") click, run this code...
                
  		if(isset($_POST['btn_login'])){
                    
                        
                        
                                       
            
			if(empty($_POST['txt-Name'])){
					$error[] = "<div class='alert alert-danger alert-dismissable'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> WARNING!</h4>
                                                     User name is missing
                                                    </div>";
					$name ='';			
			}  		
			else {
				$name = mysqli_real_escape_string($db,trim($_POST['txt-Name']));			
			}
			
			if(empty($_POST['txt-pass'])){
					$error[] = "<div class='alert alert-danger alert-dismissable'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> WARNING!</h4>
                                                    Password is missing
                                                    </div>";
					$pass ='';			
			}  		
			else {
				$pass = sha1(mysqli_real_escape_string($db,trim($_POST['txt-pass'])));			
			}
			
		
			
				$sql = "SELECT * FROM cp_users WHERE username = '{$name}' AND password = '{$pass}' LIMIT 1";
				$result = mysqli_query($db,$sql);
			

            
      
				if(mysqli_num_rows($result) == 1){
                                        //Get the informations from db and set it with session....
					$user = mysqli_fetch_array($result);
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['user_name'] = $user['username'];
                                        
                                        
//                                        $userid = $user['id'];
//                                        $username = $user['username'];
//                                        $Logdate = date("Y-m-d");
//                                        $Logtime = date("H:i");
//                                        
//                                        
//                                            //Used a prepared statment to add user log data to the database..)
//                                         $stmt1 = $db->prepare("INSERT INTO `cp_logs` (userid, username, logdate, logtime) VALUES (?, ?, ?, ?)" );
//                                         //i - integer / d - double / s - string / b - BLOB
//                                         $stmt1->bind_param('isss', $userid, $username, $Logdate, $Logtime);
//                                         $stmt1->execute();
//                                         $stmt1->close();                                           
                                        
                                        
					header('Location: dash.php');

					exit();
							
				}
                          
				else {
				
					$error[] = "<div class='alert alert-danger alert-dismissable'> 
                                                    <h4><i class='icon fa fa-ban'></i> WARNING!</h4>
                                                    User Name, Password or reCAPTCHA invalid, Try Again...
                                                    </div>";
				}
			
			
			if(!empty($error)){
				foreach($error as $msg){
					echo '<p>'.$msg.'</p>';			
				}
			}
			
			
			
  		}
                
// Some servers header syntax not working,..Use this code if php header not working...
ob_end_flush();
                
  
  ?> 
                                                                                            
                                                                                
                                                                                
                                                                                
                                                                                </div><!-- /.widget-main -->

										<div class="toolbar clearfix">

										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->


                
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>

