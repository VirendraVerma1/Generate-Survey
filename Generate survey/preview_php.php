<?php
ob_start();
session_start();
include("db_con.php");
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
     $user_table_id="userid_".$_SESSION['user_id'];
     $user_id=$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	
	
	$_SESSION['page']=1;
     $temp=$_SESSION['current_survey_name_id'];
      $sql="SELECT * FROM $user_table_id WHERE ID='$temp'";
        $run=mysqli_query($con,$sql);
        if($run)
        {
           
            $data=mysqli_fetch_assoc($run);
            
             $survey_state=$data['ActiveSurvey'];
             if($survey_state==0)$state="deactivated";else $state="activated";
             $_SESSION['survey_state']=$state;
					header("Location: survey_optimize.php?user=".$user_id."&&survey=".$current_survey_id."&&survey_state=".$state);
					ob_end_flush();
					exit();
            
        }
}
?>