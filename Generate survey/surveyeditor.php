<?php
ob_start();
session_start();
	$save_ques_count=0;
	if(isset($_GET['show_desktop_mode']))
	{
		if($_GET['show_desktop_mode'] == 'true') {
		$_SESSION['desktopmode'] = 'true';
		}
	}
	
    if(isset($_SESSION['user_id']))
    {
        
        include("db_con.php");
        
       $screen_width=$_SESSION['screen_width'];
        /*
         @media screen and(max-width:576px)
      {
             .table_1 .sara{
            width:20px;
        }style="width:<?php if($screen_width>=820)echo $screen_width-10;else echo "820";?>px;"
      }style="width:<?php if($screen_width>=820)echo $screen_width-10;else echo "820";?>px;"
        */
        
        //getting name of survey
        $background_img_name="";$survey_font="";$survey_color_font="";$survey_bold=0;$survey_italic=0;$survey_underline=0;$survey_outerline=0;$survey_size=0;
        $outer_div=0;$inner_div=0;$outer_div_color="";$inner_div_color="";$theme_black=0;
		$table_name="userid_".$_SESSION['user_id'];
        $surveyid_from_userid_table=$_SESSION['current_survey_name_id'];
        $sql="SELECT * FROM $table_name WHERE ID='$surveyid_from_userid_table'";//getting information from user id table
		$run=mysqli_query($con,$sql);
		if(mysqli_num_rows($run)>0)
		{
			$data=mysqli_fetch_assoc($run);
			$current_survey_name= $data['SurveyName'];
			
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
			//removing underscores with spaces and also removing id from name
			
			$string=$current_survey_name;
            $survey_name="";
              $survey_id;
              if($data['SurveyBackgroundPic'])$background_img_name=$data['SurveyBackgroundPic'];// storing bg image name if exist
                for($i=0;$i<strlen($string);$i++)
                {
                    if($string[$i]=="_"&&$string[$i+1]=="i"&&$string[$i+2]=="d"&&$string[$i+3]=="_")//removing underscores to show pure survey name
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
            
                $current_survey_name=str_replace("_"," ",$survey_name);
                
		}
		else
			echo "Not Updated ques";
			
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133727448-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133727448-1');
</script>

                <title><?php echo $current_survey_name;?></title>
    <meta charset="utf-8">
    
  <?php
if($_SESSION['desktopmode'] == 'true') {
    /* DESKTOP MODE */
    ?>
    <meta name="viewport" content="width=1024">
    <?php
} else {
    // DEFAULT
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
}
?><link rel="icon" href="img/icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/fixed.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
  <style type="text/css">
   @import url('https://fonts.googleapis.com/css?family=Lato:400,700');

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
            
              <?php echo "height:".$_SESSION['screen_height'];?>
			  width: 100%;
				
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
			
   	.fixed{
   		background-image: url('img/Paint.jpg');
   		z-index: -1;
   	}
    .dark{
    	background-color: rgba(0,0,0,0.6);
    }

    .Head{
        margin-left: 500px;     
     }
    @media screen and (max-width: 576px)
     {
     	   .second{
     	   	 margin-left: 10px;
     	   }
          .Head{
          	margin-left: 20px;
          }
     }
    @media screen and (max-width: 900px)
      {
      	.Head{
          	margin-left: 50px;
          }
      }     
      
      #first_table{
          border:0px solid gray;
          box-shadow:6px 6px 6px gray;
          background-image: linear-gradient(to bottom right,crimson,darkblue);
      }
      
      td{
          padding:5px;
          border-bottom:2px;
      }
      
      .container input {
        position: absolute;
        opacity: 0;
         cursor: pointer;
         height: 0;
        width: 0;
      }
      .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}
      
     
	 
	 /*       check box     */
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
            	color:<?php if($theme_black)echo "white";else echo "black";?>;
            	font-weight: 500;
            }
  </style>  


</head>


		
			<!-----background image------>
            <body>
                 
                <!-------------Navigation------------------>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
	<a class="navbar-brand" href="#"><h4 class="display-6"><img src="img/icon.png" width="60" height="50">Generate Survey</h4></a>
    <button class="navbar-toggler" type="button" data-target="#navResponsive" data-toggle="collapse">
    	<span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navResponsive">
    	<ul class="navbar-nav ml-auto">
    		<li class="nav-item">
    			<a class="nav-link" href="homepage.php">Home</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="profile.php">My Survey</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="aboutme.php">About Me</a>
    		</li>
    	</ul>
    </div>
</nav>
<!-----End Of Navigation----->

<!-------Create  Box Start----------->
 <div class="fixed-background" >
	<div class="row dark text-center">
		<form class="form-inline text-center col-12" action="surveyeditor_php.php" method="POST" enctype="multipart/form-data">
	
	<table style="color: white;margin-left">
		<tr>
			<td>
				<h6 class="display-6" style="color: white;">Background Theme</h6> <input type="file" name="sbgfile" value="<?php echo $background_img_name; ?>" style="color: white;">
			</td>
			<td>
				<input class="btn btn-outline-light my-2 mr-sm-2 first" type="submit" value="Remove Background Image" name="submit_remove_bgimage">
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label class="search colour" style="margin-left:20px;">
							<input type="checkbox"  name="enable_Outer_div" <?php if($outer_div)echo "checked";?>><h5 style="color: white;">Outer Area</h5>
							<span class="checkmark"></span></label>
						</td>
						<td>
							<input type="text" style="width:70px;" width="50" name="Outer_div_color" placeholder="Colour name/code" value="<?php echo $outer_div_color;?>">
						</td>
					</tr>
				</table>
				
			</td>
			<td>
				<label class="search colour" style="margin-left:20px;">
					<input type="checkbox"  name="enable_theme_black" <?php if($theme_black)echo "checked";?>>
				<span class="checkmark"></span></label>
					<h5 style="color: white;">Theme Black</h5>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<label class="search colour" style="margin-left:20px;">
							<input type="checkbox"  name="enable_Inner_div" <?php if($inner_div)echo "checked";?>><h5 style="color: white;">Inner Area</h5>
							<span class="checkmark"></span></label>
						</td>
						<td>
							<input type="text" style="width:70px;" width="50" name="Inner_div_color" placeholder="Colour name/code" value="<?php echo $inner_div_color;?>">
						</td>
					</tr>
				</table>
				
			</td>
			
			<td>
				<input class="btn btn-outline-light my-2 my-sm-0 second" style="color:white;"type="submit" value="Apply" name="submit_sbgfile">
			</td>
		</tr>
	</table>
	
	</form>
	</div>

    <div class="fixed-wrap">
		<div class="fixed">
			
		</div>
	</div>
 </div>
					
<!-------Create  Box End----------->
<div class="bg">
<br>
			<div align="center">
			<div align="center" style="width:1000px;<?php if($outer_div)echo "background:".$outer_div_color.";";?>color:<?php if($theme_black)echo "white";else echo "black";?>;">
                <!------survey name----->
                <?php 
                    if(isset($_GET['surveyname']))
                    {
                        if($_GET['surveyname']=='change');
                        {
                            ?>
                    <div class="container-fluid padding">
                       <div class="row text-center padding">
                          <div class="col-12">
                            <div  align="center" style="margin-top:10px;" class="world">
                            <form action="surveyeditor_php.php" method="POST" class="form_ss">
							<table class="ss" >
							<tr class="sss">
								<td class="table_1">
									<input type="text"style="border-radius:5px;padding:7px;width:auto;" class="sara" name="new_survey_name" value="<?php echo $current_survey_name;?>" required>
								</td>
								<td>
								
								
									<table border="1px" cellspacing="0px" id="first_table">
										<tr>
											<td style="color:white;">
												Font <select name="survey_font" style="margin-left:20px;float:right;" >
													<?php 
														$sql="SELECT * FROM fonts";
														$run=mysqli_query($con,$sql);
														if($run)
														{
															?>
															<option style="font-family:<?php echo $survey_font;?>" value="<?php echo $survey_font;?>"><?php echo $survey_font;?></option>
															<?php
															while($data=mysqli_fetch_assoc($run))
															{
																?>
																	<option style="font-family:<?php echo $data['FontName'];?>" value="<?php echo $data['FontName'];?>" ><?php echo $data['FontName'];?></option>
																<?php
															}
														}
													?>
												</select>
												
											</td>
										</tr>
										<tr>
											<td style="color:white;">
												Color <input type="text" name="survey_color_font" placeholder="color name/code" value="<?php echo $survey_color_font;?>" style="float:right;width:130px;">
												
											</td>
										</tr>
										<tr>
											<td>
												<table>
													<tr>
														<td style="color:white;">
															Bold<input type="checkbox" name="survey_bold" <?php if($survey_bold) echo "checked"; ?> >
														
															
														</td>
														<td style="color:white;">
															Italic<input type="checkbox" name="survey_italic" <?php if($survey_italic) echo "checked"; ?>>
														</td>
														<td style="color:white;">
															Underline<input type="checkbox" name="survey_underline" <?php if($survey_underline) echo "checked"; ?>>
														</td>
													</tr>
												</table>
												
											</td>
											
										</tr>
										
										<tr>
											<td>
												<table>
													<tr>
														<td>
															<p style="color:white;">Outerline <input type="checkbox" name="survey_outerline" <?php if($survey_outerline) echo "checked"; ?>></p>
														</td>
														<td>
															<p style="color:white;">Text Size <input type="text" name="survey_text_size" style="width:50px;" value="<?php echo $survey_size; ?>"></p>
														</td>
													</tr>
												</table>
												
											</td>
										</tr>
										
										<tr align="center">
											<td>

												<button class="btn btn-outline-light" type="submit" name="change_survey_name" style="font-weight:500;">Change</button>
												
											</td>
										</tr>
										
									</table>
								
								</td>
								</tr>
							</table>
							</form>
                            </div>
                            
                        </div>
                    </div>
                </div>    
							<!--------survey name end---->
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        
                        <!--------------SURVEY NAME SECTION START------------------->
												
                        
                        		<div align="center">
                        			<form align="center" action="surveyeditor_php.php" method="POST" >	
									<br>									
                        			<h4 style="margin-top:10px;font-family:<?php echo $survey_font;?>;
									color:<?php echo $survey_color_font;?>;
									<?php if($survey_outerline) echo "text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;";?>
									<?php if($survey_underline) echo "text-decoration:underline;";?>
									<?php if($survey_italic) echo "font-style:italic;";?>
									<?php if($survey_bold) echo "font-weight:bold;";?>
									<?php if($survey_size) echo "font-size:".$survey_size."px;";?>
									"><?php echo $current_survey_name;?>
                        			<button class="btn btn-outline-primary my-2 mr-sm-2 " style="font-family:Lato;text-decoration:none;" type="submit" name="change_survey_name_text_to_textfield" style="font-weight:500;">Change</button></h4>
                        			</form>
                                    
                        		
                        <!----------------SURVEY NAME SECTION END-------------------->
                        
                        
                        <?php
                        
                        /*
                        <div  align="center" style="margin-top:100px;"id="surveyname_css">
                        <form action="surveyeditor_php.php" method="POST">
						<h2 style="font-family:<?php echo $survey_font;?>;
									color:<?php echo $survey_color_font;?>;
									<?php if($survey_outerline) echo "text-shadow: -1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;";?>
									<?php if($survey_underline) echo "text-decoration:underline;";?>
									<?php if($survey_italic) echo "font-style:italic;";?>
									<?php if($survey_bold) echo "font-weight:bold;";?>
									<?php if($survey_size) echo "font-size:".$survey_size."px;";?>
									">
									<?php echo $current_survey_name;?>
						<input type="submit" name="change_survey_name_text_to_textfield" value="change"  style="margin-left:20px;">
						</h2>
						</form>
                        </div>
                        
                        
                        */
                    }
                ?>
                
                
                <table align="center">
                    
                    <?php //table for survey
						$table_name=$_SESSION['user_survey_id'];
						//check for any unsaved ques
						$check_save=0;$taking_text_size=14;
						$sql="SELECT * FROM $table_name";
						$run=mysqli_query($con1,$sql);
						if(mysqli_num_rows($run)>0)
						{
							while($data=mysqli_fetch_assoc($run))
							{
								if($data['Save_Ques']==0)
								{
									$check_save++;
								}
							}
						}
                        $multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;
                        $sql="SELECT * FROM $table_name ORDER BY Ques_Order ASC";// SELECT * FROM Student ORDER BY ROLL_NO DESC;
                        $run=mysqli_query($con1,$sql);
                        if($run)
                        {
							while($data=mysqli_fetch_assoc($run))//using loop for showing all answers
							{
								$save_ques=0;
								$ques_id=$data['ID'];
								$save_ques=$data['Save_Ques'];
								$taking_text_size=$data['Text_SizeQues'];
								
								if($data['Multiple'])$multiple=1;else $multiple=0;// checking if ques is multiple answer or not
								if($data['Required'])$required=1;else $required=0;
								if($data['Heading'])$heading=1;else $heading=0;
								if($data['Bold'])$bold=1;else $bold=0;
								if($data['Italic'])$italic=1;else $italic=0;
								if($data['Underline'])$underline=1;else $underline=0;
										$survey_ques_font=$data['FontFamilyQues'];
								if($_SESSION['current_survey_page']==$data['Page'])
								{
									if($save_ques) // cheking if save ques is 1 then show normal else show edit design
									{
										
										
									?>
										<tr>
											<td >
											<form action="surveyeditor_php.php" method="POST">
											<table align="center">
												<tr>
													<td style="width:600px;<?php if($inner_div)echo "background:".$inner_div_color.";";?>">
														<table><!------table for ques order and ques---->
															
															
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
																	<table ><!------table for answers and ques---->
																		
																		<?php 
																		if($data['Answer_Type']=="Dropdown")// to use dropdown in column
																		{
																			?><select name="<?php $temp="Option".$i; echo $data[$temp];?>"><?php
																		}
																			
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
																							 
																							 <label class="container_radio colour" style="margin-left:20px;"><input type="radio" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 <span class="checkmark_radio"></label>  
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
																							 
																							 <label class="container_radio colour" style="margin-left:20px;"><input type="radio" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 <span class="checkmark_radio"></label>  
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
																							 
																							 <label class="search colour" style="margin-left:20px;"><input type="checkbox" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 <span class="checkmark"></span></label>
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
																							 <label class="search colour" style="margin-left:20px;">
																							 <input type="checkbox" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="good">
																							 <?php $temp="Option".$i; echo $data[$temp];?>
																							 <span class="checkmark"></span></label>
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
																						
																							<input type="text" name="Comment_" placeholder="Comment">
																						
																					<?php
																					
																				}
																				elseif($data['Answer_Type']=="None")// for dropdown answer type
																				{
																					
																					?>
																						
																						<br>
																						
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
													<td>
														<input style="margin-left:20px;" type="submit" class="btn btn-outline-success" name="edit_<?php echo $data['ID'];?>" value="Edit" <?php if($check_save) echo "disabled";?>>
													</td>
														
													<td>
														<input style="margin-left:20px;" type="submit"  class="btn btn-outline-danger" name="delete_<?php echo $data['ID'];?>" value="Delete">
													</td>
												</tr>
											</table>
											
											
										</form>
										
										</td>
										</tr>
									<?php
									
									}
									else 
									{ 
										//if(!$data['Save_Ques']&&$_SESSION['current_ques_id']==$data['ID'])
											$_SESSION['current_ques_id']=$data['ID'];
										$save_ques_count++;
										
										if($_SESSION['current_ques_id'])
										{
										$ques_order=1;$ques="";$multiple=0;
										$survey_ques_font="";
										//getting all details and storing in variables
										$table_name=$_SESSION['user_survey_id'];
										$current_ques_id=$_SESSION['current_ques_id'];
										$sql="SELECT * FROM $table_name WHERE ID='$current_ques_id'";
										$run1=mysqli_query($con1,$sql);
										if($run1)
										{
											$data1=mysqli_fetch_assoc($run1);
											$ques_order=$data1['Ques_Order'];
											if($data1['Ques'])$ques=$data1['Ques'];else $ques="";//updating ques if there is any value
											
											$survey_ques_font=$data1['FontFamilyQues'];
										}
										else
										{
											
											  header("Location: profile.php?surveycreate=error");
											  ob_end_flush();
											  exit();
										}
		
										
										?>
																
											<form id="save_options" action="surveyeditor_php1.php" method="post"></form>
											<form action="surveyeditor_php.php" method="POST">
													<table align="center">
														<tr>
															<td>
																<table style="margin-top:100px;"><!------table for ques order and ques---->
																	
																	
																	<tr>
																		<td>
																			<input type="text" style="width:20px;" value="<?php echo $ques_order; ?>" name="ques_order">
																		</td>
																		<td>
																			<input type="text" style="width:400px;" placeholder="Ques" name="ques" value="<?php echo $ques;?>" required>
																		</td>
																	</tr>
																	
																	<tr>
																		<td colspan="1">
																			
																		</td>
																		<td>
																			<table><!------table for options---->
																			
																			<?php
																				$table_name=$_SESSION['user_survey_id'];
																				$current_ques_id=$_SESSION['current_ques_id'];
																				$sql="SELECT * FROM $table_name WHERE ID='$current_ques_id'";
																				$run1=mysqli_query($con1,$sql);
																				if($run1)
																				{
																					$data1=mysqli_fetch_assoc($run1);
																					
																					if($data1["Answer_Type"]=='Radio')//for answertype radio button
																					{
																						$total_options=$data1['Answer_Options'];
																						if($data1['Multiple'])$multiple=1;else $multiple=0;
																						for($i=1;$i<=$total_options;$i++)
																						{
																							$str="Option".$i;
																							$temp=$data1[$str];
																							if(!$temp)$temp="";
																							if($total_options>3)
																							{
																								?>
																								<tr>
																							  <td >
																								
																								<input type="radio"  style="margin-left:30px;" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="option<?php echo$i;?>">
																								<input type="text"  style="width:100px" placeholder="Option <?php echo$i;?>" name="Option<?php echo$i;?>" value="<?php echo $temp;?>">
																								 
																							  </td>
																							</tr>
																						   <?php
																							}
																							else
																							{
																							   ?>
																							  <td >
																								
																								<input type="radio" style="margin-left:30px;" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="option<?php echo$i;?>">
																								<input type="text"  style="width:70px" placeholder="Option <?php echo$i;?>" name="Option<?php echo$i;?>" value="<?php echo $temp;?>">
																							</td>
																						   
																						   <?php 
																							}
																						   
																						}
																					}
																					elseif($data1["Answer_Type"]=='Checkbox')// for answertype checkbox
																					{
																						$total_options=$data1['Answer_Options'];
																						if($data1['Multiple'])$multiple=1;else $multiple=0;
																						for($i=1;$i<=$total_options;$i++)
																						{
																							$str="Option".$i;
																							$temp=$data1[$str];
																							if(!$temp)$temp="";
																							if($total_options>3)
																							{
																								?>
																								<tr>
																							  <td >
																								
																								<input type="checkbox"  style="margin-left:30px;" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="option<?php echo$i;?>">
																								<input type="text"  style="width:100px" placeholder="Option <?php echo$i;?>" name="Option<?php echo$i;?>" value="<?php echo $temp;?>">
																							  </td>
																							 </tr>
																						   <?php
																							}
																							else
																							{
																								?>
																							  <td >
																								
																								<input type="checkbox" style="margin-left:30px;" name="Option<?php if($multiple) echo $i;else echo $_SESSION['current_ques_id'];?>" value="option<?php echo$i;?>">
																								<input type="text"  style="width:70px" placeholder="Option <?php echo$i;?>" name="Option<?php echo$i;?>" value="<?php echo $temp;?>">
																							  </td>
																						   
																								<?php
																							}
																						   
																						}
																					}
																					elseif($data1["Answer_Type"]=='Comment')// for answertype Dropdown
																					{
																						?>
																							<tr>
																							  <td >
																								<input type="text" name="comment_">
																							  </td>
																						   </tr>
																						
																						<?php
																						
																					}
																					elseif($data1["Answer_Type"]=='Dropdown')// for answertype Dropdown
																					{
																						?>
																							<tr>
																							  <td >
																								<p style="margin-left:30px;width:70px">Dropdown</p>
																							  </td>
																						   </tr>
																						
																						<?php
																						$total_options=$data1['Answer_Options'];
																						if($data1['Multiple'])$multiple=1;else $multiple=0;
																						for($i=1;$i<=$total_options;$i++)
																						{
																							$str="Option".$i;
																							$temp=$data1[$str];
																							if(!$temp)$temp="";
																							?>
																						   <tr>
																							  <td >
																								<input type="text"  style="margin-left:30px;width:70px" placeholder="Option <?php echo$i;?>" name="Option<?php echo$i;?>" value="<?php echo $temp;?>">
																							  </td>
																						   </tr>
																						   
																						   <?php
																						}
																					}
																					
																					else
																					{
																						?>
																							<br>
																						<?php
																					}
																					
																				}
																				else
																				{
																					
																					  header("Location: profile.php?surveycreate=error");
																					  ob_end_flush();
																					  exit();
																				}
																			?>
																			
																			</table>
																		</td>
																	</tr>
																	
																	
																</table>
															</td>
															<td>
																
			<!------------------------------------------table for edit menu---------------------------------------------------------------->
			<div class="container-fluid padding">
                       <div class="row text-center padding">
                          <div class="col-12">
																<table border="1px" style="margin-top:50px;" cellspacing="0px" id="first_table"><!------table for edit menu---->
																	
																	<!---------------------------question part in edit table----->
																	<tr>
																		<td>
																			<p align="center" style="font-size:20px;color:white;">Question</p>
																		</td>
																	</tr>
																	<tr>
																		<td style="color:white;">
																			Font <select name="survey_ques_font" style="margin-left:20px;float:right;" >
																				<?php 
																					$sql="SELECT * FROM fonts";
																					$run5=mysqli_query($con,$sql);
																					if($run5)
																					{
																						?>
																						<option value="<?php echo $survey_ques_font;?>"><?php echo $survey_ques_font;?></option>
																						<?php
																						while($data5=mysqli_fetch_assoc($run5))
																						{
																							?>
																								<option value="<?php echo $data5['FontName'];?>" ><?php echo $data5['FontName'];?></option>
																							<?php
																						}
																					}
																				?>
																			</select>
																		</td>
																	</tr>
																	
																	<tr>
																		<td>
																			
																			<p style="color:white;">Text Size  <input type="text" name="text_size_option" value="<?php echo $taking_text_size; ?>" style="width:30px;" min="10" max="34"></p>
																		</td>
																		
																	</tr>
																	<tr>
																		<td style="color:white;">
																			<input type="checkbox" name="heading_option" <?php if($heading)echo "checked";?>> Make Heading
																		</td>
																	</tr>
																	
																	
																	<tr>
																		<td>
																			<table> <!-----------for bold italic and underline ques----->
																				<tr>
																					<td style="color:white;">
																						<input type="checkbox" name="bold_option" <?php if($bold)echo "checked";?>>Bold
																					</td>
																					<td style="color:white;">
																						<input type="checkbox" name="italic_option" <?php if($italic)echo "checked";?>>Itallic
																					</td>
																					<td style="color:white;">
																						<input type="checkbox" name="underline_option" <?php if($underline)echo "checked";?>>Underline
																					</td>
																				</tr>
																			</table>
																		</td>
																			
																	</tr>
																	
																	<!---------------------------------------Option part in edit table---->
																	<tr>
																		<td>
																			<p align="Center" style="font-size:20px;color:white;">Options</p>
																		</td>
																	</tr>
																	<tr>
																		<td>
																		 <p style="color:white;">Answer Type  
																		 
																			<Select name="Answer_Type_<?php echo $_SESSION['current_ques_id'];?>" onchange="this.form.submit()" form="save_options">
																				<?php 
																					
																					 $table_name=$_SESSION['user_survey_id'];
																					 $current_ques_id=$_SESSION['current_ques_id'];
																					 $sql="SELECT * FROM $table_name WHERE ID='$current_ques_id'";
																					$run2=mysqli_query($con1,$sql);
																					if($run2)
																					{
																						$data2=mysqli_fetch_assoc($run2);
																						if("Radio"==$data2['Answer_Type'])
																						{
																							?>
																							
																							  <option value="Radio">Radio</option>
																							  <option value="Checkbox">Check box</option>
																							  <option value="Dropdown">Dropdown</option>
																							  <option value="Comment">Comment box</option>
																								<option value="none">none</option>
																							<?php
																						}
																						elseif("Checkbox"==$data2['Answer_Type'])
																						{
																							?>
																							  <option value="Checkbox">Check box</option>
																							  <option value="Radio">Radio</option>
																							  <option value="Dropdown">Dropdown</option>
																							  <option value="Comment">Comment box</option>
																							  <option value="none">none</option>
																							  <?php
																						}
																						elseif("Dropdown"==$data2['Answer_Type'])
																						{
																							?>
																							  <option value="Dropdown">Dropdown</option>
																							  <option value="Checkbox">Check box</option>
																							  <option value="Radio">Radio</option>
																							  <option value="Comment">Comment box</option>
																							  <option value="none">none</option>
																							  <?php
																						}
																						elseif("Comment"==$data2['Answer_Type'])
																						{
																							?>
																								<option value="Comment">Comment box</option>
																								<option value="Dropdown">Dropdown</option>
																								<option value="Checkbox">Check box</option>
																							     <option value="Radio">Radio</option>
																								<option value="none">none</option>
																							<?php
																						}
																						elseif("none"==$data2['Answer_Type'])
																						{
																							?>
																								<option value="none">none</option>
																								<option value="Comment">Comment box</option>
																								<option value="Dropdown">Dropdown</option>
																								<option value="Checkbox">Check box</option>
																							     <option value="Radio">Radio</option>
																								
																							<?php
																						}
																					}
																					else
																					{
																								
																						 header("Location: profile.php?surveycreate=error");
																						ob_end_flush();
																						exit();
																					}
																				
																				?>
																			</Select>
																			
																			 </p>
																		</td>
																	</tr>
																	
																	<tr>
																		<td style="color:white;">
																			<p>Answer Option  <Select name="Answer_Options_<?php echo $_SESSION['current_ques_id'];?>" onchange="this.form.submit()" >
																				<?php
																					$options=0;
																					$table_name=$_SESSION['user_survey_id'];
																					 $current_ques_id=$_SESSION['current_ques_id'];
																					 $sql="SELECT * FROM $table_name WHERE ID='$current_ques_id'";
																					$run3=mysqli_query($con1,$sql);
																					if($run3)
																					{
																						$data3=mysqli_fetch_assoc($run3);
																						$options=$data3['Answer_Options'];
																						?>
																							<option value="<?php echo $options;?>"><?php echo $options;?></option>
																						<?php
																					}
																					for($i=1;$i<=20;$i++)
																					{
																						?>
																						<option value="<?php echo $i;?>"><?php echo $i;?></option>
																						<?php
																					}
																					
																				?>
																				
																			</Select></p>
																			
																		</td>
																	</tr>
																	<tr>
																		<td style="color:white;">
																			<input type="checkbox" name="multiple_option" <?php if($multiple)echo "checked";?>>Multiple Answer
																		</td>
																	</tr>
																	<tr>
																		<td style="color:white;">
																			<input type="checkbox"  name="required_option" <?php if($required)echo "checked";?>>Required
																		</td>
																	</tr>
																	
																	
																	
																	<tr>
																		<td align="center">
											
																			<button type="submit" class="btn btn-outline-light" style="padding:5px 25px 5px 25px;font-weight:700;font-size:18px;" name="save_<?php echo $_SESSION['current_ques_id'];?>">Save</button>
																		</td>
																	</tr>
																	
																	
																	
																</table>
																
												</div>
												</div>
												</div>
																
															</td>
															
															<td>
																<button style="margin-left:20px;margin-top:100px;" class="btn btn-outline-danger" type="submit" name="delete_<?php echo $_SESSION['current_ques_id'];?>">Delete</button>
															</td>
														</tr>
													</table>
													</form>
													
												
												
										
										<?php
										}
									}
									
									
								}//end of while loop
								
									
							}
							
						}//end of if sql
						?>
				
				</table>
					<!----------add ques button----->
				<?php
                if(!$save_ques_count)
				{
					?>
						<div align="center">
							<form action="surveyeditor_php.php" method="POST">
								<input type="submit"class="btn btn-outline-primary" value="Add Ques" name="add_ques">
							</form>
						</div>
					<?php
				}
					?>
					<!--------page name and button----->
					<div align="center" style="margin-top:100px;">
						<form action="surveyeditor_php.php" method="POST">
						<p>
						<?php 
							if($_SESSION['current_survey_page']>1)
							{
								?>
									<input type="submit"class="btn btn-outline-info" value="Prev Page" name="prev_page">
								<?php
							}
						?>
							Page <?php echo $_SESSION['current_survey_page'];?>
								<input type="submit" class="btn btn-outline-info" value="Next Page" name="next_page">
							</p>
						</form>
					</div>
					
					<!------preview button--->
					<div style="float:right;">
						<form action="surveyeditor_php.php" method="POST">
							<input type="submit" value="preview" class="btn btn-outline-dark mr-sm-2" name="submit_preview">
							<input type="submit" value="Start Survey" class="btn btn-outline-dark" name="submit_start_survey">
						</form>
					</div>
					
					<div style="margin-top:100px;">
					</div>
					
					</div>
					</div>
					</div>
					</div>
					<br><br>
            </body>
        </html>
        <?php
        
        
    }
    else
    {
        header("Location: profile.php?surveycreate=error");
		ob_end_flush();
		exit();
    }
    
?>
