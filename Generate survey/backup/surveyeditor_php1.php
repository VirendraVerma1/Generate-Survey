<?php
ob_start();
session_start();
include("db_con.php");
//answeroptions----------------------------------------------------------------------------------------------------------------------------------
$current_ques_id1="Answer_Options_".$_SESSION['current_ques_id'];
if(isset($_POST[$current_ques_id1]))
{
    $option_value=$_POST[$current_ques_id1];
    $table_name=$_SESSION['user_survey_id'];
    $current_ques_id=$_SESSION['current_ques_id'];
    $sql="UPDATE $table_name SET Answer_Options='$option_value' WHERE ID='$current_ques_id'";
            		$run=mysqli_query($con1,$sql);
            		if($run)
            			{
            			    header("Location: surveyeditor.php");
		                     ob_end_flush();
		                    exit();
            			}
            			else
            			{
            			    header("Location: profile.php");
		                     ob_end_flush();
		                    exit();
            			}
            			
}
?>