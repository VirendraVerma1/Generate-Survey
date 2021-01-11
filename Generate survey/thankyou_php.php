<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_SESSION['member_user_table_id'])&&isset($_SESSION['member_survey_table_id']))
{
    //for comment system
    if(isset($_POST['submit_comment']))
    {
        $message=$_POST['comment'];$person=0;
        $table_name="userid_".$_SESSION['member_user_table_id']."_surveyid_".$_SESSION['member_survey_table_id']."_comments";
        
        date_default_timezone_set("Asia/Kolkata");
        $date=date("Y/m/d H:i");
        if(isset($_SESSION['user_id']))
        {
            $person=$_SESSION['user_id'];
        }
        
        $sql="INSERT INTO $table_name(Comment,DateTime,Person) VALUES ('$message','$date','$person')";
		$run=mysqli_query($con1,$sql);
		if($run)
		$_SESSION['comment']=$message;
		if($run)
		{
		   header("Location: thankyou.php?comment=success");
	       ob_end_flush();
	       exit();
		}
		
    }
    
    //for rate system
    for($i=1;$i<=5;$i++)
    {
        if(isset($_POST['rate_'.$i]))
        {
            $userid=$_SESSION['member_user_table_id'];
            $surveyid=$_SESSION['member_survey_table_id'];
            $table_name="userid_".$userid;
            $sql="SELECT * FROM $table_name WHERE ID='$surveyid'";
            $run=mysqli_query($con,$sql);
            if($run)
            {
                $data=mysqli_fetch_assoc($run);
                $rate=$data['Rate']+.2*$i;
                $sql="UPDATE $table_name SET Rate='$rate' WHERE ID='$surveyid'";
	        	$run=mysqli_query($con,$sql);
	        	$_SESSION['rate']=$i;
                 if($run)
                 {header("Location: thankyou.php?rate=".$data['Rate']);
	            	ob_end_flush();
	            	exit();
                 }
            }
        }
    }
}
else
{
    header("Location: thankyou.php");
	  	ob_end_flush();
	   	exit();
}
?>