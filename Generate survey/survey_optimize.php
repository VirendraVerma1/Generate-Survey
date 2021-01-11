<?php
ob_start();
session_start();
include("db_con.php");
include("link.php");
if(isset($_SESSION['user_id'])&&isset($_GET['user'])&&isset($_GET['survey'])&&isset($_SESSION['survey_state']))
{
	$user_table_name="userid_".$_GET['user'];
	$survey_table_name=$user_table_name."_surveyid_".$_GET['survey'];
	$page_counter=0;//0 for no more page and 1 for there is still another page
	if($_SESSION['user_id']==$_GET['user'])
	{
		$survey_name="";
		$background_img="";
		$background_img_name=""; 
		$date="";
		$enable_result_page=0;
		$enable_comment=0;
		$enable_rate=0;
		$enable_public=0;
		$day_left=0;
		$background_img_name="";$survey_font="";$survey_color_font="";$survey_bold=0;$survey_italic=0;$survey_underline=0;$survey_outerline=0;$survey_size=0;
		$people_respond=0;
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
			$people_respond=$data['PeopleRespond'];
			$day_left=$data['DayLeft'];
			$enable_rate=$data['EnableRate'];
			$enable_public=$data['EnablePublic'];
			$enable_comment=$data['EnableComment'];
			$enable_result_page=$data['EnableResultPage'];
			//taking pure name while removing idate
			$string=$survey_name1;
			
            $_SESSION['comment_column_table']=$survey_table_name."_comments";
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
			$link="https://generatesurvey.000webhostapp.com/survey.php?surveyname=".$survey_name."&&user=".$_GET['user']."&&survey=".$_GET['survey']."&&page=1";
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
                        
                       <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5870321000407115",
    enable_page_level_ads: true
  });
</script>
                        <!-- Global site tag (gtag.js) - Google Analytics -->
                        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133727448-1"></script>
                        <script>
                          window.dataLayer = window.dataLayer || [];
                          function gtag(){dataLayer.push(arguments);}
                          gtag('js', new Date());
                        
                          gtag('config', 'UA-133727448-1');
                        </script>

                    	<title><?php echo $survey_name;?></title>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="icon" href="img/icon.png">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                        <link rel="stylesheet" type="text/css" href="css/fixed.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
						<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
                    
                       <style type="text/css">
                       @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
                     body{
                    	overflow-x: hidden;
                    	font-family: 'Playfair Display', serif;
                    	color: #505962;
                    }
                    .fixed{
                       		background-image: url('img/nature.jpg');
                       		z-index: -1;
                       	}
                        .dark{
                        	background-color: rgba(0,0,0,0.56);
                        }
                    
                       /*-----------------First Checkbox--------------------*/
                        /* The container */
                    .firstcheck {
                      display: block;
                      position: relative;
                      padding-left: 35px;
                      margin-bottom: 12px;
                      cursor: pointer;
                      font-size: 22px;
                      user-select: none;
                    }
                    
                     /*Hide the browser's default checkbox */
                    .firstcheck input {
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
                      margin-top: 5px;
                      background-color: #eee;
                    }
                    
                    /* On mouse-over, add a grey background color */
                    .firstcheck:hover input ~ .checkmark {
                      background-color: #ccc;
                    }
                    
                    /* When the checkbox is checked, add a blue background */
                    .firstcheck input:checked ~ .checkmark {
                      background-color: darkgreen;
                    }
                    
                    /* Create the checkmark/indicator (hidden when not checked) */
                    .checkmark:after {
                      content: "";
                      position: absolute;
                      display: none;
                    }
                    
                    /* Show the checkmark when checked */
                    .firstcheck input:checked ~ .checkmark:after {
                      display: block;
                    }
                    
                    /* Style the checkmark/indicator */
                    .firstcheck .checkmark:after {
                      left: 9px;
                      top: 5px;
                      width: 5px;
                      height: 10px;
                      border: solid white;
                      border-width: 0 3px 3px 0;
                      transform: rotate(45deg);
                    }
                    .myfle{
                      background-color: yellowgreen;
                    }
                    
                       /*------------------First checkbox end  -------------------*/
                    
                    .matter{
                          position: absolute;
                            padding: 10px 0px 0px 40px;
                    
                        }
                          
                          @media screen and (max-width: 576px){
                             .matter{
                              padding: 10px 0px 0px 40px;
                             }
                                 .matter h1{
                                  font-size: 22px;
                                 }
                                 .matter .btn-group{
                                  width: 10px;
                                  height: 30px;
                                  margin-left: 5px;
                                 }
                                 .matter .btn-group .btn-primary{
                                  font-size: 11px;
                                 }
                            }
                    
                    
                     footer{
						background-color:	black;
					  }
					  
					  .hv{
						  
						  background:white;
					  }

                    
                     </style>
                    
                    </head>
                    
                    <body>
                    
                         <!---Navigation Start--->
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    	<a class="navbar-brand" href="#"><h4 class="display-6"><img src="img/icon.png" width="60" height="50">Generate Survey</h4></a>
                        <button class="navbar-toggler" type="button" data-target="#navResponsive" data-toggle="collapse">
                        	<span class="navbar-toggler-icon"></span>
                        </button>
                    
                        <div class="collapse navbar-collapse hola" id="navResponsive">
                        	<ul class="navbar-nav ml-auto">
                        		<li class="nav-item">
                        			<a class="nav-link" href="homepage.php">Home</a>
                        		</li>
                        		<li class="nav-item">
                        			<a class="nav-link" href="profile.php">My Survey</a>
                        		</li>
                        		<li class="nav-item">
                        			<a class="nav-link" href="aboutme.php">About me</a>
                        		</li>
                        	</ul>
                    <!-----------Search Box Start---------->	
                      <form class="form-inline" action="search_php.php" method="POST">
                        <input class=" mr-sm-4" type="search" name="str_data" placeholder="search survey,profile" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" name="search_submit" type="submit" style="font-weight: 500;">Search</button>
                      </form>
                    <!------------------Search Box End------->
                        <form action="logout.php" method="POST">
                            <button type="submit" name="submit_logout" class="btn btn-outline-primary">Logout</button>
                        </form>
                        
                       </div>
                    </nav>
                    <!-----End Of Navigation----->
                    
                    <!-------Create Survey Box Start----------->
                     <div class="fixed-background">
                    	<div class="row dark text-center">
                    
                    	   <div class="col-12">
                    
                          <div class="d-flex bg-highlight">
                              <div class="p-2 mr-auto">
                                <h4 class="display-6" style="color: white;"><?php echo $survey_name;?></h4>
                              </div>
                              <div class="p-2">
                                <h6 class="display-6" style="color: white;margin-top:7px;"> <?php echo $newDate = date("d-m-Y", strtotime($date));?></h6>
                              </div>
                              <div class="p-2">
                                <h6 class="display-6" style="color: white;margin-top:7px;">Day:<?php $today=date("Y/m/d"); echo day_left_f($today,$date);?></h6>
                              </div>    
                          </div>
                            
                          
                            <input type="text" name="link" value="<?php echo $link;?>" id="post-shortlink" class="form-control">
							
                            <h6 align="center" style="color:white;">Here your Sharable link</h6>
							<button class="btn btn-primary" id="copy-button" data-clipboard-target="#post-shortlink" style="margin-top:5px;">Copy</button>
                          
                    
                       </div>
                    
                        <div class="fixed-wrap">
                    		<div class="fixed">
                    			
                    		</div>
                    	</div>
                    
                     </div>
                    </div>
                    <!-------Create Survey Box End----------->
                    
                    <div class="container-fluid padding">
                      <div class="row text-center padding">
                     
                    <!--------LEFT CARD START HERE---------------------------->
                        <div class="col-xs-12 col-sm-12 col-md-8">
                          <div class="cards" style="border: 1px solid black;">
                            <div class="card-body">
                              
                     <form  action="survey_optimize_php.php" method="POST">
                            <h5 class="display-6 text-center" style="color:black;">Features For Candidates</h5>
                           
                    <!-------------------ENABLE RESULT START---------------------------->
                              <div class="d-flex myfle"> 
                                <div class="p-2 mr-auto">
                                  <label class="firstcheck" style="margin-top: 10px;color:black;">Enable Comments
                                    <input type="checkbox" name="enable_comment" <?php if($enable_comment)echo "checked";else echo "";?>>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                    <!-------------------ENABLE RESULT END---------------------------->
                    
                    
                    <!-------------------ENABLE RATE START----------------------------
                              <div class="d-flex myfle"> 
                                <div class="p-2 mr-auto">
                                  <label class="firstcheck" style="margin-top: 10px;color:black;"  >Enable Rate
                                    <input type="checkbox" name="enable_rate" <?php if($enable_rate)echo "checked";else echo "";?>>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                    -------------------ENABLE RATE END---------------------------->          
                    
                    <!-------------------ENABLE PUBLIC  START---------------------------->
                              <div class="d-flex myfle"> 
                                <div class="p-2 mr-auto">
                                  <label class="firstcheck" style="margin-top: 10px;color:black;" >Enable Public
                                    <input type="checkbox" name="enable_public" <?php if($enable_public)echo "checked";else echo "";?>>
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                    <!-------------------ENABLE PUBLIC  END---------------------------->
                    
                    
                    <!-------------------ENABLE RESULT PAGE START---------------------------->
                              <div class="d-flex myfle"> 
                                <div class="p-2 mr-auto">
                    <!-------------------MAIN---------------------------->
                                  <div class="form-inline">
                                  <label class="firstcheck mr-sm-2" style="margin-top: 10px;color:black;">Enable Result Page
                                    <input type="checkbox" name="enable_result_page" <?php if($enable_result_page)echo "checked";else echo "";?> >
                                    <span class="checkmark"></span>
                                  </label>
                                  <input type="date" name="day_left" style="margin-top: 10px;" value="<?php if($day_left&&$enable_result_page)echo $day_left; ?>">
                                </div>
                    <!-------------------ENABLE RESULT PAGE END---------------------------->
                                </div>
                              </div>
                              
                              <!-------------------Change Button  START---------------------------->
                              <div class="d-flex justify-content-center myfle"> 
                                <div class="p-2">
                                    
                                        <button type="submit" align="center" class="btn btn-primary" name="submit_participant_feature">Change</button>
                                   
                                  
                                </div>
                              </div>
                    <!-------------------Change Button  END---------------------------->
                     </form>
                           
                            </div>
                          </div>
                        </div>
                         
                    <!--------LEFT CARD END HERE---------------------------->   
                    
                    
                    <!--------RIGHT CARD START HERE---------------------------->
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="cards" style="border:1px solid black;">
                        <div class="card-body">
                          <form action="survey_optimize_php.php" method="POST">
                            <h4 class="display-6" style="color:<?php if($_SESSION['survey_state']=='activated')echo 'green';else echo 'red';?>">
                              <?php if($_SESSION['survey_state']=='activated') echo "Activated"; else echo "Deactivated"; ?></h4><br>
                           <div class="d-flex justify-content-center myfle"> 
                                <div class="p-2 ">
                                  <button type="submit" name="submit_active_survey" class="btn btn-secondary" >Activate</button>
                                </div>
                    
                                <div class="p-2 ">
                                   <button type="submit" name="submit_deactive_survey" class="btn btn-secondary" >Deactivate</button>
                                </div>
                    
                           </div>
                            </form>
                        </div>
                      </div>
                    </div> 
                    <!--------RIGHT CARD END HERE---------------------------->
                    
                      </div>
                    </div>
                    
                    
                    <!----------------------FIRST CHART START------------------>
						<?php if($people_respond)get_location();?>
                    <!----------------------FIRST CHART END------------------>
                    
                    <!----------------------SECOND CHART START------------------>
                        <?php if($people_respond)get_history();?>
                    <!----------------------SECOND CHART END------------------>
                    
                    
                    
                    <!---------COMMENT SECTION START--------------------------->
                    <?php
                        if($enable_comment)
                        {
                            ?>
                                     <div class="container-fluid padding">
                              <div class="row text-center padding">
                                <div class="col-12">
                                  
                                     <h4 class="display-4" style="color:black;">Comments</h4>
                            <!---------------MAIN------------------------------------------->
                            <?php 
								$table_name=$_SESSION['comment_column_table'];
								$sql="SELECT * FROM $table_name";
								$result=mysqli_query($con1,$sql);
								if($result)
								{
									?>
										<div id="load_data"></div>
                               
										<br />
									<?php
								}
								else
								{
									echo '<div align="center"><h4>No Comment</h4></div>';
								}
					
							?>
                            <!---------------MAIN------------------------------------------->
                                    
                            
                                </div>
                              </div>
                            </div>
                    
                            <?php
                        }
                       
                    ?>
                   
                    <!---------COMMENT SECTION END--------------------------->
                    
                    <!------Foooter Start-------->
                     
                     <?php include("page_data.php"); footer_content();?>
                    <!------Foooter End-------->
                    
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
    function get_location()
    {
		include("link.php");
        include("db_con.php");
        $total_respond=0;$name_arr=array();$value_arr=array();$count=0;$index=0;
        $Option_name="";
        
           
							
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
									    $Option_name="City";
										
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
									
										
										
									}
									elseif($_GET['location']=='country')
									{
									    $Option_name="Country";
										
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
										
										
										
									}
								}
								else
								{
									//show region
									$Option_name="Region";
									
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
									
										
										
								}
							}
        
        
        
        ?>
                 <div class="container-fluid padding">
                     <div class="row text-center padding">
                      <div class="col-12">
                        <form class="form-inline matter">
                          
                          <h1 class="display-6 mr-sm-2"><?php echo $Option_name;?></h1>
                    
                            <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Change</button>
                    
                                 <div class="dropdown-menu">
                                   <a class="dropdown-item" href="survey_optimize.php?user=<?php  echo $_SESSION['user_id'];?>&&survey=<?php echo $_GET['survey'];?>&&survey_state=activated&&location=country">Country</a>
                                   <a class="dropdown-item" href="survey_optimize.php?user=<?php  echo $_SESSION['user_id'];?>&&survey=<?php echo $_GET['survey'];?>&&survey_state=activated&&location=region">Region</a>
                                   <a class="dropdown-item" href="survey_optimize.php?user=<?php  echo $_SESSION['user_id'];?>&&survey=<?php echo $_GET['survey'];?>&&survey_state=activated&&location=city">City</a>
                                 </div>
                            </div>
                    
                        </form><br><br><br>
                    
                              
                              <canvas id="pie-chart" min-width= "420px" height="150px"></canvas>
               <script>
                                new Chart(document.getElementById("pie-chart"), {
                        type: 'doughnut',
                        data: {
                          labels: [<?php  for($i=0;$i<sizeof($name_arr);$i++){if($value_arr[$i]>0)
											{$str= "/".$name_arr[$i]."/"; $new_str = str_replace('/', '"', $str);if($i==sizeof($name_arr)) echo $new_str;else echo $new_str.','; }}?>],
                          datasets: [{
                            label: "Population (millions)",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: [<?php for($i=0;$i<sizeof($value_arr);$i++){if($value_arr[$i]>0)
											{if($i==sizeof($value_arr)) echo $value_arr[$i];else echo $value_arr[$i].','; }}?>]
                          }]
                        },
                        options: {}
                    });
                              </script>
                    
                    </div>
                     </div>
                    </div>
        <?php
    }
?>


<?php
    function get_history()
    {
		include("link.php");
        include("db_con.php");
        $option="";
        $m_size=7;
            //variables
                $flag_month=0;$flag_year=0;$flag_day=0;$flag=0;
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
                
                    if(isset($_GET['history']))
                    {
                        if($_GET['history']=='month')
                        {
                            $option="Monthly Status";
                            $flag_month=1;
                            while($data=mysqli_fetch_assoc($run))
                            {
                            
                                $flag=0;
                                for($j=0;$j<sizeof($name_array);$j++)
                                {
                                    if($data['Month']==$name_array[$j])
                                    {
                                   
                                    $value_array[$j]=$value_array[$j]+$data[$survey_table_name];
                                    $flag=1;
                                    }
                                }
                                if(!$flag)
                                {
                                    $name_array[$counter]=$data['Month'];
                                    $value_array[$counter]=$data[$survey_table_name];
                                    $counter++;
                                }
                            }
                        }
                        
                    }
                    else
                    {
                        while($data=mysqli_fetch_assoc($run))
                        {
                            $option="Daily Status";
                            $flag_day=1;
                            //show default day
                            $name_array[$counter]=$data['Day']." Day";
                            $value_array[$counter]=$data[$survey_table_name];
                            $counter++;
                        
                        }
                    }//end of while loop
            }/**/
            
            /* */
            if(sizeof($name_array)>7)
            {
                $m_size=7;
            }else
            $m_size=sizeof($name_array);
          
		  
         ?>
            <div class="container-fluid padding">
                     <div class="row text-center padding">
                      <div class="col-12">
                        <form class="form-inline matter">
                          
                          <h1 class="display-6 mr-sm-2"><?php echo $option;?></h1>
                    
                            <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Change</button>
                    
                                 <div class="dropdown-menu">
                                   <a class="dropdown-item" href="survey_optimize.php?user=<?php  echo $_SESSION['user_id'];?>&&survey=<?php echo $_GET['survey'];?>&&survey_state=activated">Day</a>
                                   <a class="dropdown-item" href="survey_optimize.php?user=<?php  echo $_SESSION['user_id'];?>&&survey=<?php echo $_GET['survey'];?>&&survey_state=activated&&history=month">Month</a>
                                 </div>
                            </div>
                    
                        </form><br><br><br>
                             <canvas id="c12-chart" min-width= "220px"></canvas>
        
        			<script>
        				new Chart(document.getElementById("c12-chart"), {
        				    
        				type: 'horizontalBar',
        				data: {
            		  labels: [<?php for($i=0;$i<$m_size;$i++){$str= "/".$name_array[$i]."/"; $new_str = str_replace('/', '"', $str);if($i==sizeof($name_array)) echo $new_str;else echo $new_str.','; }?>],
        			  datasets: [{
        			label: "",
        				backgroundColor: ["cyan", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","lightgreen","lightblue","lightred","lightpink","lightyellow"],
        				data: [<?php for($i=0;$i<$m_size;$i++){if($i==sizeof($value_array)) echo $value_array[$i];else echo $value_array[$i].','; }?>]
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
                        }
        				
        			}
        			
        			
        		});
        	</script>
        
        
        
            </div>
                     </div>
                    </div>
        <?php
        
    }
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

<script>

$(document).ready(function(){
 
 var limit = 20;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch_survey_comments.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>

<script>
(function(){
    new Clipboard('#copy-button');
})();
</script>