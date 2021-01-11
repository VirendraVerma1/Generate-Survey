<?php
ob_start();
session_start();
include("db_con.php");

//for next button
if(isset($_POST['next_button']))
{
    $_SESSION['index_content']=$_SESSION['index_content']+20;
    $_SESSION['page_no']=$_SESSION['page_no']+1;
    header("Location: ongoingsurvey.php");
	ob_end_flush();
	exit();
}

//for next button
if(isset($_POST['prev_button']))
{
    $_SESSION['index_content']=$_SESSION['index_content']-20;
    $_SESSION['page_no']=$_SESSION['page_no']-1;
    header("Location: ongoingsurvey.php");
	ob_end_flush();
	exit();
}

?>