<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_POST['check_account']))
{
	$email=$_POST['email'];
	$pno=$_POST['pno'];
	$counter=0;
	$sql="SELECT * FROM users";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		while($data=mysqli_fetch_assoc($run))
		{
			if($data['Email']==$email&&$data['PhoneNo']==$pno)
			{
				$counter++;
				//account found
				header("Location: forgetpassword.php?user=".$data['ID']);
				ob_end_flush();
				exit();
			}
		}
	}
	if($counter==0)
	{
		header("Location: forgetpassword.php?user=0");
		ob_end_flush();
		exit();
	}
}

if(isset($_POST['verify_otp']))
{
	$otp=$_POST['otp'];
	$userid=$_POST['user'];
	$new_password=$_POST['new_password'];
	
	$date1 =$_SESSION['time'];
	
	$date2 = time();
	$mins = ($date2 - $date1) / 60;
	
	if($mins>0&&$mins<10)
	{
		if($_SESSION['otp']==$otp)
		{
			$sql="UPDATE users SET Password='$new_password' WHERE ID='$userid'";
			$run=mysqli_query($con,$sql);
			if($run)
			{
				$_SESSION["user_id"]=$userid;
				header("Location: profile.php");
				ob_end_flush();
				exit();
			}
			else
			{
				header("Location: forgetpassword.php?otp=fail");
				ob_end_flush();
				exit();
			}
			
		}
		else
		{
			header("Location: forgetpassword.php?otp=fail");
			ob_end_flush();
			exit();
		}
	}
	else
	{
		header("Location: forgetpassword.php?otp=timeout");
		ob_end_flush();
		exit();
	}
}
?>