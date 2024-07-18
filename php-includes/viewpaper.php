  
<?php
//Includes
require_once 'connect.inc.php';

?>
<html>
    <head>
    <title>View Paper</title>
    </head>
    
    <body>

<?php
$Paper_ID2 = $_GET['PaperID'];


                            //Select the database setting value
                           $stmt_select_paper = $db->prepare("SELECT pp_paper_name, pp_question_paper_date, pp_question_paper_time, pp_question_paper_exam_name, pp_question_paper_subj_name, pp_question_paper_grade, pp_question_paper_note FROM `cp_papers` WHERE `cp_paper_id`=$Paper_ID2 ");
                           $stmt_select_paper->bind_result($pp_paper_name2, $pp_question_paper_date2, $pp_question_paper_time2, $pp_question_paper_exam_name2, $pp_question_paper_subj_name2, $pp_question_paper_grade2, $pp_question_paper_note2);
                           $stmt_select_paper->execute();

                           
                           
                           while ($stmt_select_paper->fetch()){ 
                               
                           }

?>
<table style="margin-bottom: 20px;" width="807"  border="1">
                    <tbody>
                        <tr>
                        <td height="80" style="text-align: center;" colspan="3">
                        <p><span style="font-size: x-large;"><?php echo $pp_question_paper_exam_name2; ?></span></p>
                        </td>
                        </tr>
                        <tr>
                        <td height="50" style="text-align: center;" colspan="3"><span style="font-size: large;"><?php echo $pp_question_paper_subj_name2; ?></span></td>
                        </tr>
                        <tr>
                        <td style="text-align: center;"><span style="font-size: medium;"><?php echo $pp_question_paper_grade2  ?></span></td>
                        <td style="text-align: center;"><span style="font-size: medium;"><?php echo $pp_question_paper_date2 .' | '. $pp_paper_name2; ?></span></td>
                        <td style="text-align: center;"><span style="font-size: medium;"><?php echo $pp_question_paper_time2; ?></span></td>
                        </tr>
                        <tr>
                        <td height="50" colspan="3">
                            <p style="text-align: center;"><span style="font-size: small; "><?php echo $pp_question_paper_note2; ?></span></p>
                        </td>
                        </tr>
                        
                    </tbody>
                        
</table>

<?php

$Paper_ID = $_GET['PaperID'];

    $stmt = $db->prepare("SELECT cp_question_details.id, cp_question_details.que_d_paper_id, cp_question_details.que_d_subj_id, cp_question_details.que_d_unit_id, cp_question_details.que_d_question_id, cp_question_details.que_d_question_order, cp_question.que_que_id, cp_question.que_short_description, cp_question.que_long_description  FROM `cp_question_details` INNER JOIN `cp_question` ON cp_question_details.que_d_question_id=cp_question.que_que_id  WHERE `que_d_paper_id`= $Paper_ID ORDER BY CAST(que_d_question_order as unsigned) ASC") ;
    //$stmt->bind_param('i', $id);
    $stmt->bind_result($cp_question_details_id, $que_d_paper_id, $que_d_subj_id, $que_d_unit_id, $que_d_question_id, $que_d_question_order, $que_que_id, $que_short_description, $que_long_description);
    $stmt->execute();

while ($stmt->fetch()){
    
    //==================Auto Rank Start=========================  
    
            // break statement at the end has no effect since you are doing echo on top.
        if ($rank == 10000)break; 

        // If same total will skip $rank++
        if($cp_question_details_id != $previous)$rank++;



        // Current row student's total 
        $previous = $cp_question_details_id;
        
  //==================Auto Rank End=========================                            
    
?>

            <style type="text/css" >
            .cus_detail {
              background-color: black  !important;
              -webkit-print-color-adjust: exact;
              color-adjust: exact;
            }
            </style>
<hr>            
<div>

    <span style="padding-top: 10px; color: white;" class="cus_detail">0<?php echo $rank; ?></span>
    <?php echo $que_long_description; ?>

    
    
</div>

    </body>
</html>

<?php


}

?>