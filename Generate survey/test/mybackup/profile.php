<?php
ob_start();
    session_start();
    
    if(isset($_SESSION["user_id"]))
    {
                ?>
                <html>
            <head>
                <title> <?php
                             include("../db_con.php");
                             $id=$_SESSION["user_id"];
                             $sql="SELECT * FROM users WHERE ID='$id'";
                             $run=mysqli_query($con,$sql);
                             if(mysqli_num_rows($run)>0)
                             {
                                $data=mysqli_fetch_assoc($run);
                                echo $data['Username'];
                             }
                        ?>
                </title>
            </head>
            
            <body>
                
                <h1 align="center" >Profile</h1>
                <div>
                    <form action="logout.php" method="POST">
                        <div align="right" style="margin-top:0px;margin-right:50px;" >
                            <input type="submit" name="submit_logout" value="logout">
                        </div>
                    </form>
                </div>
                
                <div align="center" style="margin-top:100px;">
                <form action="profile_php.php" method="POST">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="survey_name" placeholder="Survey Name" required>
                                
                            </td>
                        </tr>
                        
                        
                        <tr align="center">
                            <td>
                                <input type="submit" name="submit_surveycreate" value="CREATE">
                                
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
                
                <div align="center">
                    <a href="createsurvey.php">Test design of survey editor</a>
                </div>
                
                
                
                
                <form action="profile_php.php" method="POST">
                <div align="center" style="margin-top:100px;">
                    <h2 align="center">Your Survey</h2>
                    <table style="margin-top:50px;">
                        <tr>
                            <?php getsurvey(); ?>
                        </tr>
                        
                    </table>
                </div>
                </form>
                
                
            </body>
        </html>
        <?php
    }
    
    else
    {
         header("Location: login.php");
        				    ob_end_flush();
                            exit();
    }
    
    
?>


<?php
    
    function getsurvey()
    {
        include("../db_con.php");
        $userid="userid_".$_SESSION['user_id'];
        $sql="SELECT * FROM $userid";
        $run=mysqli_query($con,$sql);
        if(mysqli_num_rows($run)>0)
        {
           while($data=mysqli_fetch_assoc($run))
			{
			    //extracting id and name from survey name
                    $string=$data['SurveyName'];
                      $survey_name="";
                      $survey_id;
                      
                        for($i=0;$i<strlen($string);$i++)
                        {
                            if($string[$i]=="_"&&$string[$i+1]=="i"&&$string[$i+2]=="d"&&$string[$i+3]=="_")
                            {
                               for($j=$i+4;$j<strlen($string);$j++)
                               {
                                   $survey_id = $string[$j];
                               }
                               break;
                            }
                            else
                            {
                                $survey_name .= $string[$i];
                            }
                        }
                    
                        $survey_name=str_replace("_"," ",$survey_name);
                        
                        
                        
                        
                        
				?>
				
				   <tr><h4>
                        <td>
						
						
						<?php echo $survey_name; ?>   
                            <input style="margin-left:100px;height:50px;text:20px;" type="submit" name="<?php echo $data['SurveyName'];?>" value="Edit">
                        
						</td>
						<td style="margin-left:50px;">
							<input style="margin-left:100px;height:50px;text:20px;" type="submit" name="opt_<?php echo $data['SurveyName'];?>" value="Optimize">
						</td>
						<td style="margin-left:50px;">
							<input style="margin-left:100px;height:50px;text:20px;" type="submit" name="result_<?php echo $data['SurveyName'];?>" value="Result">
						</td>
						<td style="margin-left:50px;">
							<input style="margin-left:100px;height:50px;text:20px;" type="submit" name="delete_<?php echo $data['SurveyName'];?>" value="Delete">
						
						</td>
						</h4>
                   </tr>     
                   
				
				<?php
			}
        }
        else
        {
            echo "no survey found";
        }
    }
    
?>
