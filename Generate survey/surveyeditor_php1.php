<?php
ob_start();
session_start();
include("db_con.php");

//if getting answertype then store on db and refresh before saving answer---------------------------------------------------------------------------
$temp1="Answer_Type_".$_SESSION['current_ques_id'];
if(isset($_POST[$temp1]))
{
    $answer_type=$_POST[$temp1];
    $table_name=$_SESSION['user_survey_id'];
    $ques_id=$_SESSION['current_ques_id'];
	
	if($answer_type=="Comment")
	{
		//add column in survey ques comment table 
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment ADD $column TEXT NOT NULL";
		$add=mysqli_query($con1,$sql);
		
		
		$temp=1;
		$sql="UPDATE $table_name SET Answer_Type='$answer_type', Answer_Options='$temp' WHERE ID='$ques_id'";
		
		
	}
	elseif($answer_type=="none")
	{
		//delete column in survey ques comment table
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment DROP $column";
		$add=mysqli_query($con1,$sql);
		
		$temp=0;
		$sql="UPDATE $table_name SET Answer_Type='$answer_type', Answer_Options='$temp' WHERE ID='$ques_id'";
	}
	else
	{
		//delete column in survey ques comment table
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment DROP $column";
		$add=mysqli_query($con1,$sql);
		
		$sql="UPDATE $table_name SET Answer_Type='$answer_type' WHERE ID='$ques_id'";
	}
    
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