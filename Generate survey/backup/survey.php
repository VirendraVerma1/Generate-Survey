<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_GET['user'])&&isset($_GET['survey'])&&isset($_GET['page']))
{
	
	check_ip();
	check_active();
	?>
		
	<?php
	
	$member_table_name="userid_".$_GET['user'];
	$member_survey_table_name=$member_table_name."_surveyid_".$_GET['survey'];
	$page_counter=0;//0 for no more page and 1 for there is still another page
	$_SESSION['member_user_table_id']=$_GET['user'];
	$_SESSION['member_survey_table_id']=$_GET['survey'];
	$_SESSION['page_member']=$_GET['page'];
	$survey_name="";$background_img="";$background_img_name=""; $day_created="";$day_last="";$enable_result_page=0;
	$background_img_name="";$survey_font="";$survey_color_font="";$survey_bold=0;$survey_italic=0;$survey_underline=0;$survey_outerline=0;$survey_size=0;
		$temp=$_GET['survey'];
		$sql="SELECT * FROM $member_table_name WHERE ID='$temp'";
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
            $day_created=$data['DayCreated'];
            $day_last=$data['DayLeft'];
            $enable_result_page=$data['EnableResultPage'];
                
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
			header("Location: errorlink.php");
			ob_end_flush();
			exit();
		}
		 $link="https://createsurvey.000webhostapp.com/result.php?surveyname=".$survey_name."&&user=".$_GET['user']."&&survey=".$_GET['survey']."&&page=1";
	
		
		?>
		
				<html>
				<head>
					<title><?php echo $survey_name;?></title>
				</head>
				
				<body background="dataimg/<?php echo $background_img_name;?>" style="background-position:center;backgrund-repeat:no-repeat;background-size:cover;">
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
					
				<?php	//check if users enable result page
                
                    $created_date=$day_created;
                    $day_left=$day_last;
                    $t1=strtotime($created_date);
                      $t2=strtotime($day_left);
                      if($t1>$t2&&$enable_result_page)
                      {
                           
                       ?>
                        <h3 align="center" style="margin-top:100px;">Survey time over<br>
                        <div align="center" style="margin-top:20;">
                           <a href="<?php echo $link;?>">Check Result of Survey </a> 
                        </div>
                        
                        </h3>
                       
                       <?php
                   }
                   else
                   {
                       ?>
                        
                            <form action="survey_php.php" method="POST">
					<!-------main survey part------>
					<div align="center">
						
						<?php
							//---------------------------------------------------------------fetching data from db-------------------------------
							$multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;$taking_text_size=0;
							$sql="SELECT * FROM $member_survey_table_name";
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
									$idc=$data['ID'];
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
																			?><select name="Option<?php echo $data['ID'];?>"><?php
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
																							 
																							 <input type="radio" name="Option<?php if($multiple) echo $i.$data['ID'];else echo $data['ID'];?>" value="Result<?php  echo $i;?>" <?php if($required) echo "required";?>>
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
																							
																							 <input type="radio" name="Option<?php if($multiple) echo $i.$data['ID'];else echo $data['ID'];?>" value="Result<?php echo $i;?>" <?php if($required) echo "required";?>>
																							  <?php $temp="Option".$i;echo $data[$temp];?>
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
																							 
																							 <input type="checkbox" name="Option<?php echo $i.$data['ID'];?>" value="Result<?php  echo $i;?>" <?php if($required) echo "required";?>>
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
																							 
																							 <input type="checkbox" name="Option<?php echo $i.$data['ID'];?>" value="Result<?php  echo $i;?>" <?php if($required) echo "required";?>>
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 </p>
																						</td>
																						<?php
																					}
																				}
																				elseif($data['Answer_Type']=="Dropdown")// for dropdown answer type
																				{
																					
																					?>
																						
																							<option style="margin-left:30px;" value="Result<?php echo $i;?>">
																							<?php $temp="Option".$i; echo $data[$temp];?></option>
																						
																					<?php
																					
																				}
																				elseif($data['Answer_Type']=="Comment")// for dropdown answer type
																				{
																					
																					?>
																						
																							<input type="text" name="text_comment_<?php echo $idc;?>" <?php if($required) echo "required";?>>
																						
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
									if($_SESSION['page_member']>0)
									{
									?>
									Page <?php echo $_GET['page'];?>
									<?php
									}
									
									?>
									<input type="submit" value="Submit & Next Page" name="next_page">
									<?php
									
								}
								
								?>
							</p>
						
					</div>
					
					<?php
						if($page_counter==0)
						{
							?>
							<div align="center">
								<input type="submit" name="submit_survey" value="Submit">
							</div>
							<?php
						}
					?>
					
					<div align="center" style="margin-top:200px;">
						<p>SurveyBuilder@organization</p>
					</div>
					</form>
                       <?php
                   }
                
                ?>
                
					
				</body>
			</html>
		
		<?php
		
		

	
	
	
		
		
		
}
else
{
	header("Location: errorlink.php");
	ob_end_flush();
	exit();
}


?>

<?php
	function get_ip_address() {
			// check for shared internet/ISP IP
			if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
				return $_SERVER['HTTP_CLIENT_IP'];
			}

			// check for IPs passing through proxies
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				// check if multiple ips exist in var
				if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
					$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
					foreach ($iplist as $ip) {
						if (validate_ip($ip))
							return $ip;
					}
				} else {
					if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
						return $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
			}
			if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
				return $_SERVER['HTTP_X_FORWARDED'];
			if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
				return $_SERVER['HTTP_FORWARDED_FOR'];
			if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
				return $_SERVER['HTTP_FORWARDED'];

			// return unreliable ip since all else failed
			return $_SERVER['REMOTE_ADDR'];
		}
		function validate_ip($ip) {
			if (strtolower($ip) === 'unknown')
				return false;

			// generate ipv4 network address
			$ip = ip2long($ip);

			// if the ip is set and not equivalent to 255.255.255.255
			if ($ip !== false && $ip !== -1) {
				// make sure to get unsigned long representation of ip
				// due to discrepancies between 32 and 64 bit OSes and
				// signed numbers (ints default to signed in PHP)
				$ip = sprintf('%u', $ip);
				// do private network range checking
				if ($ip >= 0 && $ip <= 50331647) return false;
				if ($ip >= 167772160 && $ip <= 184549375) return false;
				if ($ip >= 2130706432 && $ip <= 2147483647) return false;
				if ($ip >= 2851995648 && $ip <= 2852061183) return false;
				if ($ip >= 2886729728 && $ip <= 2887778303) return false;
				if ($ip >= 3221225984 && $ip <= 3221226239) return false;
				if ($ip >= 3232235520 && $ip <= 3232301055) return false;
				if ($ip >= 4294967040) return false;
			}
			return true;
		}
?>

<?php
    function check_ip()
    {
        	//getting and checking ip
		$ip=get_ip_address();
	include("db_con.php");
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$_SESSION['member_ip']=$details->ip;
	$_SESSION['member_city']=$details->city;
	$_SESSION['member_country']= $details->country;
	$_SESSION['member_region']=$details->region;
		
		
	$temp_ip=$_SESSION['member_ip'];$temp="";
	//checking repeat ip
	$member_survey_table_name="userid_".$_GET['user']."_surveyid_".$_GET['survey'];
	$columnsurveyname=$member_survey_table_name;
	$table_name="userid_".$_GET['user']."_member_ip";
	$sql="SELECT * FROM $table_name";
	$run9=mysqli_query($con,$sql);
	if(mysqli_num_rows($run9)>0)
	{
	    
	    //something in table
	    while($data6=mysqli_fetch_assoc($run9))
	    {
	       
	        if(isset($data6[$columnsurveyname]))
	        {
	            $temp=$data6[$columnsurveyname];
	        }
	        if($temp_ip==$temp)
	        {
	            echo "got";
	            header("Location: thankyou.php?ip=sameip");
            	ob_end_flush();
            	exit();
	        }
	        
	        
	    }
	}
	
	
	
	//checking end
    }

?>

<?php
    function check_active()
    {
        include("db_con.php");
        $member_table_name="userid_".$_GET['user'];
    	$survey_id=$_GET['survey'];
    	$sql="SELECT * FROM $member_table_name WHERE ID='$survey_id'";
    	$run=mysqli_query($con,$sql);
    	if($run)
    	{
    	    $data=mysqli_fetch_assoc($run);
    	    if($data['ActiveSurvey'])
    	    {
    	        
    	    }
    	    else
    	    {
    	        header("Location: errorlink.php?ip=deactive");
            	ob_end_flush();
            	exit();
    	    }
    	}
    }
    
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

