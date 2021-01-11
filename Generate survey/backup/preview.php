<?php
ob_start();
session_start();
include("db_con.php");
if(isset($_GET['user'])&&isset($_GET['survey'])&&isset($_SESSION['user_id'])&&isset($_GET['page']))
{
	$user_table_name="userid_".$_GET['user'];
	$survey_table_name=$user_table_name."_surveyid_".$_GET['survey'];
	$page_counter=0;//0 for no more page and 1 for there is still another page
	if($_SESSION['user_id']==$_GET['user'])
	{
		$survey_name="";$background_img="";$background_img_name=""; 
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
					<title>
						<?php echo $survey_name;?>
					</title>
				</head>
				<body background="dataimg/<?php echo $background_img_name;?>" style="background-position:center;backgrund-repeat:no-repeat;background-size:cover;">
				<a href="surveyeditor.php">Back</a>
					<!---------survey Name------>
					<div align="center" style="margin-top:100px;">
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
					
					
					<!-------main survey part------>
					<div align="center">
						
						<?php
							//---------------------------------------------------------------fetching data from db-------------------------------
							$multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;$taking_text_size=0;
							$sql="SELECT * FROM $survey_table_name";
							$run=mysqli_query($con1,$sql);
							if(mysqli_num_rows($run)>0)
							{
								while($data=mysqli_fetch_assoc($run))
								{
									$taking_text_size=$data['Text_SizeQues'];
									if($data['Multiple'])$multiple=1;else $multiple=0;// checking if ques is multiple answer or not
									if($data['Required'])$required=1;else $required=0;
									if($data['Heading'])$heading=1;else $heading=0;
									if($data['Bold'])$bold=1;else $bold=0;
									if($data['Italic'])$italic=1;else $italic=0;
									if($data['Underline'])$underline=1;else $underline=0;
									$survey_ques_font=$data['FontFamilyQues'];
									if($data['Page']==$_GET['page'])
									{
										?>
									
										<table align="center">
												<tr>
													<td>
														<table style="margin-top:50px;"><!------table for ques order and ques---->
															
															
															<tr>
																<td>
																	<p style="width:20px;<?php echo "font-size:".$taking_text_size."px;";?>"><?php if($heading) echo " ";else echo $data['Ques_Order'].".";?></p>
																</td>
																<td>
																	<p style="width:400px;<?php echo "font-size:".$taking_text_size."px;";?><?php if($bold)echo "font-weight:bold;";if($italic) echo "font-style:italic;";if($underline) echo  "text-decoration:underline;"; echo "font-family:".$survey_ques_font.";";?>"><?php echo $data['Ques'];?></p>
																</td>
															</tr>
															
															<tr>
																<td colspan="1">
																	
																</td>
																<td>
																	<table><!------table for answers and ques---->
																		
																		<?php 
																		if($data['Answer_Type']=="Dropdown")// to use dropdown in column
																		{
																			?><select name="<?php $temp="Option".$i; echo $data[$temp];?>"><?php
																		}
																			if($data['Multiple'])$multiple=1;else $multiple=0;// checking if ques is multiple answer or not
																			if($data['Required'])$required=1;else $required=0;
																			for($i=1;$i<=$data['Answer_Options'];$i++)
																			{
																				if($data['Answer_Type']=="Radio")//for radio answer type
																				{
																					if($data['Answer_Options']>3)
																					{
																						?>
																						<tr>
																						<td >
																							 <p style="margin-left:30px;">
																							 
																							 <input type="radio" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 </p>
																						</td>
																						</tr>
																						<?php
																					}
																					else
																					{
																						?>
																						<td >
																							 <p style="margin-left:30px;">
																							
																							 <input type="radio" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>" value="good">
																							  <?php $temp="Option".$i; echo $data[$temp];?>
																							 </p>
																						</td>
																						<?php
																					}
																					
																				}
																				elseif($data['Answer_Type']=="Checkbox")// for checkbox answer type
																				{
																					if($data['Answer_Options']>3)
																					{
																						?>
																						<tr>
																						<td >
																							 <p style="margin-left:30px;">
																							 
																							 <input type="checkbox" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 </p>
																						</td>
																						</tr>
																						<?php
																					}
																					else
																					{
																						?>
																						<td >
																							 <p style="margin-left:30px;">
																							 
																							 <input type="checkbox" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 </p>
																						</td>
																						<?php
																					}
																				}
																				elseif($data['Answer_Type']=="Dropdown")// for dropdown answer type
																				{
																					
																					?>
																						
																							<option style="margin-left:30px;" value="<?php $temp="Option".$i; echo $data[$temp];?>">
																							<?php $temp="Option".$i; echo $data[$temp];?></option>
																						
																					<?php
																					
																				}
																				elseif($data['Answer_Type']=="Comment")// for dropdown answer type
																				{
																					
																					?>
																						
																							<input type="text" name="text_comment_" >
																						
																					<?php
																					
																				}
																			}
																			if($data['Answer_Type']=="Dropdown")//to use in a column
																			{
																				?></select><?php
																			}
																		?>
																		
																	</table>
																</td>
															</tr>
															
															
														</table>
													</td>
													
												</tr>
											</table>
									
									<?php
									}
									elseif($data['Page']==($_GET['page']+1))
									{
										$page_counter++;
									}
								}//end of while looop
							}
							else
							{
								header("Location: profile.php");
								ob_end_flush();
								exit();
							}
						?>
						
					</div>
					<!--------page name and button----->
					<div align="center" style="margin-top:100px;">
						<form action="preview_php.php" method="POST">
						<p>
						<?php 
							if($_GET['page']>1)
							{
								?>
									<input type="submit" value="Prev Page" name="prev_page">
								<?php
								
							}
						?>
							
								
								<?php
								if($page_counter>0)
								{
									if($_SESSION['page']>0)
									{
									?>
									Page <?php echo $_GET['page'];?>
									<?php
									}
									
									?>
									<input type="submit" value="Next Page" name="next_page">
									<?php
									
								}
								
								?>
							</p>
						</form>
					</div>
					
					<?php
						if($page_counter==0)
						{
							?><form action="preview_php.php" method="POST">
							<div align="center">
								<input type="submit" name="submit_start_survey" value="Start Survey">
							</div></form>
							<?php
						}
					?>
					
					<div align="center" style="margin-top:100px;">
						<p>SurveyBuilder@organization</p>
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
	header("Location: login.php");
	ob_end_flush();
	exit();
}
?>

