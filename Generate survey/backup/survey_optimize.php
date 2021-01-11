<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_SESSION['user_id'])&&isset($_GET['user'])&&isset($_GET['survey'])&&isset($_GET['survey_state']))
{
	$user_table_name="userid_".$_GET['user'];
	$survey_table_name=$user_table_name."_surveyid_".$_GET['survey'];
	$page_counter=0;//0 for no more page and 1 for there is still another page
	if($_SESSION['user_id']==$_GET['user'])
	{
		$survey_name="";$background_img="";$background_img_name=""; $date="";$enable_result_page=0;$enable_comment=0;$enable_rate=0;$enable_public=0;$day_left=0;
		$background_img_name="";$survey_font="";$survey_color_font="";$survey_bold=0;$survey_italic=0;$survey_underline=0;$survey_outerline=0;$survey_size=0;
		$temp=$_GET['survey'];
		$sql="SELECT * FROM $user_table_name WHERE ID='$temp'";
		$run=mysqli_query($con,$sql);
		if(mysqli_num_rows($run)>0)
		{
			$data=mysqli_fetch_assoc($run);
			if($data['SurveyBackgroundPic'])$background_img_name=$data['SurveyBackgroundPic'];
			$survey_name1=$data['SurveyName'];
			$survey_font=$data['SurveyFont'];
			$survey_color_font=$data['SurveyFontColor'];
			$survey_bold=$data['Bold'];
			$survey_italic=$data['Italic'];
			$survey_underline=$data['Underline'];
			$survey_outerline=$data['Outerline'];
			$survey_size=$data['Size'];
			$date=$data['DayCreated'];
			
			$day_left=$data['DayLeft'];
			$enable_rate=$data['EnableRate'];
			$enable_public=$data['EnablePublic'];
			$enable_comment=$data['EnableComment'];
			$enable_result_page=$data['EnableResultPage'];
			//taking pure name while removing idate
			$string=$survey_name1;
    
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

						//removing underscores
			$link="https://createsurvey.000webhostapp.com/survey.php?surveyname=".$survey_name."&&user=".$_GET['user']."&&survey=".$_GET['survey']."&&page=1";
			$survey_name = str_replace('_', ' ', $survey_name);
			$background_img=$data['SurveyBackgroundPic'];
			
		}
		
		else
		{
			header("Location: profile.php");
			ob_end_flush();
			exit();
		}
		?>
			<html>
				<head>
					<title><?php echo $survey_name;?></title>
					<meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
				</head>
				
				<body>
					<a href="profile.php">Profile</a>
					
					<!----------day created---------------------->
					<div>
					    <h4> Day created: <?php echo $newDate = date("d-m-Y", strtotime($date));?></h4>
					    <h4><?php $today=date("Y/m/d"); echo day_left_f($today,$date);?> day</h4>
					</div>
					
					<!----for survey name---->
					<div align="center" style="margin-top:50px;">
						<h2 style="font-family:<?php echo $survey_font;?>;
									color:<?php echo $survey_color_font;?>;
									<?php if($survey_outerline) echo "text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;";?>
									<?php if($survey_underline) echo "text-decoration:underline;";?>
									<?php if($survey_italic) echo "font-style:italic;";?>
									<?php if($survey_bold) echo "font-weight:bold;";?>
									<?php if($survey_size) echo "font-size:".$survey_size."px;";?>
									">
									<?php echo $survey_name;?>
						
						</h2>
					</div>
					
					<!---------make survey active or non active------->
					<div align="right">
					    <h2 style="color:<?php if($_SESSION['survey_state']=='activated')echo 'green';else echo 'red';?>"><?php echo $_SESSION['survey_state']; ?></h2>
					</div>
					
					<div style="margin-top:100px;float:right;">
						<form action="survey_optimize_php.php" method="POST">
						<div>
							<button type="submit" name="submit_active_survey" ><?php if($_GET['survey_state']=="activated")echo "Activated";else echo "Activate";?></button>
						</div>
						<div>
							<button type="submit" name="submit_deactive_survey" ><?php if($_GET['survey_state']=="deactivated")echo "Deactivated";else echo "Deactivate";?></button>
						</div>
						</form>
					</div>
					
					<!----for sharable link----->
					<div align="center" style="margin-top:50px;">
						<h4>Here's your sharable link</h4>
						<input style="width:700px;" type="text" value="<?php echo $link;?>">
					</div>
					<!-------------------Option table---------->
					
					<div align="left">
					    <form  action="survey_optimize_php.php" method="POST">
					        <table border="1">
					            <tr>
					                <td>
					                   <h3>Optionl features for Participants</h3> 
					                </td>
					            </tr>
					            
					            <tr>
					                <td>
					                    <input type="checkbox" name="enable_result_page"  <?php if($enable_result_page)echo "checked";else echo "";?>>Enable Result Page
					                    <input type="date" name="day_left" placeholder="Enter number of day you want to end" value="">
					                </td>
					            </tr>
					            <tr>
					                <td>
					                    <?php if($day_left&&$enable_result_page)echo date("d-m-Y", strtotime($day_left))." Result Day"; ?>
					                </td>
					            </tr>
					            <tr>
					                <td>
					                    <input type="checkbox" name="enable_comment" <?php if($enable_comment)echo "checked";else echo "";?> >Enable Comments 
					                </td>
					            </tr>
					            <tr>
					                <td>
					                    <input type="checkbox" name="enable_rate" <?php if($enable_rate)echo "checked";else echo "";?> >Enable Rate 
					                </td>
					            </tr>
					            <tr>
					                <td>
					                    <input type="checkbox" name="enable_public" <?php if($enable_public)echo "checked";else echo "";?> >Enable Public
					                </td>
					            </tr>
					            <tr>
					                <td  align="center">
					                   <button type="submit" name="submit_participant_feature">Change</button>
					                </td>
					            </tr>
					        </table>
					        
					    </form>
					</div>
					<!---------------------Option table ends--------------->
					
					
					
					
					
					
					
					
					
					<!----------area for showing location to user--start---->
						<div align="center" style="margin-top:100px;">
							 <form action="survey_optimize_php.php" method="POST">
							<table>
							<tr>
							
							<td><input type="submit" name="country_submit" value="Country"></td>
							<td><input type="submit" name="region_submit" value="Region"></td>
							<td><input type="submit" name="city_submit" value="City"></td>
							
							</tr>
							</table>
							</form>
							
							
							
							
							<!-------getting location ------>
							<table>
							
							    <?php get_location();?>
							</table>
							<!------getting location end--->
							
							<br>
							<hr width="400px">
							<br>
							<!----getting history-------->
							<table>
							    <?php get_history(); ?>
							</table>
							<!----getting history end----->
							
						</div>
						
					<!----------area for showing location to user-end----->
					<div align="center" style="margin-top:300px;">
						*option to change last date min 7day max 1 year<br>
						*can see from which country or state this survey is done in numbers<br>
						*can make survey profile image if user want<br>
						*a button for user profile edit<br>
						*here is also a comment box if his members want to give some advice ralated survey<br>
					</div>
					
				</body>
			</html>
		<?php
	
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
	header("Location: profile.php");
	ob_end_flush();
	exit();
}
?>

<?php
    function get_history()
    {
        include("db_con.php");
        ?><form action="survey_optimize_php.php" method="POST">
            <tr>
                <td>
                    <input type="submit" name="day_history" value="Day">
                </td>
                <td>
                    <input type="submit" name="month_history" value="Month">
                </td>
                
            </tr>
        </form>
        <?php
        //variables
            $flag_month=0;$flag_year=0;$flag_day=0;
            $name_array=array();
            $value_array=array();
            $counter=0;$num=0;
            $user_table_name="userid_".$_GET['user'];
            $survey_table_name=$user_table_name."_surveyid_".$_GET['survey'];
        //fetching data
        $table_name="userid_".$_SESSION['user_id']."_history";
        $sql="SELECT * FROM $table_name ORDER BY ID DESC";
        $run=mysqli_query($con,$sql);
        if($run)
        {
            while($data=mysqli_fetch_assoc($run))
            {
                if(isset($_GET['history']))
                {
                    if($_GET['history']=='month')
                    {
                        $flag_month=1;
                        $name_array[$counter]=$data['Month'];
                        $value_array[$counter]=$data[$survey_table_name];
                        $counter++;
                    }
                    
                }
                else
                {
                    $flag_day=1;
                    //show default day
                    $name_array[$counter]=$data['Day']." Day";
                    $value_array[$counter]=$data[$survey_table_name];
                    $counter++;
                    
                }
            }//end of while loop
        }/**/
        
        /* */
        
        ?>
        <div class="container">
									
				<canvas id="pie-chart<?php echo $num;?>" width="300px"></canvas>
    	</div>

			<script>
				new Chart(document.getElementById("pie-chart<?php echo $num;$num++;?>"), {
				    
				type: 'horizontalBar',
				data: {
    		  labels: [<?php for($i=0;$i<sizeof($name_array);$i++){$str= "/".$name_array[$i]."/"; $new_str = str_replace('/', '"', $str);if($i==sizeof($name_array)) echo $new_str;else echo $new_str.','; }?>],
			  datasets: [{
			label: "",
				backgroundColor: ["cyan", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","lightgreen","lightblue","lightred","lightpink","lightyellow"],
				data: [<?php for($i=0;$i<sizeof($value_array);$i++){if($i==sizeof($value_array)) echo $value_array[$i];else echo $value_array[$i].','; }?>]
		        }]
				},
				options: {
				    scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                beginAtZero: true,
                                display: true
                                
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 0,
                                max: 100
                            }
                        }]
                },
				title: {
			display: true,
				text: '<?php echo "Day";?>',
				fontSize:30
			  }
			}
			
			
		});
	</script>
        
        <?php
    }//end of function

?>







<?php
                    function day_left_f($created_date,$day_left)
                    {
                       $t1= date("d-m-Y", strtotime($created_date));
                       $t1=str_replace("-","/",$t1);
                      $t2= date("d-m-Y", strtotime($day_left));
                      $t2=str_replace("-","/",$t2);
                      $t1=strtotime($created_date);
                      $t2=strtotime($day_left);
                        $diff= $t2-$t1;
                        return abs(floor($diff/(60*60*24)));
                    }
?>

<?php

function get_location()
{
							//getting total number of people respond location
						
							include("db_con.php");
							$total_respond=0;$name_arr=array();$value_arr=array();$count=0;$index=0;
							$table_name="userid_".$_SESSION['user_id'];
							$column_name=$_SESSION['user_survey_id'];
							$sql="SELECT * FROM $table_name WHERE ID=".$_SESSION['current_survey_name_id'];
							
							$run2=mysqli_query($con,$sql);
							if($run2)
							{
								$data=mysqli_fetch_assoc($run2);
								$total_respond=$data['PeopleRespond'];
							}
							// getting city ingo from url
							$table_name="userid_".$_SESSION['user_id']."_member_survey_location";
							$sql="SELECT * FROM $table_name";
							$run1=mysqli_query($con,$sql);
							if(mysqli_num_rows($run1))
							{
								
							
								if(isset($_GET['location'])&&($_GET['location']=='city'||$_GET['location']=='country'))
								{
									if($_GET['location']=='city')
									{
										?>
										<tr><td><p style="font-size:30px;text-decoration:underline;">City</p></td><td></td></tr>
										<?php
										while($data=mysqli_fetch_assoc($run1))
										{
											$id=$data['ID'];$flag=0;
											for($i=0;$i<sizeof($name_arr);$i++)
											{
												if($data["City"]==$name_arr[$i])
												{
													$flag++;
													$value_arr[$i]=$value_arr[$i]+$data[$column_name];
												}
											}
											if($flag==0)
											{
												$name_arr[$index]=$data["City"];
												$value_arr[$index]=$data[$column_name];
												$count=$count+$value_arr[$index];
												$index++;
											}
											
										}
										echo $count;
										for($i=0;$i<sizeof($name_arr);$i++)
										{
											if($total_respond>0){$per=$value_arr[$i]/$total_respond*500;}else $per=0;
											if($value_arr[$i]>0)
											{
											?>
												<tr>
													<td><p style="float:right;"><?php echo $name_arr[$i]; ?>|</p></td>
													<td style="width:500px;"><div style="width:<?php echo $per;?>px;background:lightgreen;"><?php echo $value_arr[$i];?></div></td>
												</tr>
											<?php
											}
										}
										unset($name_arr);
										unset($value_arr);
									}
									elseif($_GET['location']=='country')
									{
										?>
										<tr><td><p style="font-size:30px;text-decoration:underline;">Country</p></td><td></td></tr>
										<?php
										while($data=mysqli_fetch_assoc($run1))
										{
											$id=$data['ID'];$flag=0;
											for($i=0;$i<sizeof($name_arr);$i++)
											{
												if($data["Country"]==$name_arr[$i])
												{
													$flag++;
													$value_arr[$i]=$value_arr[$i]+$data[$column_name];
												}
											}
											if($flag==0)
											{
												$name_arr[$index]=$data["Country"];
												$value_arr[$index]=$data[$column_name];
												$count=$count+$value_arr[$index];
												$index++;
											}
											
										}
										echo $count;
										for($i=0;$i<sizeof($name_arr);$i++)
										{
											if($total_respond>0){$per=$value_arr[$i]/$total_respond*500;}else $per=0;
											if($value_arr[$i]>0)
											{
											?>
												<tr>
													<td><p style="float:right;"><?php echo $name_arr[$i]; ?>|</p></td>
													<td style="width:500px;"><div style="width:<?php echo $per;?>px;background:lightgreen;"><?php echo $value_arr[$i];?></div></td>
												</tr>
											<?php
											}
										}
										unset($name_arr);
										unset($value_arr);
									}
								}
								else
								{
									//show region
									?>
										<tr><td><p style="font-size:30px;text-decoration:underline;">Region</p></td><td></td></tr>
										<?php
									while($data=mysqli_fetch_assoc($run1))
										{
											$id=$data['ID'];$flag=0;
											for($i=0;$i<sizeof($name_arr);$i++)
											{
												if($data["Region"]==$name_arr[$i])
												{
													$flag++;
													$value_arr[$i]=$value_arr[$i]+$data[$column_name];
												}
											}
											if($flag==0)
											{
												$name_arr[$index]=$data["Region"];
												$value_arr[$index]=$data[$column_name];
												$count=$count+$value_arr[$index];
												$index++;
											}
											
										}
										echo $count;
										for($i=0;$i<sizeof($name_arr);$i++)
										{
											if($total_respond>0){$per=$value_arr[$i]/$total_respond*500;}else $per=0;
											if($value_arr[$i]>0)
											{
											?>
												<tr>
													<td><p style="float:right;"><?php echo $name_arr[$i]; ?>|</p></td>
													<td style="width:500px;"><div style="width:<?php echo $per;?>px;background:lightgreen;"><?php echo $value_arr[$i];?></div></td>
												</tr>
											<?php
											}
										}
										unset($name_arr);
										unset($value_arr);
								}
							}
						//getting location end
}