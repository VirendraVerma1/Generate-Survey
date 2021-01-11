<?php
ob_start();
session_start();
	if(isset($_POST['next_page']))
	{
		$user_id=$_SESSION['user_id'];
		$current_survey_id=$_SESSION['current_survey_name_id'];
		$_SESSION['page']=$_SESSION['page']+1;
		$_GET['page']=$_SESSION['page'];
		header("Location: preview.php?user=".$user_id."&&survey=".$current_survey_id."&&page=".$_GET['page']);
		ob_end_flush();
		exit();
	}
	if(isset($_POST['prev_page']))
	{
		if($_SESSION['page']>1)
		{
			$user_id=$_SESSION['user_id'];
			$current_survey_id=$_SESSION['current_survey_name_id'];
			$_SESSION['page']=$_SESSION['page']-1;
			$_GET['page']=$_SESSION['page'];
			header("Location: preview.php?user=".$user_id."&&survey=".$current_survey_id."&&page=".$_GET['page']);
			ob_end_flush();
			exit();
		}
	}
	
//start survey
if(isset($_POST['submit_start_survey']))
{
	$user_id=$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	$_SESSION['page']=1;
	
	header("Location: survey_optimize.php?user=".$user_id."&&survey=".$current_survey_id);
	ob_end_flush();
	exit();
}
?>