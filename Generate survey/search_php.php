<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_POST['search_submit']))
{
	$str=$_POST['str_data'];
	header("Location: search.php?search=".$str);
	ob_end_flush();
	exit();
}
?>