<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - QBank Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="https://maxweem.tk/apps/qbank/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
                
               
                <!-- loading indicator, Please refer footer.php-->
               <style>
                   #loading-indicator {
                  position: fixed;
                  z-index: 1;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  background-color: whitesmoke;
                  padding: 50px;
                  border-radius: 10px;
                  /*  left: 500px;
                     top: 500px;*/
                   }
               </style>               
         
        <script src="//cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
        
        <!-- Sweet Alert Class-->
        <script src="plugins/sweetalert/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

	<body class="no-skin">