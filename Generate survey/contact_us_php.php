<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_POST['submit_comment']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$message=$_POST['message'];
	
	$sql="SELECT * FROM users WHERE Email='$email'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		//email found
		$data=mysqli_fetch_assoc($run);
		if($data['Password']==$pass)
		{
			$to = "survey555559@gmail.com";
            $subject = $data['Username'];
            $txt = "". $message;
            $headers = "From: ".$email . "\r\n" .
            "CC: generatesurvey.000webhostapp.com";
            
            if(mail($to,$subject,$txt,$headers))
			{
    			header("Location: contact_us.php?mail=send");
    			ob_end_flush();
    			exit();
			}
			else
			{
			    header("Location: contact_us.php?mail=notsend");
    			ob_end_flush();
    			exit();
			    
			}
		}
		else
		{
			header("Location: contact_us.php?pass=notmatch");
			ob_end_flush();
			exit();
		}
	}
	else
	{
		//email not found
		header("Location: contact_us.php?email=notfound");
		ob_end_flush();
		exit();
	}
}
?>