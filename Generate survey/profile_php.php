<?php
ob_start();
session_start();
include("db_con.php");
// --------------------------------------------------------survey create------------------------------------------------------
    if(isset($_POST['submit_surveycreate']))
    {
        $name=$_POST["survey_name"];
        $temp_pure_name=$_POST["survey_name"];
        $name = str_replace(' ', '_', $name); //removing spaces with underscore
        $survey_name=$name."_id_".$_SESSION['user_id'];//includeing id in name
        
        $table_name="userid_".$_SESSION['user_id'];
        
        //checking if survey name is exist or not
        $sql="SELECT * FROM $table_name WHERE SurveyName='$name'";
        $run=mysqli_query($con,$sql);
        if($run)
        {
            $flag=0;
            while($data=mysqli_fetch_assoc($run))
            {
            if($name==$data['SurveyName'])
            {$flag=1;break;}
            else
            $flag=0;
            }
            //found that survey name
            if($flag==1)
            {
            header("Location: profile.php?surveycreate=surveyexist");
						ob_end_flush();
						exit();
            }
        
        else
        {
            date_default_timezone_set("Asia/Kolkata");
            $date_created = date('H:i:s');
        
        
        $t=0;$survey_created_date=date("Y/m/d");
        $sql="INSERT INTO $table_name(SurveyName,DayCreated,PeopleRespond,EnablePublic,ActiveSurvey) VALUES ('$name','$survey_created_date','$t','1','0')";
        $run=mysqli_query($con,$sql);
        echo $sql;
        if($run)
        {
            
            
            
            //getting survey id
            
             $id=$_SESSION["user_id"];
             $sql="SELECT * FROM $table_name WHERE SurveyName='$name'"; //here table name is user id table name
             $run=mysqli_query($con,$sql);
              if(mysqli_num_rows($run)>0)
               {
               	    $data=mysqli_fetch_assoc($run);
                    
                    
                    //creating table of inputed name
                    //creating survey table
                    
            		$table_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
            		$_SESSION['current_survey_name_id']=$data['ID'];
            		$_SESSION["user_survey_id"]=$table_name;//saving table name of survey recent created
            		$sql="CREATE TABLE $table_name(ID  INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Ques VARCHAR(255) NULL, Ques_Order INT(50) NULL, Page INT(10) NULL, Save_Ques INT(10) NULL, FontFamilyQues VARCHAR(50) NULL, Required INT(10) NULL, Multiple INT(20) NULL, Heading INT(10) NULL, Bold INT(10) NULL, Italic INT(10) NULL, Underline INT(10) NULL, Text_SizeQues INT(10) NULL,  Answer_Type VARCHAR(50) NULL, Answer_Options INT(50) NULL, Option1 VARCHAR(50) NULL, Option2 VARCHAR(50) NULL, Option3 VARCHAR(50) NULL, Option4 VARCHAR(50) NULL, Option5 VARCHAR(50) NULL, Option6 VARCHAR(50) NULL, Option7 VARCHAR(50) NULL, Option8 VARCHAR(50) NULL, Option9 VARCHAR(50) NULL, Option10 VARCHAR(50) NULL, Option11 VARCHAR(50) NULL, Option12 VARCHAR(50) NULL, Option13 VARCHAR(50) NULL, Option14 VARCHAR(50) NULL, Option15 VARCHAR(50) NULL, Option16 VARCHAR(50) NULL, Option17 VARCHAR(50) NULL, Option18 VARCHAR(50) NULL, Option19 VARCHAR(50) NULL, Option20 VARCHAR(50) NULL, Result1 INT(10) NULL, Result2 INT(10) NULL, Result3 INT(10) NULL, Result4 INT(10) NULL, Result5 INT(10) NULL, Result6 INT(10) NULL, Result7 INT(10) NULL, Result8 INT(10) NULL, Result9 INT(10) NULL, Result10 INT(10) NULL, Result11 INT(10) NULL, Result12 INT(10) NULL, Result13 INT(10) NULL, Result14 INT(10) NULL, Result15 INT(10) NULL, Result16 INT(10) NULL, Result17 INT(10) NULL, Result18 INT(10) NULL, Result19 INT(10) NULL, Result20 INT(10) NULL, TotalResult INT(10))";
            		
            		if($con1->query($sql))  //table created
            			{
            			    // initializing some value for id
            			    $t1=1;$t2=0;$t3=0;$t4="Radio";$t5=3;$t6=0;$t7=0;$text_size=18;
            			    
            			    $sql="INSERT INTO $table_name(Ques_Order,Page,Save_Ques,Multiple,Heading,Bold,Italic,Underline,Text_SizeQues,Answer_Type,Answer_Options,TotalResult,Required,FontFamilyQues) 
							                      VALUES ('$t1',     '$t1' ,'$t2',   '$t3',  '$t3',  '$t3','$t3','$t3',   '$text_size', '$t4',    '$t5',        '$t6',     '$t7',         'Verdana')";
                            $run=mysqli_query($con1,$sql);
                            echo "iini";
                            if($run)
                            {
                                echo "stage1";
                                //adding nortification to his followers
                                $table_name_nort="userid_".$_SESSION['user_id']."_friend_list";
                                $sql="SELECT * FROM $table_name_nort";
                                $run1=mysqli_query($con,$sql);
                                if($run1)
                                {
                                    while($data5=mysqli_fetch_assoc($run1))
                                    {
                                        if($data5['State']=='follower')
                                        {
                                            //now going to every friend id and take thier online status
                                            $userid=$data5['FriendName'];
                                            $sql="SELECT * FROM users WHERE ID='$userid'";
                                            $run3=mysqli_query($con,$sql);
                                            if($run3)
                                            {
                                                $data1=mysqli_fetch_assoc($run3);
                                                $strStart=$date_created;
                                                $strEnd=$data1['Online_Status'];
                                                
                                                $dteStart = new DateTime($strStart); 
                                                 $dteEnd   = new DateTime($strEnd); 
                                                 $current_date=date("Y/m/d");
                                                 if($dteStart>$dteEnd)
                                                 {
                                                     //store nortification in followers
                                                     $table_name_nort="userid_".$userid."_nortification";
                                                     $t=$_SESSION['user_id'];
                                                     $survey_id=$_SESSION['current_survey_name_id'];
                                                     $sql="INSERT INTO $table_name_nort(FriendName,Nortification,Status,SurveyName,SurveyId,DayCreated) VALUES ('$t','1','created','$temp_pure_name','$survey_id','$current_date')";
                                                		$run4=mysqli_query($con,$sql);
                                                		if($run4)
                                                		{
                                                		    echo "stored";
                                                		}
                                                		else
                                                		echo "no";
                                                	
                                                 }
                                                 
                                                 
                                                
                                            }
                                                                                        
                                        }
                                    }
                                }
                                
                                
                                //creating table for survey comment
                                $table=$table_name."_comments";
                                $sql="CREATE TABLE $table(ID  INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Comment TEXT NULL, DateTime DATETIME NULL, Person INT(50) NULL)";
		
	                        	if($con1->query($sql))
                                
                                
								 // creating another user id member location table
								$table_name_mem="userid_".$_SESSION['user_id']."_member_survey_location";
								$column_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
								$sql="ALTER TABLE $table_name_mem ADD $column_name INT(10) NULL";
								$add=mysqli_query($con,$sql);
								
								// creating another user id member history table
								$table_name_mem="userid_".$_SESSION['user_id']."_history";
								$column_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
								$sql="ALTER TABLE $table_name_mem ADD $column_name INT(10) NULL";
								$add=mysqli_query($con,$sql);
								
								// creating another user id member ip table
								$table_name_mem="userid_".$_SESSION['user_id']."_member_ip";
								$column_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
								$sql="ALTER TABLE $table_name_mem ADD $column_name VARCHAR(50) NULL";
								$add=mysqli_query($con,$sql);
								
								//creating another table for survey ques comments
								$table_name_com_ques="userid_".$_SESSION['user_id']."_surveyid_".$_SESSION['current_survey_name_id']."_survey_ques_comment";
								$sql="CREATE TABLE $table_name_com_ques(ID INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
								$run=mysqli_query($con1,$sql);
                                
                                //update total survey in user table
                                $total_survey=0;
                                $sql="SELECT * FROM users WHERE ID='$id'";
                        		$run=mysqli_query($con,$sql);
                        		if(mysqli_num_rows($run)>0)
                        		{
                        			$data=mysqli_fetch_assoc($run);
                        			$total_survey=$data['TotalSurvey']+1;
                        			$sql="UPDATE users SET TotalSurvey='$total_survey' WHERE ID='$id'";
	                        	    $run=mysqli_query($con,$sql);
                        		}
                        		
                        		//updating time of create
                        		$my_date = date("H:i:s");
                                $user_id="userid_".$_SESSION['user_id'];
                                $sql="UPDATE $user_id SET Online_Status='$my_date' WHERE ID='$user_id'";
                            	$run=mysqli_query($con,$sql);
		
                                //now getting id from ques order
                                $sql="SELECT * FROM $table_name WHERE Ques_Order='$t1'";
                        		$run=mysqli_query($con1,$sql);
                        		if(mysqli_num_rows($run)>0)
                        		{
                        			$data=mysqli_fetch_assoc($run);
                        			$_SESSION['current_survey_page']=1;
                        			$_SESSION['current_ques_id']=$data['ID'];
                        			
                        			//updating on all survey name page
                        			$survey_name=$temp_pure_name;
                        			$user_id=$_SESSION['user_id'];
                        			$survey_id=$_SESSION['current_survey_name_id'];
                        			$people_respond=0;
                        			$user_survey_table=$_SESSION['user_survey_id'];;
                        			$sql="INSERT INTO All_Survey_Name(Survey_Name,User_Id,Survey_Id,People_Respond,Survey_User_Id) VALUES ('$survey_name','$user_id','$survey_id','$people_respond','$user_survey_table')";
                        			$run54=mysqli_query($con,$sql);
                        			if($run54)
                        			{
                        			    //get updated id 
                        			    $sql="SELECT * FROM All_Survey_Name WHERE Survey_User_Id='$user_survey_table'";
                                		$run56=mysqli_query($con,$sql);
                                		if(mysqli_num_rows($run56)>0)
                                		{
                                			$data=mysqli_fetch_assoc($run56);
                                			$_SESSION['all_survey_id']=$data['ID'];
                                				// redirect to create survey page
                                           header("Location: surveyeditor.php?show_desktop_mode=true");
                				        	ob_end_flush();
                				        	exit();
                                		}
                                		
                        			}
                        			else
                        			{
                        			    header("Location: profile.php?surveycreate=errorsurveyname");
								        ob_end_flush();
								        exit();
                        			}
                        		}
                        		else
                        		{
                        			echo "Not Updated ques";
                        		}
                            }
							else
							{
								header("Location: profile.php?surveycreate=errorinitialize");
								ob_end_flush();
								exit();
							}
            			}
            		else
            			{
            			    header("Location: profile.php?surveycreate=errorcreatingtable");
						    ob_end_flush();
						    exit();
            			}
                    
                   
						
               }
        }
        else
        {
           header("Location: profile.php?surveycreate=error");
						ob_end_flush();
						exit();
        }
    }
    }
        
    }
    
    //--------------------------------------------------edit function of on surveyname button click--------------------
    
   //calculating number rows of survey for forloop length
    $user_table_id="userid_".$_SESSION['user_id'];
    $result = mysqli_query($con,"select count(1) FROM $user_table_id");
    $row = mysqli_fetch_array($result);
    $total = $row[0];
    
    for($i=1;$i<=$total;$i++)
    {
        //getting survey name one by one and match
        $sql="SELECT * FROM $user_table_id";
        $run=mysqli_query($con,$sql);
        if($run)
        {
           
            while($data=mysqli_fetch_assoc($run))
            {
                $temp=$data['SurveyName'];//for edit
				$temp_r="result_".$data['SurveyName'];
				$temp_o="opt_".$data['SurveyName'];
				$temp_d="delete_".$data['SurveyName'];
				$survey_state=$data['ActiveSurvey'];
                if(isset($_POST[$temp]))//-----------------------------------------------edit portion
                {
                    $table_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
                    $_SESSION['current_survey_name_id']=$data['ID'];
					$_SESSION['current_survey_page']=1;
            		$_SESSION["user_survey_id"]=$table_name;//saving table name of survey of clicked button
            		if($survey_state==0)$state="deactivated";else $state="activated";
            		$_SESSION['survey_state']=$state;
            		$sql="SELECT * FROM $table_name";
            		$run=mysqli_query($con1,$sql);
            		if(mysqli_num_rows($run)>0)
            		{
            		    while($data=mysqli_fetch_assoc($run))
            		    {
            		        if($data['Save_Ques']==0)
            		        {
            		            $_SESSION['current_ques_id']=$data['ID'];
            		            break;
            		        }
            		        else
            		        $_SESSION['current_ques_id']=0;
            		    }
            		}
                   
                     header("Location: surveyeditor.php?show_desktop_mode=true");
                    ob_end_flush();
                    exit();
                }
				elseif(isset($_POST[$temp_r]))//-----------------------------------------------result portion
                {
					$table_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
					$_SESSION["user_survey_id"]=$table_name;
					$_SESSION['current_survey_page']=1;
					$_SESSION['current_survey_name_id']=$data['ID'];
						
					header("Location: result.php?user=".$_SESSION['user_id']."&&survey=".$_SESSION['current_survey_name_id']);
					ob_end_flush();
					exit();
					
				}
				elseif(isset($_POST[$temp_o]))//-----------------------------------------------optimize portion
				{
					$table_name="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
					$user_id=$_SESSION['user_id'];
					$current_survey_id=$data['ID'];
					$_SESSION['page']=1;
					$_SESSION["user_survey_id"]=$table_name;
					$_SESSION['current_survey_page']=1;
					$_SESSION['current_survey_name_id']=$data['ID'];
					if($survey_state==0)$state="deactivated";else $state="activated";
					$_SESSION['survey_state']=$state;
					header("Location: survey_optimize.php?user=".$user_id."&&survey=".$current_survey_id."&&survey_state=".$state);
					ob_end_flush();
					exit();
				}
				elseif(isset($_POST[$temp_d]))//-----------------------------------------------delete portion
                {
					//drop survey table
					$done=0;
					$current_survey_name_id=$data['ID'];
					$table_name1="userid_".$_SESSION['user_id']."_surveyid_".$data['ID'];
                    $sql="DROP TABLE $table_name1";
					
					if($con1->query($sql))
					{
						//delete survey name and rest details from userid table
						$sql="DELETE FROM $user_table_id WHERE ID='$current_survey_name_id'";
						$run=mysqli_query($con,$sql);
						if($run)
						{
						    //delete survey name from nortification list of friends
						    $table_freind_list="userid_".$_SESSION['user_id']."_friend_list";
						    $sql="SELECT * FROM $table_freind_list";
						    $run2=mysqli_query($con,$sql);
						    if($run2)
						    {
						        while($data2=mysqli_fetch_assoc($run2))
						        {
									
						            if($data2['State']=='follower')
						            {
						                $friend_id=$data2['FriendName'];
						                $table="userid_".$friend_id."_nortification";
						                $sql="DELETE FROM $table WHERE SurveyId='$current_survey_name_id'";
	                                	$run3=mysqli_query($con,$sql);
	                                	
						            }
						        }
						    
						        
						    }
						    
						    //delete survey comments
						    $table="userid_".$_SESSION['user_id']."_surveyid_".$current_survey_name_id."_comments";
						    $sql="DROP TABLE $table";
		                    $con1->query($sql);
						    
						    $id=$_SESSION['user_id'];
							//delete survey ques comment table
							$table_name_com_ques="userid_".$_SESSION['user_id']."_surveyid_".$current_survey_name_id."_survey_ques_comment";
							$sql="DROP TABLE $table_name_com_ques";
							$con1->query($sql);
							
							//delete column in userid member location table
							$table_name="userid_".$_SESSION['user_id']."_member_ip";
							$column=$table_name1;
							$sql="ALTER TABLE $table_name DROP $column";
							$add=mysqli_query($con,$sql);
							
							//delete column in userid member location table
							$table_name="userid_".$_SESSION['user_id']."_history";
							$column=$table_name1;
							$sql="ALTER TABLE $table_name DROP $column";
							$add=mysqli_query($con,$sql);
							
							//delete row from all survey name table
							$all_id="userid_".$_SESSION['user_id']."_surveyid_".$current_survey_name_id;
							$sql="DELETE FROM All_Survey_Name WHERE Survey_User_Id='$all_id'";
                    		$run=mysqli_query($con,$sql);
                    		
							 //update total survey in user table
                            $total_survey=0;
                            $sql="SELECT * FROM users WHERE ID='$id'";
                        	$run=mysqli_query($con,$sql);
                        	if(mysqli_num_rows($run)>0)
                        	{
                        		$data=mysqli_fetch_assoc($run);
                        		$total_survey=$data['TotalSurvey']-1;
                        		$sql="UPDATE users SET TotalSurvey='$total_survey' WHERE ID='$id'";
	                       	    $run=mysqli_query($con,$sql);
                        	}
                        		
							//delete column in userid member location table
							$table_name="userid_".$_SESSION['user_id']."_member_survey_location";
							$column=$table_name1;
							$sql="ALTER TABLE $table_name DROP $column";
							$add=mysqli_query($con,$sql);
							if($add)
							{
								header("Location: profile.php");
								ob_end_flush();
								exit();
							}
							else
							{
								header("Location: profile.php?unable to delete in user table");
								ob_end_flush();
								exit();
							}
							
							
							
						}
						else
						{
							header("Location: profile.php?unable to delete in user table");
							ob_end_flush();
							exit();
						}
						
					}
					else
					{
						header("Location: profile.php?tablenotdroped");
						ob_end_flush();
						exit();
					}
                
				}
           
			}
		}
		else
		{
			header("Location: login.php?");
			ob_end_flush();
			exit();
		}
        
       
    }
    
    
    //for trending more button
    if(isset($_POST['submit_more']))
    {
        header("Location: ongoingsurvey.php?");
		ob_end_flush();
		exit();
    }
    


	
	
    
?>