<?php
ob_start();
session_start();
include("db_con.php");

//for unfollowing friend from follow page
if(isset($_GET['unfollow']))
{
    
    $user_id=$_SESSION['user_id'];
    $friend_id=$_GET['unfollow'];
    
    $table_name="userid_".$user_id."_friend_list";
    $sql="SELECT * FROM $table_name";
    $run2=mysqli_query($con,$sql);
    if($run2)
    {
        while($data2=mysqli_fetch_assoc($run2))
        {
            if($data2['FriendName']==$friend_id&&$data2['State']=='following')
            {
                $user_list_id=$data2['ID'];
                $sql="DELETE FROM $table_name WHERE ID='$user_list_id' ";
	            $run=mysqli_query($con,$sql);
	            if($run)
        		{
        		    $table_name="userid_".$friend_id."_friend_list";
        		    $sql="SELECT * FROM $table_name";
        		    $run1=mysqli_query($con,$sql);
        		    if($run1)
        		    {
        		        while($data=mysqli_fetch_assoc($run1))
        		        {
        		            if($data['FriendName']==$user_id&&$data['State']=='follower')
        		            {
        		                $friend_list_id=$data['ID'];
        		                $table_name="userid_".$friend_id."_friend_list";
        		                $sql="DELETE FROM $table_name WHERE ID='$friend_list_id'";
                            	$run=mysqli_query($con,$sql);
                            	
                            	echo $friend_list_id;
        		            }
        		        }
        		    }
        		 	
        		    header("Location: follow.php?button=pyf");
                    ob_end_flush();
        	        exit();
        		}
            }
        }
    }
    
	
	else
		{
		     header("Location: aboutme.php?error=networkerror");
            ob_end_flush();
	        exit();
		}
}


//for button followers on personal page
if(isset($_POST['followers_submit']))
{
    header("Location: follow.php?button=followers");
    ob_end_flush();
	exit();
}

//for button followers on personal page
if(isset($_POST['pyf_submit']))
{
    header("Location: follow.php?button=pyf");
    ob_end_flush();
	exit();
}


//for unfollow user

if(isset($_POST['unfollow_user']))
{
    $user_id=$_SESSION['user_id'];
    $friend_id=$_SESSION['view_profile'];
    
    $table_name="userid_".$user_id."_friend_list";
    
    $table_name="userid_".$user_id."_friend_list";
    $sql="SELECT * FROM $table_name";
    $run2=mysqli_query($con,$sql);
    if($run2)
    {
        while($data2=mysqli_fetch_assoc($run2))
        {
            if($data2['FriendName']==$friend_id&&$data2['State']=='following')
            {
                $user_list_id=$data2['ID'];
                $sql="DELETE FROM $table_name WHERE ID='$user_list_id' ";
	            $run=mysqli_query($con,$sql);
	            if($run)
        		{
        		    
        		     $table_name="userid_".$friend_id."_friend_list";
        		    $sql="SELECT * FROM $table_name";
        		    $run1=mysqli_query($con,$sql);
        		    if($run1)
        		    {
        		    while($data=mysqli_fetch_assoc($run1))
        		        {
        		            if($data['FriendName']==$user_id&&$data['State']=='follower')
        		            {
        		                $friend_list_id=$data['ID'];
        		                $table_name="userid_".$friend_id."_friend_list";
        		                $sql="DELETE FROM $table_name WHERE ID='$friend_list_id'";
                            	$run=mysqli_query($con,$sql);
                            		echo "ID".$friend_list_id;
                            header("Location: aboutme.php?user=".$friend_id);
                                  ob_end_flush();
        	                        exit();
        		            }
        		        }
        		    }
        		    	//header("Location: aboutme.php?user=".$friend_id);
                                  ob_end_flush();
        	                        exit();
                	
        		    
        		}
            }
        }
    }
    
	
	else
		{
		     header("Location: aboutme.php?error=networkerror");
            ob_end_flush();
	        exit();
		}
}


//for follow to user

if(isset($_POST['follow_user']))
{
    $user_id=$_SESSION['user_id'];
    $friend_id=$_SESSION['view_profile'];
    
    $table_name="userid_".$user_id."_friend_list";
    $flag=0;
    $sql="SELECT * FROM $table_name";
    $run2=mysqli_query($con,$sql);
    if($run2)
    {
        while($data2=mysqli_fetch_assoc($run2))
        {
            if($data2['FriendName']==$friend_id&&$data2['State']=='following')
            $flag=1;
        }
    }
    if($flag==0)
    {
        $sql="INSERT INTO $table_name(FriendName,State) VALUES ('$friend_id','following')";
    	$run=mysqli_query($con,$sql);
    	if($run)
    		{
    		    //update data on friend account
    		    $table_name="userid_".$friend_id."_friend_list";
    		    $sql="INSERT INTO $table_name(FriendName,State) VALUES ('$user_id','follower')";
    	       $run=mysqli_query($con,$sql);
    		    
    		    header("Location: aboutme.php?user=".$friend_id);
                ob_end_flush();
    	        exit();
    		}
    	else
    		{
    		     header("Location: aboutme.php?error=networkerror");
                ob_end_flush();
    	        exit();
    		}
    }
    else
    {
        header("Location: aboutme.php?user=".$friend_id);
            ob_end_flush();
	        exit();
    }
}



//change forgot password
if(isset($_POST['forgot_pass_change'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
    $new_pass=$_POST['pass_change'];
    $old_pass=$_POST['otp'];
    $id=$_SESSION['user_id'];
    
	$date1 =$_SESSION['time'];
	
	$date2 = time();
	$mins = ($date2 - $date1) / 60;
	
	if($mins>0&&$mins<10)
	{
        if($_SESSION['otp']==$old_pass)
        {
            //now updte password
            $sql="UPDATE users SET Password='$new_pass' WHERE ID='$id'";
	    	$run=mysqli_query($con,$sql);
	    	if($run)
	    	{
	    	    header("Location: aboutme.php?success=passwordchangedsuccess");
                ob_end_flush();
	             exit();
	    	}
        }
        else
        {
            header("Location: aboutme.php?error=otpfailed&&button=forgotpass");
            ob_end_flush();
	        exit();
        }
    }
	else
	{
		header("Location: aboutme.php");
        ob_end_flush();
	    exit();
	}

}


//change password from old password
if(isset($_POST['pass_change'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
    $new_pass=$_POST['new_pass'];
    $old_pass=$_POST['pass_old'];
    $id=$_SESSION['user_id'];
    $sql="SELECT * FROM users";
    $run=mysqli_query($con,$sql);
    if($run)
    {
        $data=mysqli_fetch_assoc($run);
        if($old_pass==$data['Password'])
        {
            //now updte password
            $sql="UPDATE users SET Password='$new_pass' WHERE ID='$id'";
	    	$run=mysqli_query($con,$sql);
	    	if($run)
	    	{
	    	    header("Location: aboutme.php?success=passwordchangedsuccess");
                ob_end_flush();
	             exit();
	    	}
        }
        else
        {
            header("Location: aboutme.php?error=passwordnotmatch&&button=changepass");
            ob_end_flush();
	        exit();
        }
    }
    else
    {
         header("Location: aboutme.php");
        ob_end_flush();
	    exit();
    }

}



// edit button
if(isset($_POST['edit_me'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
     header("Location: aboutme.php?button=edit");
     ob_end_flush();
	 exit();

}

//upload profile Pic

if(isset($_POST['profile_change'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
	$id=$_SESSION['user_id'];
	
	//checking for photo if available
	$profile_pic="";
	$sql="SELECT * FROM users WHERE ID='$id'";
	$run=mysqli_query($con,$sql);
	if($run)
	{	
		$data=mysqli_fetch_assoc($run);
		$profile_pic=$data['ProfilePic'];
		echo $sql;
		if($profile_pic)
		{
			
			$file='dataimg/'.$profile_pic;
			if(file_exists($file))
			{
				unlink($file);
				$profile_pic="";
				
				
			}
			
			
		}
		
		
	}
	
	//getting image file
	
	
			$imagename=$_FILES['upload_cont_img']['name'];
			$tempname=$_FILES['upload_cont_img']['tmp_name'];
					
			move_uploaded_file($tempname,"dataimg/$imagename");
			
			
			
			$sql="UPDATE users SET ProfilePic='$imagename' WHERE ID='$id'";
				$run=mysqli_query($con,$sql);
				if($run)
					{
						header("Location: aboutme.php?button=edit");
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

//save button

if(isset($_POST['save_me'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
	//fetching data from edit form page
    $first_name=$_POST['fname'];
    
    $email=$_POST['email'];
    $id=$_SESSION['user_id'];
    $location=$_POST['locationname'];
	$profession=$_POST['professionname'];
	$phone=$_POST['pphone'];
	$address=$_POST['adress'];
	$dob=$_POST['bday'];
	$gender=$_POST['gender'];
	
	
	
    $sql="UPDATE users SET Username='$first_name', Email='$email', Location='$location', Occupation='$profession', PhoneNo='$phone', Address='$address', DOB='$dob', Gender='$gender' WHERE ID='$id'";
		$run=mysqli_query($con,$sql);
		if($run)
			{
			    header("Location: aboutme.php");
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

//delete button
if(isset($_POST['delete_me'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
    header("Location: aboutme.php?button=delete");
     ob_end_flush();
	 exit();
}

if(isset($_POST['confirm_delete'])&&($_SESSION['user_id']==$_SESSION['view_profile']))
{
    $detect_pass=0;$flag=0;
    $id=$_SESSION['user_id'];
    $sql="SELECT * FROM users WHERE ID='$id'";
    $run3=mysqli_query($con,$sql);
    if($run3)
    {
        $data=mysqli_fetch_assoc($run3);
        if($data['Password']==$_POST['pass_delete'])
        {
            $total_survey=0;
             $user_table_name="userid_".$_SESSION['user_id'];
            $sql="SELECT * FROM $user_table_name";
            $run=mysqli_query($con,$sql);
            $total_survey=mysqli_num_rows($run);
            if($total_survey)
            {
                //first delete all survey then delete account
                $sql="SELECT * FROM $user_table_name";
                $run4=mysqli_query($con,$sql);
                if($run4)
                {
                    while($data2=mysqli_fetch_assoc($run4))
                    {
                        //drop survey table
                        $user_table_id="userid_".$_SESSION['user_id'];
    					$current_survey_name_id=$data2['ID'];
    					$table_name1="userid_".$_SESSION['user_id']."_surveyid_".$data2['ID'];
                        $sql="DROP TABLE $table_name1";
    					
    					if($con1->query($sql))
    					{
    						//delete survey name and rest details from userid table
    						$sql="DELETE FROM $user_table_id WHERE ID='$current_survey_name_id'";
    						$run5=mysqli_query($con,$sql);
    						if($run5)
    						{
    							//delete survey ques comment table
    							$table_name_com_ques="userid_".$_SESSION['user_id']."_surveyid_".$current_survey_name_id."_survey_ques_comment";
    							$sql="DROP TABLE $table_name_com_ques";
    							$con1->query($sql);
    							
    							//delete comment table
    							$table_name_com_ques="userid_".$_SESSION['user_id']."_surveyid_".$current_survey_name_id."_comments";
    							$sql="DROP TABLE $table_name_com_ques";
    							$con1->query($sql);
								
    							//delete row from all survey name table
    							$all_id=$table_name1;
    							$sql="DELETE FROM All_Survey_Name WHERE Survey_User_Id='$all_id'";
                        		$run=mysqli_query($con,$sql);
                    		
    							//delete column in userid member location table
    							$table_name="userid_".$_SESSION['user_id']."_member_ip";
    							$column=$table_name1;
    							$sql="ALTER TABLE $table_name DROP $column";
    							$add=mysqli_query($con,$sql);
							
    							//delete column in userid member location table
    							$table_name="userid_".$_SESSION['user_id']."_member_survey_location";
    							$column=$table_name1;
    							$sql="ALTER TABLE $table_name DROP $column";
    							$add=mysqli_query($con,$sql);
    							if($add)
    							{   
    							    //now delete survey account
    							    $flag++;
    							    
    							
    							}
    							else
    							{
    								header("Location: aboutme.php?confirm_delete=pnm");
    								ob_end_flush();
    								exit();
    							}
    							
    							
    							
    						}
    						else
    						{
    							header("Location: aboutme.php?confirm_delete=pnm");
    							ob_end_flush();
    							exit();
    						}
						
        				}
        				else
        				{
        					header("Location: aboutme.php?confirm_delete=pnm");
        					ob_end_flush();
        					exit();
        				}
                    }
                    if($flag)
                    {
                        delete_account();
                    }
                    
                }
                else
                {
                    header("Location: profile.php");
                     ob_end_flush();
                	exit(); 
                }
            }
            else
            {
                delete_account();
            }
        }
        else
        {
            header("Location: aboutme.php?button=delete&&confirm_delete=pnm");
            ob_end_flush();
        	exit();
        }
    }
    else
    {
        header("Location: profile.php");
            ob_end_flush();
        	exit();
    }
    
    
}


?>

<?php
    function delete_account()
    {
        include("db_con.php");
        $id=$_SESSION['user_id'];
        $table_name="userid_".$_SESSION['user_id'];
                $sql="DROP TABLE $table_name";
        		
        		if($con->query($sql))
        			{
        			    
        			    $sql="DELETE FROM users WHERE ID='$id'";
                		$run2=mysqli_query($con,$sql);
                		if($run2)
                		{
							//delete name from friend list
							$table_name="userid_".$_SESSION['user_id']."_friend_list";
							$sql="SELECT * FROM $table_name";
							$run2=mysqli_query($con,$sql);
							if($run2)
							{
								while($data2=mysqli_fetch_assoc($run2))
								{
									
									$friend_id=$data2['FriendName'];
									$table_name="userid_".$friend_id."_friend_list";
									$sql="SELECT * FROM $table_name";
									$run3=mysqli_query($con,$sql);
									if($run3)
									{
										while($data3=mysqli_fetch_assoc($run3))
										{
											
											$userid=$_SESSION['user_id'];
											if($data3['FriendName']==$userid)
											{
												$sql="DELETE FROM $table_name WHERE FriendName='$userid'";
												$run4=mysqli_query($con,$sql);
												
													
											}
										}
									}
								}
							}
							
							
							//delete name from nortification friend list
							$table_name="userid_".$_SESSION['user_id']."_nortification";
							$sql="SELECT * FROM $table_name";
							$run2=mysqli_query($con,$sql);
							if($run2)
							{
								while($data2=mysqli_fetch_assoc($run2))
								{
									
									$friend_id=$data2['FriendName'];
									$table_name="userid_".$friend_id."_nortification";
									$sql="SELECT * FROM $table_name";
									$run3=mysqli_query($con,$sql);
									if($run3)
									{
										while($data3=mysqli_fetch_assoc($run3))
										{
											
											$userid=$_SESSION['user_id'];
											if($data3['FriendName']==$userid)
											{
												$sql="DELETE FROM $table_name WHERE FriendName='$userid'";
												$run4=mysqli_query($con,$sql);
												
													
											}
										}
									}
								}
							}
							
							//deleting friend list
							$table_name="userid_".$_SESSION['user_id']."_friend_list";
                            $sql="DROP TABLE $table_name";
							$con->query($sql);
							
							//deleting member survey location
                			$table_name="userid_".$_SESSION['user_id']."_member_survey_location";
                            $sql="DROP TABLE $table_name";
							$con->query($sql);
							
							
							//delete member ip
							$table_name="userid_".$_SESSION['user_id']."_member_ip";
                            $sql="DROP TABLE $table_name";
							$con->query($sql);
							
							//delete nortification
							$table_name="userid_".$_SESSION['user_id']."_nortification";
                            $sql="DROP TABLE $table_name";
							$con->query($sql);
							
							//delete history
							$table_name="userid_".$_SESSION['user_id']."_history";
                            $sql="DROP TABLE $table_name";
                    		
                    		if($con->query($sql))
                    		{
                    		    
                    		   header("Location: homepage.php");
                                ob_end_flush();
            	                exit();
                    		}
                		    else
                			{
                			    header("Location: aboutme.php?account=uda");
                                  ob_end_flush();
        	                      exit();
                			}
                		}
                		else
                			{
                			     header("Location: aboutme.php?account=uda");
                                  ob_end_flush();
        	                      exit();
                			}
                	}
        		else
        			{
        			  header("Location: aboutme.php?account=uda");
                  ob_end_flush();
        	      exit();
        }
    }
?>