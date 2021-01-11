<?php
ob_start();
session_start();
include("link.php");
if(!isset($_SESSION['index_content']))
{
    $_SESSION['index_content']=0;
}

include("db_con.php");
$username="";

if(isset($_SESSION["user_id"]))
{
      //trending fetching data
                        $survey_name_trending=array();
                     $people_respond_trending=array();
                     $survey_address=array();
                     $counter=0;$report=0;
                    $active_survey=0;$enable_public=0;
                    $sql="SELECT * FROM users";
                    $run3=mysqli_query($con,$sql);
                    if($run3)
                    {
                        while($users_data=mysqli_fetch_assoc($run3))//getting user id
                        {
                            $userid=$users_data['ID'];
                            $user_table_name="userid_".$users_data['ID'];
                            $sql="SELECT * FROM $user_table_name";
                            $run2=mysqli_query($con,$sql);
                            if($run2)
                            {
                                while($surveyname_data=mysqli_fetch_assoc($run2))//getting survey name
                                {
                                    if(isset($surveyname_data['ActiveSurvey'])&&isset($surveyname_data['EnablePublic']))
                                    {
                                        $survey_name_id=$surveyname_data['ID'];
                                        $active_survey=$surveyname_data['ActiveSurvey'];
                                        $enable_public=$surveyname_data['EnablePublic'];
										$report=$surveyname_data['Report'];
                                    }
                                    if($active_survey==1&&$enable_public==1&&$report==0)
                                    {
                                        $temp_survey_name=$surveyname_data['SurveyName'];
                                        $temp_people_respond=$surveyname_data['PeopleRespond'];
                                        
                                        //getting pure survey name while removing id part from survey name
                                        $string=$temp_survey_name;
    
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
                                            $temp_survey_name=$survey_name;
                                            $survey_name=str_replace("_"," ",$survey_name);
                                        
                                        
                                        $survey_name_trending[$counter]=$survey_name;
                                        $people_respond_trending[$counter]=$temp_people_respond;
                                        $survey_address[$counter]="survey.php?surveyname=".$temp_survey_name."&&user=".$userid."&&survey=".$survey_name_id."&&page=1";
                                        $counter++;
                                    }
                                }//end of while loop getting each survey name
                            }
                            else
                            {
                                //no survey found in user database
                                
                            }
                        }
                        
                    }
                    else
                    {
                        //no users are in database
                        echo "No users are active";
                    }
                    
					
					
					//nortification counter
					$nort=0;
					$table="userid_".$_SESSION['user_id']."_nortification";
					$sql="SELECT * FROM $table";
					$result=mysqli_query($con,$sql);
					if($result)
					{
						while($data=mysqli_fetch_assoc($result))
						{
							if($data['Status']=='not seen')
							$nort++;
						}
					}
    ?>
        <!DOCTYPE html>
        <html>
        <head>
	
        	<title><?php $id=$_SESSION["user_id"];$sql="SELECT * FROM users WHERE ID='$id'";$run=mysqli_query($con,$sql);if(mysqli_num_rows($run)>0){$data=mysqli_fetch_assoc($run);echo $data['Username']; $username=$data['Username'];}?></title>
        	
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/fixed.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        
           <style type="text/css">
           @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
        
        body{
        	overflow-x: hidden;
        	font-family: 'Lato', sans-serif;
        	color: #505962;
        }
           	.fixed{
           		background-image: url('img/Paint.jpg');
           		z-index: -1;
           	}
            .dark{
            	background-color: rgba(0,0,0,0.56);
            }
            /*.fixed-background form{
            	margin-top: 2rem;
            	margin-left: 3rem;
            	margin-bottom: 3rem;
            }*/
        
            @media screen and (max-width: 576px){
                .fixed-background .form-inline{
                    width: 200px;
              }
            }
            @media screen and (max-width: 576px){
                .fixed-background .btn-outline-primary{
                    position:absolute;
                    margin-left: 210px;
                    top: 10px;
              }
            }
           .btn-light{
   	    margin-bottom: 10px;
       
      }
    .my-flex{
    	background-color:#dcdcdc;
    }  
    .my-flex1{
        background-color:#dcdcdc;
    }
            .space{
            	margin: 5px 5px 5px 5px;
            }
            @media screen and (max-width: 576px){
            	.top-banner{
            		height: 150px;
            	}
            	.Number{
            		font-size:20px;
            	}
            	.Para{
            		font-size:20px;
            	}
            	
            	img{
            		width:20px;
            		height:20px;
            	}
            	.space{
            		padding: 4px 8px;
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
            			<a class="nav-link" href="aboutme.php">About me</a>
            		</li>
					<li class="nav-item">
            			<a class="nav-link" href="follow.php?button=pyf" <?php if($nort)echo 'style="color:red;"';?>><i class="fas fa-bell"></i><?php if($nort)echo $nort;?></a>
            		</li>
            	</ul>
        <!--------------Search Box Start------->	
          <form class="form-inline" action="search_php.php" method="POST" >
            <input class="form-control mr-sm-2" type="search" name="str_data" placeholder="search survey,profile" aria-label="Search">
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
        
        	<form class="form-inline text-center col-md-8" action="profile_php.php" method="POST">
        
            <input class="form-control mr-sm-2 paint" name="survey_name" type="search" placeholder="Create your Survey" aria-label="Search" style="width:300px;" required>
            <button class="btn btn-outline-primary my-2 my-sm-0 " type="submit" name="submit_surveycreate" style="font-weight:500;">Create</button>
          </form>
               <h3 class="display-6 col-md-4" style="color: white;"><?php echo $username;?></h3>
            </div>
        
            <div class="fixed-wrap">
        		<div class="fixed">
        			
        		</div>
        	</div>
         </div>
        <!-------Create Survey Box End----------->
        
        <!---------Your Survey start------------------->
        <div class="container-fluid padding">
        	<div class="row text-center padding">
        
              <div class="col-xs-12 col-sm-12 col-md-8">
              	<h3 class="display-6">My Survey</h3>
              	<div class="cards" style="border:0px solid black;">
              		<div class="card-body">
              		<!---------Repeating Start------------------------>
              		<form action="profile_php.php" method="POST">
              		<?php getsurvey(); ?>
                       </form>
        
        
                       	
                 <!---------------------------Repeating end------------>
        
              		</div>
              	</div>
              </div>
        
              <div class="col-xs-12 col-sm-12 col-md-4">
              	<h3 class="display-6">Trending</h3>
              	<div class="cards" style="border:0px solid black;">
              		<div class="card-body">
              <!---------Repeating Start------------------------>
              
                <!-----trending fetching data from server--start-->
                
                <?php
                    if(sizeof($people_respond_trending)>0)
                    {
                        $n=sizeof($people_respond_trending);
                        $m=$n;
                        for($i=0;$i<$n-1;$i++)
                        {
                            for($j=0;$j<$n-$i-1;$j++)
                            {
                                if($people_respond_trending[$j]<$people_respond_trending[$j+1])
                                {
                                    $temp=$people_respond_trending[$j];
                                    $people_respond_trending[$j]=$people_respond_trending[$j+1];
                                    $people_respond_trending[$j+1]=$temp;
                                    
                                    $temp=$survey_name_trending[$j];
                                    $survey_name_trending[$j]=$survey_name_trending[$j+1];
                                    $survey_name_trending[$j+1]=$temp;
                                    
                                    $temp=$survey_address[$j];
                                    $survey_address[$j]=$survey_address[$j+1];
                                    $survey_address[$j+1]=$temp;
                                    
                                }
                            }
                        }
                        
                        if($n>10)
                        {
                            $m=10;
                        }
                            for($i=0;$i<$m;$i++)
                            {
                                /*
                                    <div class="top-banner">
                                    <form class="form-inline">  
                                        <a style="font-size:25px;" href="<?php echo $survey_address[$i];?>"><?php echo $survey_name_trending[$i];?></a>
                           	        
                           	        <p style="font-size:20px; margin-left:40px;"><?php echo $people_respond_trending[$i];?></p>
                           	        </form>  
                           	        </div><br>


*/

                                    ?>
                                        
                                        <div class="d-flex mb-3 my-flex1">
                  <div class="p-2 mr-auto my-flex1" style="font-weight: 700;color:black;margin-top:5px;">
                     <a style="font-size:15px;text-decoration:none;color:black;" href="<?php echo $survey_address[$i];?>"><?php echo $survey_name_trending[$i];?></a>
                  </div>

                <div class="p-2 my-flex1">
                  <h5 style="font-weight: 700;color:black;margin-top: 10px;"><?php echo $people_respond_trending[$i];?><i class="fas fa-users"></i></h5>
                </div>
                </div>
                                    <?php
                            }
                        if($n>10)
                        {
                            ?>
                               <form action="profile_php.php" method="POST">
                                   <button type="submit" name="submit_more" class="btn btn-outline-primary">More</button>
                               </form>
                            <?php
                        }
                    }
                    else
                    echo "no survey found";
                ?>
                       
        
                        
                       
                <!-----trending fetching data from server--end-->	
              <!---------------------------Repeating end------------> 	
        
              		</div>
              	</div>
              </div>   
        
             <div class="col-12">
              	<div class="cards">
              		<div class="card-body" style="border:1px solid black;">
              			
              		</div>
              	</div>
             </div>
        
            </div>          
        </div>
        <!---------Your Survey start------------------->
        
        <!------Foooter Start-------->
         <!--------Footer------------>
         <footer>
  	<div class="container-fluid padding">
  		<div class="row text-center padding">
  		<div class="col-md-4">
  			<h2 class="display-6" style="color:white;"><img src="img/icon.png" width="50" height="50">  Generate Survey</h2>
  			<hr class="hv">
  			<h5 calss="display-6" style="color: white">Description</h5>
  			<p style="color: white">Create your survey free of cost, with the  </p>
  			<p style="color: white">best otimization. Its a completely user  </p>
  			<p style="color: white">friendly to design your survey with a </p>
  		    <p style="color: white"> best result sytsem..</p>
  		</div>
  		<div class="col-md-4">
  			<hr class="hv">
  			<h3 class="display-6" style="color: white">Security</h3>
  			<hr class="hv">
  			<a href="term_and_conditions.php" style="text-decoration:none;"><h5 style="color: white;">Terms & Conditions</h5></a>
  			<a href="privacy_policy.php" style="text-decoration:none;"><h5 style="color: white;">Privacy Policy</h5></a>
  			<a href="report.php" style="text-decoration:none;"><h5 style="color: white;">Report</h5></a>
  		</div>
  		<div class="col-md-4">
  			<hr class="hv">
  			<h3 class="display-6" style="color: white">Company</h3>
  			<hr class="hv"  >
  			<a href="about_us.php" style="text-decoration:none;"><h5 style="color: white;">About Us</h5></a>
  			<a href="contact_us.php" style="text-decoration:none;"><h5 style="color: white;">Contact Us</h5></a>
  			<a href="help.php" style="text-decoration:none;"><h5 style="color: white;">Help?</h5></a>
  		    <a href="feedback.php" style="text-decoration:none;"><h5 style="color: white;">Feedback</h5></a>
  		</div>
  		<div class="col-12">
  			<hr class="hv">
  			
  			<div class="d-flex justify-content-center mb-3">
  			    
                <div class="p-2"><a href="//www.dmca.com/Protection/Status.aspx?ID=3e443145-029e-4699-8c43-55741845f037" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/DMCA_badge_trn_60w.png?ID=3e443145-029e-4699-8c43-55741845f037"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></div>
                
                <div class="p-2"><script data-cfbadgetype="d" data-cfbadgeskin="blue" type="text/javascript">
                                //<![CDATA[
                                try{window.CloudFlare||function(){var a=window.document,b=a.createElement("script"),a=a.getElementsByTagName("script")[0];window.CloudFlare=[];b.type="text/javascript";b.async=!0;b.src="//ajax.cloudflare.com/cdn-cgi/nexp/cloudflare.js";a.parentNode.insertBefore(b,a)}(),CloudFlare.push(function(a){a(["cloudflare/badge"])})}catch(e$$5){try{console.error("CloudFlare badge code could not be loaded. "+e$$5.message)}catch(e$$6){}};
                                //]]>
                                </script></div>
                                

                
              </div>
  			
  			<h5 style="color: white">&copy;Generate Survey</h5>
  		</div>
  	</div>
  	</div>
  </footer>
        <!------Foooter End-------->
         <?php
          //---------------------------
       if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
             $screen_width= $_SESSION['screen_width'];
        } else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
            $_SESSION['screen_width'] = $_REQUEST['width'];
            $_SESSION['screen_height'] = $_REQUEST['height'];
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
           echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
           
        }
         ?>
        
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
        include("db_con.php");
        $count=1;
        $userid="userid_".$_SESSION['user_id'];
        $sql="SELECT * FROM $userid ORDER BY ID DESC";
        $run=mysqli_query($con,$sql);
        if($run)
        {
            $count=mysqli_num_rows($run);
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
				    <div class="d-flex mb-3 my-flex">

                <div class="p-2 mr-auto my-flex" style="font-weight: 700;color: black;margin-top: 10px;">
                    <h5><?php echo $count." . ";?> <?php echo $survey_name; ?></h5></div>

                <div class="p-2 my-flex">
                  <h5 style="font-weight: 500;color:<?php if(isset($data['ActiveSurvey'])){ if($data['ActiveSurvey']) echo "green";else echo "red";}else echo "red";?>;margin-top: 10px;"><?php echo $data['PeopleRespond'] ?><i class="fas fa-users"></i></h5>
                </div>

                <div class="p-2 my-flex">
                  <button type="submit" style="margin-left: 10px;font-weight: 700;color: black; padding: 5px 27px 5px 25px;" name="<?php echo $data['SurveyName'];?>" class="btn btn-light  space btn-sm">Edit</button>
                  <button type="submit" style="margin-left: 10px;font-weight: 700;color: black;padding: 5px 20px 5px 20px;" name="delete_<?php echo $data['SurveyName'];?>" class="btn btn-light space btn-sm">Delete</button>
                  <button type="submit" style="margin-left: 10px;font-weight: 700;color: black;padding: 5px 15px 5px 15px;" name="opt_<?php echo $data['SurveyName'];?>" class="btn btn-light  space btn-sm">optimize</button>
                  <button type="submit" style="margin-left: 10px;font-weight: 700;color: black;padding: 5px 22px 5px 22px;" name="result_<?php echo $data['SurveyName'];?>" class="btn btn-light  space btn-sm">Result</button>
                </div>
            </div>
				
				
				
				<?php
				$count--;
				
				/*
				
				<div class="top-banner">
                       	<h3 class="Number" style="font-weight: 400;float: left;"><?php echo $count." . ";?> </h3>
                       	<h3  class="Para" style="font-weight: 400;float: left;"><?php echo $survey_name; ?>  </h3>
                        <p style="color:<?php if(isset($data['ActiveSurvey'])){ if($data['ActiveSurvey']) echo "green";else echo "red";}else echo "red";?>;">
                        <?php echo $data['PeopleRespond'] ?>
                       	<button type="submit" name="<?php echo $data['SurveyName'];?>" class="btn btn-outline-primary space btn-sm">Edit</button>
                        
                        <button type="submit" name="opt_<?php echo $data['SurveyName'];?>" class="btn btn-outline-info space btn-sm">optimize</button>
                        <button type="submit" name="result_<?php echo $data['SurveyName'];?>" class="btn btn-outline-info space btn-sm">Result</button>
                        <button type="submit" name="delete_<?php echo $data['SurveyName'];?>" class="btn btn-outline-secondary space btn-sm">Delete</button></p>
                       	</div><br>
				
				
				*/
			}
        }
        else
        {
            echo "No survey found";
        }
    }
    
    date_default_timezone_set('Asia/Kolkata');
    $my_date = date("Y-m-d H:i:s");
    $user_id=$_SESSION['user_id'];
    $sql="UPDATE users SET Online_Status='$my_date' WHERE ID='$user_id'";
	$run=mysqli_query($con,$sql);
	
    
?>
