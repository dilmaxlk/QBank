<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							
							<strong>Thank you for using QBank by <a href="https://dilmax.lk" target="_blank">DILMAX</a> | </strong><strong><a href="https://dilmax.lk/license" target="_blank">License</a></strong>

						</span>

	
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/spin.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

                 <script> 
                     
                     
                // START loading-indicator, Please refer header.inc.php for CSS Style    
             $(document).ajaxSend(function(event, request, settings) {
               $('#loading-indicator').show();
             });


             $(document).ajaxComplete(function(event, request, settings) {
               $('#loading-indicator').hide();

             });  
               // END loading-indicator -----------------------------------------  
  
  
  
               
               //This Ajax code will run select subject query. Page allsubjects.inc.php
               // view_data - on the <button>
               // subject_id - id="<?php //echo $subject_id;  ?>" on the <button>
               // subject_detail - id="unit_detail" on the model window
               // dataModal - <div id="dataModal_Select_unit" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_data').click(function(){  
                         var subject_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/select_subject.php",  
                              method:"post",  
                              data:{subject_id:subject_id},  
                              success:function(data){  
                                   $('#subject_detail').html(data);  
                                   $('#dataModal').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script> 
              
                 <script> 
               
               // Delete Subjects | This Ajax code will run select subject query. Page allsubjects.inc.php
               // view_subject_delete_data - on the <button>
               // subject_id - id="<?php //echo $subject_id;  ?>" on the <button>
               // subject_delete_detail - id="unit_detail" on the model window
               // dataModal_delete_subj - <div id="dataModal_Select_unit" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_subject_delete_data').click(function(){  
                         var subject_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/delete_subject.php",  
                              method:"post",  
                              data:{subject_id:subject_id},  
                              success:function(data){  
                                   $('#subject_delete_detail').html(data);  
                                   $('#dataModal_delete_subj').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script>                 
                

                 <script> 
               
               //This Ajax code will run select Unit query. Page viewallunits.inc.php
               // view_Unit_data - on the <button>
               // unit_id - id="<?php //echo $uni_id;  ?>" on the <button>
               // unit_detail - id="unit_detail" on the model window
               // dataModal_Select_unit - <div id="dataModal_Select_unit" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_Unit_data').click(function(){  
                         var unit_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/select_unit.php",  
                              method:"post",  
                              data:{unit_id:unit_id},  
                              success:function(data){  
                                   $('#unit_detail').html(data);  
                                   $('#dataModal_Select_unit').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script> 
               

               
                 <script> 
               
               //This Ajax code will run select Question query. Page viewquestion.inc.php
               // view_question_data - on the <button>
               // question_id - id="<?php //echo que_id;  ?>" on the <button>
               // question_detail - id="question_detail" on the model window
               // dataModal_Select_question - <div id="dataModal_Select_question" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_question_data').click(function(){  
                         var question_id = $(this).attr("id");
                         $.ajax({  
                              url:"php-includes/select_question.php",  
                              method:"post",  
                              data:{question_id:question_id},  
                              success:function(data){  
                                   $('#question_detail').html(data);  
                                   $('#dataModal_Select_question').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script>                
               

               
                 <script> 
               
               //This Ajax code will run select Paper query. Page viewallpapers.inc.php
               // view_paper_data - on the <button>
               // paper_id - id="<?php //echo paper_id;  ?>" on the <button>
               // paper_detail - id="question_detail" on the model window
               // dataModal_Select_paper - <div id="dataModal_Select_question" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_paper_data').click(function(){  
                         var paper_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/select_paper.php",  
                              method:"post",  
                              data:{paper_id:paper_id},  
                              success:function(data){  
                                   $('#paper_detail').html(data);  
                                   $('#dataModal_Select_paper').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script>   

               

                 <script> 
               
               // Delete Uniit | This Ajax code will run select unit query. Page viewallunits.inc.php
               // view_unit_delete_data - on the <button>
               // $uni_uni_id - id="<?php //echo $uni_uni_id;  ?>" on the <button>
               // unit_delete_detail - id="unit_delete_detail" on the model window
               // dataModal_delete_unit - <div id="dataModal_delete_unit" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_unit_delete_data').click(function(){  
                         var unit_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/delete_unit.php",  
                              method:"post",  
                              data:{unit_id:unit_id},  
                              success:function(data){  
                                   $('#unit_delete_detail').html(data);  
                                   $('#dataModal_delete_unit').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script> 



                 <script> 
               
               //This Ajax code will run select User query. Page viewusers.inc.php
               // view_data - on the <button>
               // user_id - id="<?php //echo paper_id;  ?>" on the <button>
               // user_detail - id="question_detail" on the model window
               // dataModal_user - <div id="dataModal_Select_question" class="modal fade">  on the model window
               
               $(document).ready(function(){  
                    $('.view_data').click(function(){  
                         var user_id = $(this).attr("id");  
                         $.ajax({  
                              url:"php-includes/select_user.php",  
                              method:"post",  
                              data:{user_id:user_id},  
                              success:function(data){  
                                   $('#user_detail').html(data);  
                                   $('#dataModal_select_user').modal("show");  
                              }  
                         });  
                    });  
               });  
               </script> 
               
               
            <script> 
                     
                     
                     
               
               //This Ajax code will run select subject query. Page addquestion-viewsubjects-viewunits-viewquestion.inc.php
               // view_data - on the <button>
               // subject_id - id="<?php //echo que_que_id;  ?>" on the <button>
               
               
               
               $(document).ready(function(){  
                    $('.view_question_to_paper').click(function(){  
                         var QuestionID = $(this).attr("id"); 
                         var SubjectID = <?php echo $_GET["SubjectID"]; ?>;
                         var UnitID =  <?php echo $_GET["UnitID"]; ?>;
                         var PaperID = <?php echo $_GET["PaperID"]; ?>;
                         $.ajax({  
                              url:"functions/addquestiontopaper.php",  
                              method:"get",  
                              data:{QuestionID:QuestionID, SubjectID:SubjectID, UnitID:UnitID, PaperID:PaperID },  
                              success:function(data){  
                                  //Swal alert will run
                                   swal({ type: 'success', title: 'Question Added Successfully', showConfirmButton: false, timer: 1500});
                              }  
                         });  
                    });  
               });  
               </script> 
               
               
               
               <!-- inline scripts related to this page -->
		<script type="text/javascript">
               </script>

			
	</body>
</html>
