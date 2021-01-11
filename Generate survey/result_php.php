<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_POST['prev_page']))
{
	$_SESSION['current_survey_page']=$_SESSION['current_survey_page']-1;
	header("Location: result.php?user=".$_SESSION['member_user_table_id']."&&survey=".$_SESSION['member_survey_table_id']);
	ob_end_flush();
	exit();
}
if(isset($_POST['next_page']))
{
	$_SESSION['current_survey_page']=$_SESSION['current_survey_page']+1;
	header("Location: result.php?user=".$_SESSION['member_user_table_id']."&&survey=".$_SESSION['member_survey_table_id']);
	ob_end_flush();
	exit();
}

if(isset($_GET['chart']))
{
    $sql="SELECT * FROM charts_name";
    $run=mysqli_query($con,$sql);
    if($run)
    {
         while($data=mysqli_fetch_assoc($run))
          {
            if($_GET['chart']==$data['Charts_Name'])
            {
                $_SESSION['charts_name']=$data['Charts_Name'];
                header("Location: result.php?user=".$_SESSION['member_user_table_id']."&&survey=".$_SESSION['member_survey_table_id']);
            	ob_end_flush();
	           exit();
            }
          }
    }
}

?>