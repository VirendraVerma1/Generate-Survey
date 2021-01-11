<?php
ob_start();
session_start();
include("db_con.php");
//$_SESSION['user_id'];
//$_SESSION['current_survey_name_id'];
//country
if(isset($_POST['country_submit']))
{
	header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&location=country&&survey_state=".$_SESSION['survey_state']);
	ob_end_flush();
	exit();
}


//city
if(isset($_POST['city_submit']))
{
    

	header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&location=city&&survey_state=".$_SESSION['survey_state']);
	ob_end_flush();
	exit();
}

//region
if(isset($_POST['region_submit']))
{
	header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&location=region&&survey_state=".$_SESSION['survey_state']);
	ob_end_flush();
	exit();
}

//active survey
if(isset($_POST['submit_active_survey']))
{
	$temp=1;$user_id=$_SESSION['user_id'];
	$table_name="userid_".$_SESSION['user_id'];
	$id=$_SESSION['current_survey_name_id'];
	$sql="UPDATE $table_name SET ActiveSurvey='$temp' WHERE ID='$id'";
		$run=mysqli_query($con,$sql);
			$_SESSION['survey_state']="activated";
			
			//update in all survey name
			$survey_id=$_SESSION['user_survey_id'];
			$sql="UPDATE All_Survey_Name SET ActiveSurvey='$temp' WHERE Survey_User_Id='$survey_id'";
		    $run=mysqli_query($con,$sql);
			
			//updating nortification
			$user_table_name="userid_".$_SESSION['user_id']."_friend_list";
			$sql="SELECT * FROM $user_table_name";
			$run=mysqli_query($con,$sql);
			
			if($run)
			{
				
			    while($data=mysqli_fetch_assoc($run))
			    {
			        if($data['State']=='follower')
			        {
						
			            $friend_nort_table="userid_".$data['FriendName']."_nortification";
			            $sql="SELECT * FROM $friend_nort_table";
			            $run1=mysqli_query($con,$sql);
			            if($run1)
			            {
							
			                while($data2=mysqli_fetch_assoc($run1))
							{
								
								if($data2['Status']=="created"&&$data2['FriendName']==$user_id&&$data2['SurveyId']==$id)
								{
									
									$id=$data2['ID'];
									$sql="UPDATE $friend_nort_table SET Status='not seen' WHERE ID='$id'";
									$run3=mysqli_query($con,$sql);
									if($run3)
										echo "success";
									else
										echo "un";
								}
							}
			            }
			        }
			    }//end of while loop for detecting friend name
			}
			
			header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&survey_state=activated");
			ob_end_flush();
			exit();
		
}

//deactive survey
if(isset($_POST['submit_deactive_survey']))
{
	$temp=0;$user_id=$_SESSION['user_id'];
	$table_name="userid_".$_SESSION['user_id'];
	$id=$_SESSION['current_survey_name_id'];
	$sql="UPDATE $table_name SET ActiveSurvey='$temp' WHERE ID='$id'";
		$run=mysqli_query($con,$sql);
		$_SESSION['survey_state']="deactivated";
		
		//update in all survey name
			$survey_id=$_SESSION['user_survey_id'];
			$sql="UPDATE All_Survey_Name SET ActiveSurvey='$temp' WHERE Survey_User_Id='$survey_id'";
		    $run=mysqli_query($con,$sql);
		
		//updating nortification
			$user_table_name="userid_".$_SESSION['user_id']."_friend_list";
			$sql="SELECT * FROM $user_table_name";
			$run=mysqli_query($con,$sql);
			
			if($run)
			{
				
			    while($data=mysqli_fetch_assoc($run))
			    {
			        if($data['State']=='follower')
			        {
						
			            $friend_nort_table="userid_".$data['FriendName']."_nortification";
			            $sql="SELECT * FROM $friend_nort_table";
			            $run1=mysqli_query($con,$sql);
			            if($run1)
			            {
							
			                while($data2=mysqli_fetch_assoc($run1))
							{
								
								if($data2['Status']=="not seen"&&$data2['FriendName']==$user_id&&$data2['SurveyId']==$id)
								{
									
									$id=$data2['ID'];
									$sql="UPDATE $friend_nort_table SET Status='created' WHERE ID='$id'";
									$run3=mysqli_query($con,$sql);
									if($run3)
										echo "success";
									else
										echo "un";
								}
							}
			            }
			        }
			    }//end of while loop for detecting friend name
			}
			
			
			header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&survey_state=deactivated");
			ob_end_flush();
			exit();
		
}

//optional feature
if(isset($_POST['submit_participant_feature']))
{
    $enable_result_page=0;$day_left=7;
    $enable_comment=0;
    $enable_rate=0;
    $enable_public=0;
    if($_POST['enable_result_page'])
    {
        $enable_result_page=1;
        if($_POST['day_left'])
        {
            $day_left=$_POST['day_left'];
        }
		else
        {
            date_default_timezone_set('Asia/Kolkata');
           
            $stop_date = date('Y-m-d');
            $stop_date = date('Y-m-d', strtotime($stop_date . ' +7 day'));
            $day_left=$stop_date;
        }
    }
    if($_POST['enable_comment'])
    {
        $enable_comment=1;
    }
    if($_POST['enable_rate'])
    {
        $enable_rate=1;
    }
    if($_POST['enable_public'])
    {
        $enable_public=1;
    }
    
    //update database
    $table_name="userid_".$_SESSION['user_id'];
    $id=$_SESSION['current_survey_name_id'];
    $sql="UPDATE $table_name SET DayLeft='$day_left', EnableResultPage='$enable_result_page',EnableComment='$enable_comment',EnableRate='$enable_rate',EnablePublic='$enable_public' WHERE ID='$id'";
		$run=mysqli_query($con,$sql);
		if($run)
		{
		    header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&survey_state=".$_SESSION['survey_state']);
			ob_end_flush();
			exit();
		}
		else
		{
		    header("Location: survey_optimize.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']."&&survey_state=".$_SESSION['survey_state']);
			ob_end_flush();
			exit();
		}
    
}


?>