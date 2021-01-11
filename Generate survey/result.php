<?php
ob_start();
session_start();

include("db_con.php");

if(isset($_GET['user'])&&isset($_GET['survey']))
{
    //check if it is enble result page or not
    if(isset($_GET['user']))
    {
        $_SESSION['member_user_table_id']=$_GET['user'];
        $_SESSION['member_survey_table_id']=$_GET['survey'];
        if(isset($_GET['page']))
        $_SESSION['current_survey_page']=$_GET['page'];
       
        
        if(isset($_SESSION['user_id']))
        {
            if($_SESSION['member_user_table_id']!=$_SESSION['user_id'])
            {
                //checking if enableresult page is on or not
                $user_table_id="userid_".$_SESSION['member_user_table_id'];
                $sql="SELECT * FROM $user_table_id WHERE ID=".$_SESSION['member_survey_table_id'];
            	$run=mysqli_query($con,$sql);
            	if($run)
            	{
            		$data=mysqli_fetch_assoc($run);
            		if(!$data['EnableResultPage'])
        			{
        			    header("Location: errorlink.php");
        		        ob_end_flush();
        	        	exit();
        			}
            	}
            }
        }
        else
        {
            //checking if enableresult page is on or not
                $user_table_id="userid_".$_SESSION['member_user_table_id'];
                $sql="SELECT * FROM $user_table_id WHERE ID=".$_SESSION['member_survey_table_id'];
            	$run=mysqli_query($con,$sql);
            	if($run)
            	{
            		$data=mysqli_fetch_assoc($run);
            		if(!$data['EnableResultPage'])
        			{
        			    header("Location: errorlink.php");
        		        ob_end_flush();
        	        	exit();
        			}
            	}
        }
    }
    else
    {
        $_SESSION['member_user_table_id']=$_SESSION['user_id'];
        $_SESSION['member_survey_table_id']=$_SESSION['current_survey_name_id'];
    }
    
    //storing chart
    if(!isset($_SESSION['charts_name']))
    {
        $_SESSION['charts_name']="horizontalBar";
    }
    
    $userid=$_SESSION['member_user_table_id'];
    $surveyid=$_SESSION['member_survey_table_id'];
    
	$user_table_id="userid_".$_SESSION['member_user_table_id'];
	$survey_table_id=$user_table_id."_surveyid_".$_SESSION['member_survey_table_id'];
	
	$survey_name1="";$background_img_name="";$survey_font="";$survey_color_font="";$survey_bold=0;$survey_italic=0;$survey_underline=0;$survey_outerline=0;$survey_size=0;
	$sql="SELECT * FROM $user_table_id WHERE ID=".$_SESSION['member_survey_table_id'];
	$run=mysqli_query($con,$sql);
	if($run)
	{
		$data=mysqli_fetch_assoc($run);
		$survey_name1=$data['SurveyName'];
		$survey_font=$data['SurveyFont'];
			$survey_color_font=$data['SurveyFontColor'];
			$survey_bold=$data['Bold'];
			$survey_italic=$data['Italic'];
			$survey_underline=$data['Underline'];
			$survey_outerline=$data['Outerline'];
			$survey_size=$data['Size'];
			
			
	}
	else
	{
		header("Location: profile.php");
		ob_end_flush();
		exit();
	}
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

	<title>Result <?php echo $survey_name;?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <?php
          //---------------------------
       if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
             $screen_width= $_SESSION['screen_width'];
        } else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
            $_SESSION['screen_width'] = $_REQUEST['width'];
            $_SESSION['screen_height'] = $_REQUEST['height'];
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
           echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?user='.$userid.'&&survey='.$surveyid.'&&width="+screen.width+"&height="+screen.height;</script>';
           
        }
         ?>
    <style type="text/css">
    .form-inline{
    	position: absolute;
        padding: 10px 0px 0px 40px;

    }
    	
    	@media screen and (max-width: 576px){
    		 .form-inline{
    		 	padding: 10px 0px 0px 40px;
    		 }
             .form-inline h1{
             	font-size: 22px;
             }
             .form-inline .btn-group{
             	width: 10px;
             	height: 30px;
             	margin-left: 5px;
             }
             .form-inline .btn-group .btn-primary{
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
      
<!-------------Navigation------------------>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<a class="navbar-brand" href="#"><h4 class="display-6">Generate Survey</h4></a>
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
    		
    	</ul>
    </div>
</nav>

<!-----End Of Navigation----->
<div class="container-fluid padding">
     <div class="row text-center padding">
    	<div class="col-12">
        	<form class="form-inline">
        		<h1 class="display-6 mr-sm-2"></h1>
        		<h1 class="display-6 mr-sm-2"><?php echo $survey_name;?></h1>
                                    
                <div class="btn-group">
                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['charts_name'];?></button>
                                    
                       <div class="dropdown-menu">
                           <?php 
                            $sql="SELECT * FROM charts_name";
                            $run=mysqli_query($con,$sql);
                            if($run)
                            {
                                while($data=mysqli_fetch_assoc($run))
                                {
                                    ?>
                                        <a class="dropdown-item" href="result_php.php?chart=<?php echo $data['Charts_Name'];?>"><?php echo $data['Charts_Name'];?></a>
                                    <?php
                                }
                                
                            }
                           ?>
                           
                          </div>
                      </div>
                                    
    	</form><br><br><br>
				
				<!-----starting fetiching data-------->
				
				<div align="center">
					<table>
					
				<?php
					$multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;$answer_options=0;
					$option_arr=array();$option_per_arr=array();$num=0;$page_counter=0;$page_next_counter=0;
					
					$sql="SELECT * FROM $survey_table_id";//ORDER BY Ques_Order ASC
					$run=mysqli_query($con1,$sql);
					if(mysqli_num_rows($run)>0)
					{
						while($data=mysqli_fetch_assoc($run))
						{
							
							
							$ques_id=$data['ID'];
							
							$taking_text_size=$data['Text_SizeQues'];
							$answer_options=$data['Answer_Options'];
							
							//if($data['Multiple'])$multiple=1;else $multiple=0;// checking if ques is multiple answer or not
							//if($data['Required'])$required=1;else $required=0;
							if($data['Heading'])$heading=1;else $heading=0;
							if($data['Bold'])$bold=1;else $bold=0;
							if($data['Italic'])$italic=1;else $italic=0;
							if($data['Underline'])$underline=1;else $underline=0;
								
							if($_SESSION['current_survey_page']==$data['Page'])
							{
								$total_result=$data["TotalResult"];
								if($heading)
								{
									
								}
									for($i=1;$i<=$answer_options;$i++)
									{
										$t="Option".$i;
										$temp=$data[$t];
										$t="Result".$i;
										$result=$data[$t];
										
										if($total_result)$per_covered=($result/$total_result)*500;else $per_covered=0;
										if($data['Answer_Type']!='Comment')
										{
											$option_arr[$i]= $temp;
											$option_per_arr[$i]=$result;
										
										}
										//for comment system
										elseif($data['Answer_Type']='Comment')
										{
											?>
											
											

											
											
                            											<!---------COMMENT SECTION START--------------------------->
                                                
                                                
                                               <div class="container-fluid padding">
                                                  <div class="row text-center padding">
                                                    <div class="col-12">
                                                        <h2 align="center"><?php echo $data['Ques_Order'].".    ".$data['Ques'];?></h2>
                                                                       <h5>Comments</h5>
                                                                      
                                                        
                                                
											
											<?php
											$counter=0;
											$table_name_com_ques="userid_".$_SESSION['member_user_table_id']."_surveyid_".$_SESSION['member_survey_table_id']."_survey_ques_comment";
											$sql="SELECT * FROM $table_name_com_ques ";
											$run2=mysqli_query($con1,$sql);
											if($run2)
											{
												while($data2=mysqli_fetch_assoc($run2))
												{
													$column="Ques_id_".$data['ID'];
													
													if($data2[$column])
													{
													   if($counter<5)
											            { 
													    ?>
        													         <!---------------MAIN------------------------------------------->
                                                                <div class="container mt-3">
                                                                 <div class="media border p-2">
                                                                     <img src="img/profile.png" class="mr-3 align-self-start" style="width:60px">
                                                                    <div class="media-body">
                                                                       
                                                                      <div class="list-item"><p style="color:black;" align="left"><?php echo $data2[$column]?></p></div>
                                                                     
                                                                  </div>
                                                                 </div>
                                                                </div>
                                                        <!---------------MAIN------------------------------------------->
													    <?php
													    
													   
													    if($counter==4)
            											   {
            											    echo '<div>
            											              <a href="load.php?t='.$table_name_com_ques.'&&c='.$column.'&&ques='.$data['Ques'].'" style="margin-top:20px;"><button class="btn btn-outline-primary" type="submit">More</button></a>  
            											           </div>';
            											   }
													    $counter++;
											            }
											            
													    
													}
													
												}
											}
										
											
											?>
										    	
                                                                       
                                                         
											
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                                <!---------COMMENT SECTION END--------------------------->
											
											
											<?php
										}
											
									}
									
									if($data['Answer_Type']!='Comment')
									{
									  if($_SESSION['screen_height']>900)
									  $value=30;
									  elseif($_SESSION['screen_height']>800)
									  $value=50;
									  elseif($_SESSION['screen_height']>700)
									  $value=65;
									  elseif($_SESSION['screen_height']>600)
									  $value=80;
									  elseif($_SESSION['screen_height']>500)
									  $value=90;
									  elseif($_SESSION['screen_height']>400)
									  $value=100;
									  else
									  $value=100;
										
										
										if($data['TotalResult'])
										{
									?>
									
									 
													
									<div class="container">
									
													<canvas id="pie-chart<?php echo $num;?>" width="110px" height="<?php echo $value+(50/$_SESSION['screen_height'])*100;?>px"></canvas>
												</div>

												<script>
													new Chart(document.getElementById("pie-chart<?php echo $num;$num++;?>"), {
													   
												type: '<?php echo $_SESSION['charts_name'];?>',
												data: {
												  labels: [<?php for($i=1;$i<=sizeof($option_arr);$i++){$str= "/".$option_arr[$i]."/"; $new_str = str_replace('/', '"', $str);if($i==sizeof($option_arr)) echo $new_str;else echo $new_str.","; }?>],
												  datasets: [{
													label: "<?php echo $data['Ques'];?>",
													backgroundColor: ["cyan", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","lightgreen","lightblue","lightred","lightpink","lightyellow"],
													data: [<?php for($i=1;$i<=sizeof($option_per_arr);$i++){if($i==sizeof($option_per_arr)) echo $option_per_arr[$i];else echo $option_per_arr[$i].','; }?>]
												  }]
												},
												
												options: {
													title: {
													display: true,
													text: '<?php echo $data['Ques_Order'].".    ".$data['Ques']."                  Total:".$data['TotalResult'];?>',
													fontSize:20
												  }
												}
											});
									</script>
									</td>
									</tr>
									</table>
									
									<hr width="300PX">
									<?php
										}
										else
										{
											?>
												<center><div>
													<h4><?php echo $data['Ques_Order'].".    ".$data['Ques']."                  Total:".$data['TotalResult'];?></h4>
													<br>
													
													No People Respond
													
													<br>
													<br>
													<br>
												</div>
												</center>
											<?php
											
										}
									}
									unset($option_arr);
										unset($option_per_arr);
							}// check for page
							elseif($_SESSION['current_survey_page']<$data['Page'])
							{
								$page_next_counter++;$page_counter++;
							}
							else
								$page_counter++;
								
							
						}//end of while loop
					}
					else
					{
						header("Location: profile.php");
						ob_end_flush();
						exit();
					}
				?>
					
					</table>
				</div>
					</div>
        </div>
    </div>
				<!--------page name and button----->
					<div align="center" style="margin-top:100px;">
						<form action="result_php.php" method="POST">
						<p>
						<?php 
							if($_SESSION['current_survey_page']>1)
							{
								?>
								<button type="submit" value="Next Page" class="btn btn-outline-primary" name="prev_page">Prev Page</button>
									
								<?php
								
							}
						?>
							
								
								<?php
								if($page_counter)
								{
									if($_SESSION['current_survey_page']>0)
									{
									?>
									<h4 class="display-6">Page<?php echo $_SESSION['current_survey_page'];?></h4> 
									<?php
									}
									if($page_next_counter)
									{
									?>
									<button type="submit" value="Next Page" class="btn btn-outline-primary" name="next_page">Next page</button>
									<?php
									}
									
								
								}
								?>
							</p>
						</form>
					</div>
					
					
					
					
					
				
				
			<!------Foooter Start-------->
 
 <?php include("page_data.php"); footer_content();?>

<!------Foooter End-------->


</body>
</html>
	<?php
}
else
{
    	header("Location: result.php?user=".$_SESSION['member_user_table_id']."&&survey=".$_SESSION['member_survey_table_id']);
		ob_end_flush();
		exit();
}
?>


