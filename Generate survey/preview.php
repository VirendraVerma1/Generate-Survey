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
		$outer_div=0;$inner_div=0;$outer_div_color="";$inner_div_color="";$theme_black=0;
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
			$outer_div=$data['OuterDiv'];
			$inner_div=$data['InnerDiv'];
			$outer_div_color=$data['OuterDivColor'];
			$inner_div_color=$data['InnerDivColor'];
			$theme_black=$data['ThemeBlack'];
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
	    	<!DOCTYPE html>
            <html>
            <head>
            	<title><?php echo $survey_name;?></title>
            	<meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="icon" href="img/icon.png">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
              <link rel="stylesheet" type="text/css" href="css/fixed.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
              <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
            
            
              <style type="text/css">
              	
              	 @import url('https://fonts.googleapis.com/css?family=Sarabun:200,700');
             body{
            	overflow-x: hidden;
            	font-family: 'Sarabun', sans-serif;
            	color: #505962;
            }
            body, html {
              height: 100%;
              margin: 0;
            }
            
            .bg {
              /* The image used */
              background-image: url("dataimg/<?php echo $background_img_name;?>");
            
              /* Full height */
              height: auto; 
            
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            
            
            .search {
              display: block;
              position: relative;
              padding-left: 35px;
              margin-bottom: 12px;
              cursor: pointer;
              font-size: 22px;
              user-select: none;
            }
            
            /* Hide the browser's default checkbox */
            .search input {
              position: absolute;
              opacity: 0;
              cursor: pointer;
              height: 0;
              width: 0;
            }
            
            /* Create a custom checkbox */
            .checkmark {
              position: absolute;
              top: 0;
              left: 0;
              height: 25px;
              width: 25px;
              background-color: #eee;
            }
            
            /* On mouse-over, add a grey background color */
            .search:hover input ~ .checkmark {
              background-color: #ccc;
            }
            
            /* When the checkbox is checked, add a blue background */
            .search input:checked ~ .checkmark {
              background-color: #2196F3;
            }
            
            /* Create the checkmark/indicator (hidden when not checked) */
            .checkmark:after {
              content: "";
              position: absolute;
              display: none;
            }
            
            /* Show the checkmark when checked */
            .search input:checked ~ .checkmark:after {
              display: block;
            }
            
            /* Style the checkmark/indicator */
            .search .checkmark:after {
              left: 9px;
              top: 5px;
              width: 5px;
              height: 10px;
              border: solid white;
              border-width: 0 3px 3px 0;
              transform: rotate(45deg);
            }
            
            /*-----------------------------for radio---------------------------*/
            /* Customize the label (the container) */
            .container_radio {
              display: block;
              position: relative;
              padding-left: 35px;
              margin-bottom: 12px;
              cursor: pointer;
              font-size: 22px;
              
              user-select: none;
            }
            
            /* Hide the browser's default radio button */
            .container_radio input {
              position: absolute;
              opacity: 0;
              cursor: pointer;
              height: 0;
              width: 0;
            }
            
            /* Create a custom radio button */
            .checkmark_radio {
              position: absolute;
              top: 0;
              left: 0;
              height: 25px;
              width: 25px;
              background-color: #eee;
              border-radius: 50%;
            }
            
            /* On mouse-over, add a grey background color */
            .container_radio:hover input ~ .checkmark_radio {
              background-color: #ccc;
            }
            
            /* When the radio button is checked, add a blue background */
            .container_radio input:checked ~ .checkmark_radio {
              background-color: #2196F3;
            }
            
            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark_radio:after {
              content: "";
              position: absolute;
              display: none;
            }
            
            /* Show the indicator (dot/circle) when checked */
            .container_radio input:checked ~ .checkmark_radio:after {
              display: block;
            }
            
            /* Style the indicator (dot/circle) */
            .container_radio .checkmark_radio:after {
              top: 9px;
              left: 9px;
              width: 8px;
              height: 8px;
              border-radius: 50%;
              background: white;
            }
            .colour{
            	color: <?php if($theme_black)echo "white";else echo "black";?>;
            	font-weight: 500;
            }
            
            
              	
              </style>
            
            </head>
            
             <body>
            
                 <div class="bg">
                 	
                    <div class="col-12" >
                    	<div class="cards text-center" style="border:2px solid black">
                    		<div class="card-body" <?php if($_SESSION['screen_width']<=576){ ?>style="<?php if($outer_div)echo "background:".$outer_div_color;?>"<?php }?>>
                    		
							<div align="center">
							<div style="<?php if($_SESSION['screen_width']>576)echo "width:550px";?>;<?php if($outer_div)echo "background:".$outer_div_color;?>">
							<br>
                               <h5 class="display-4 " style="font-family:<?php echo $survey_font;?>;
									color:<?php echo $survey_color_font;?>;
									<?php if($survey_outerline) echo "text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;";?>
									<?php if($survey_underline) echo "text-decoration:underline;";?>
									<?php if($survey_italic) echo "font-style:italic;";?>
									<?php if($survey_bold) echo "font-weight:bold;";?>
									<?php if($survey_size) echo "font-size:".$survey_size."px;";?>
									"><?php echo $survey_name;?></h5>
                                <br>
                               
            				   <div align="center">
            				    <div style="<?php if($_SESSION['screen_width']>576)echo "width:500px";?>">
            				        
            				        <!--------main survey part----->
            				        <?php
							//---------------------------------------------------------------fetching data from db-------------------------------
							$multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;$taking_text_size=0;
							$answer_options=0;
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
									$answer_options=$data['Answer_Options'];
									if($data['Page']==$_GET['page'])
									{
										?>
										<!-----------ques order and ques part------->
							
								<div style="padding:5px;color: <?php if($theme_black)echo "white";else echo "black";?>;border:2px;<?php if($inner_div)echo "background:".$inner_div_color.";";?>" >
            				      <h5 align="left" class="colour" style="<?php echo "font-size:".$taking_text_size."px;";?><?php if($bold)echo "font-weight:bold;";if($italic) echo "font-style:italic;";if($underline) echo  "text-decoration:underline;"; echo "font-family:".$survey_ques_font.";";?>"><?php if($heading) echo " ";else echo $data['Ques_Order'].". ";?><?php echo $data['Ques'];?></h5>
            				      <div align="left">
            				          <?php
            				            if($answer_options<=3&&$_SESSION['screen_width']>600)
            				           echo '<table><tr>';
            				           
            				          ?>
            				      <!------for answers and ques---->
            				                                        <?php 
																		if($data['Answer_Type']=="Dropdown")// to use dropdown in column
																		{
																			?><select  style="margin-left:20px;" name="<?php $temp="Option".$i; echo $data[$temp];?>"><?php
																		}
																			if($data['Multiple'])$multiple=1;else $multiple=0;// checking if ques is multiple answer or not
																			if($data['Required'])$required=1;else $required=0;
																			for($i=1;$i<=$data['Answer_Options'];$i++)
																			{
																				if($data['Answer_Type']=="Radio")//for radio answer type
																				{
																					if($data['Answer_Options']>3||$_SESSION['screen_width']<768)
																					{
																						?>
																						    
                                                                        				      <label class="container_radio colour" style="margin-left:20px;"><input type="radio" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>">   <?php $temp="Option".$i; echo $data[$temp];?> <span class="checkmark_radio"></label>                
                                                                        				<?php
																					}
																					else
																					{
																						?>
																						<td>	
																						<label class="container_radio colour" style="margin-left:20px;"><input type="radio" name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>">   <?php $temp="Option".$i; echo $data[$temp];?> <span class="checkmark_radio"></label>              
                                                                    				     </td>
																						  <?php
																					}
																					
																				}
																				elseif($data['Answer_Type']=="Checkbox")// for checkbox answer type
																				{
																					if($data['Answer_Options']>3||$_SESSION['screen_width']<768)
																					{
																						?>
                                                                    				    
                                                                    				    <label class="search colour" style="margin-left:20px;"><input type="checkbox"  name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>"><?php $temp="Option".$i; echo $data[$temp];?><span class="checkmark"></span></label>
                                                                    				    <?php
																					}
																					else
																					{
																						?>
																						<td>
                                                                    				    <label class="search colour" style="margin-left:20px;"><input type="checkbox"  name="Option<?php if($multiple) echo $i;else echo $data['ID'];?>"><?php $temp="Option".$i; echo $data[$temp];?><span class="checkmark"></span></label>
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
																					<input type="text"  style="margin-left:20px;" name="text_comment_" >
																					<?php
																					
																				}
																			}
																			if($data['Answer_Type']=="Dropdown")//to use in a column
																			{
																				?></select><?php
																			}
																		?>
                                                                    				    
                                                                  				    
                                   
								                            
								  
							    
                                    <?php
            				            if($answer_options<=3&&$_SESSION['screen_width']>600)
            				            echo '</tr></table>';
            				          ?> </div> 
								</div><br>  
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
						</div>
						
						
					<!--------page name and button----->
					<div align="center" style="margin-top:100px;">
						<form action="preview_php.php" method="POST">
						<p>
						<?php 
							if($_GET['page']>1)
							{
								?>
									<input type="submit" value="Prev Page"  class="btn btn-primary" name="prev_page">
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
									<input type="submit" value="Next Page"  class="btn btn-primary" name="next_page">
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
								<button type="submit" name="submit_start_survey" class="btn btn-primary">Start Survey</button>
							</div></form>
							<?php
						}
					?>
					<br>
					</div>
					
					</div>
					</div>
					<br>
					</div>
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


<?php

/*
<div align="left">
            				      <label class="search colour"><input type="checkbox" checked="checked" name="">Hellosaldaaa aaaaaaaaaaaaaaaaaaaa aaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaasa aaaaaaa aaaaaaaa aa aaaaaa aaaaaaaa aaaaaaaaa aaaaaaa aaaaaa aaaaaaa<span class="checkmark"></span></label>
            				      <label class="search colour"><input type="checkbox" name="">Hellosaldaaa aaaaaaaaaaaaaaaaaaaa aaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaasa aaaaaaa aaaaaaaa aa aaaaaa aaaaaaaa aaaaaaaaa aaaaaaa aaaaaa aaaaaaa <span class="checkmark"></span></label>
            				      <label class="search colour"><input type="checkbox" name="">Hellosaldaaa aaaaaaaaaaaaaaaaaaaa aaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaasa aaaaaaa aaaaaaaa aa aaaaaa aaaaaaaa aaaaaaaaa aaaaaaa aaaaaa aaaaaaa <span class="checkmark"></span></label>
            				      <label class="search colour"><input type="checkbox" name="">Hello world <span class="checkmark"></span></label>
            				      </div>
            				      <br>
            
            
            
            				      <h5 align="left" class="colour">1. World larget site in the world?</h5>
            				      <div align="left">
            				      <p class="colour"><input type="checkbox" name="">You Tube</p>
            				      <p class="colour"><input type="checkbox" name="">Google</p>
            				      <p class="colour"><input type="checkbox" name="">Wikipedia</p>
            				      <br>
            				    </div>
            				    <br>
            
            				    
            
            					
            				      <h5 align="left" class="colour">1. World larget site in the world?</h5>
            				      <div align="left">
            				      <table><tr><td><label class="container_radio colour"><input type="radio" name="">   You Tube <span class="checkmark_radio"></label> </td>               
            				      <td><label class="container_radio colour"><input type="radio" name="">   Google     <span class="checkmark_radio"></label>  </td>                 
            				      <td><label class="container_radio colour"><input type="radio" name="">   Wikipedia<span class="checkmark_radio"></label></td></tr></table>
            				      <br>
            				    </div>
            					
            					
            					
            					<h5 align="left" class="colour">1. World larget site in the world?</h5>
            				      <div align="left">
            				      <label class="container_radio colour"><input type="radio" name="">   You Tube <span class="checkmark_radio"></label>                
            				      <label class="container_radio colour"><input type="radio" name="">   Google     <span class="checkmark_radio"></label>                  
            				      <label class="container_radio colour"><input type="radio" name="">   Wikipedia<span class="checkmark_radio"></label>
            				      <br>
            				    </div>
            				    
            				    
            
            				      <br>
            				    </div>
            				  </div>
            				    
                                
                               
                    		</div>
                    	</div>
                    </div>
            
                 </div>
            
             </body>
            
            </html>

*/

?>