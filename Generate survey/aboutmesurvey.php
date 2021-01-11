<?php
ob_start();
session_start();
include("db_con.php");


if(isset($_SESSION['user_id'])||isset($_GET['user']))
{
    if(isset($_GET['user']))
    {
        $_SESSION['view_profile']=$_GET['user'];
    }
    else
    {
        $_SESSION['view_profile']=$_SESSION['user_id'];
    }
    
    //initalize some variables
    $first_name="";$last_name="";$email="";$tatal_survey=0;
	$address="";$occupation="";$location="";$about="";
	$phoneNO="";$dob="";$gender="";$profile_pic="";$total_survey=0;
    //getting info of user
    $message="";
    if(isset($_GET['confirm_delete']))
    {
        if($_GET['confirm_delete']=='pnm')
        {
            $message="Password not match";
        }
    }
    if(isset($_GET['error']))
    {
        if($_GET['error']=='passwordnotmatch')
        {
            $message="Password not match";
        }
    }
    if(isset($_GET['success']))
    {
        if($_GET['success']=='passwordchangedsuccess')
        {
            $message="Password changed successfully";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
    }
    
    $sql="SELECT * FROM users WHERE ID=".$_SESSION['view_profile'];
    $run=mysqli_query($con,$sql);
    if($run)
    {
        $data=mysqli_fetch_assoc($run);
        $first_name=$data['Username'];
        $last_name=$data['Lastname'];
        $email=$data['Email'];
		$address=$data['Address'];
		$occupation=$data['Occupation'];
		$location=$data['Location'];
		$about=$data['About'];
		$phoneNO=$data['PhoneNo'];
		$dob=$data['DOB'];
		$gender=$data['Gender'];
		$profile_pic=$data['ProfilePic'];
		$total_survey=$data['TotalSurvey'];
		if($phoneNO==0)
			$phoneNO="";
    }
    if(!$profile_pic)
	{
		$profile_pic="people.png";
	}
    $user_table_name="userid_".$_SESSION['view_profile'];
    $sql="SELECT * FROM $user_table_name";
    $run=mysqli_query($con,$sql);
    $tatal_survey=mysqli_num_rows($run);
    
    
    //fetching survey name with links
    
    $username="";
    
     $survey_name_trending=array();
     $people_respond_trending=array();
     $survey_address=array();
     $counter=0;
   
                        //trending fetching data
                            $enable_public=0;
                                $userid=$_SESSION['view_profile'];
                                $user_table_name="userid_".$_SESSION['view_profile'];
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
											
                                        }
                                        if($active_survey==1&&$enable_public==1)
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133727448-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133727448-1');
</script>

        	<title>About Me</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="img/icon.png">
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
        
        .heading-underline{
          width: 3rem;
          height: .2rem;
          background-color: cyan;
          margin: 0 auto;
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
            		
            	</ul>
        <!--------------Search Box Start------->	
          <form class="form-inline" action="search_php.php" method="POST">
            <input class=" mr-sm-2" type="search" placeholder="search survey,profile" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"  name="search_submit" type="submit" style="font-weight: 500;">Search</button>
          </form>
        <!------------------Search Box End------->
            <form action="logout.php" method="POST">
            <button type="button" name="submit_logout"class="btn btn-outline-primary">Logout</button>
            </form>
           </div>
        </nav>
        <!-----End Of Navigation----->
        
        <!------------------Image------And Information section--->
        <div class="container-fluid">
        	<div class="row text-center padding">
         <!----------PROFILE IMAGE START---------------------->
        		<div class="col-xs-12 col-sm-12 col-md-4">
                     <div class="cards" style="width: 300px;">
                     	<label for="file-upload" class="custom-file-upload">
                        <img class="card-img-top" src="dataimg/<?php echo $profile_pic;?>" alt="Card image" style="width:100%">
                        </label>
                        
                    </div>
                </div>
        <!----------PROFILE IMAGE END---------------------->
        
        <!----------CONTACT//BASIC INFORMATION START---------------------->
        		<div class="col-xs-12 col-sm-12 col-md-8">
                     <div class="cards" style="border: 0px solid black;">
                     	<div class="card-body">
                             <div class="d-flex flex-row-reverse bd-highlight">
                     	     <div class="p-2 bd-highlight">	
                     		 
                             </div> 
                             </div>     
                             <br>
                     		 <form class="form-inline">
                             <h4 class="display-6" align="left"><?php  echo $first_name;?><?php  echo " ".$last_name." ";?></h4>
                             <sub><i class="fas fa-globe"></i> <?php  echo $location;?></sub>
                             </form><br>
                             <h6 class="display-6" align="left" style="color:darkblue;"><?php  echo $occupation;?></h6><br>
        
                             <h6 class="display-6" align="left" style="color:darkblue;">Total Surveys: <?php echo $total_survey;?></h6>
                             <br>
                             <hr class="my-2">
            <!----------CONTACT//BASIC INFORMATION START---------------------->                 
                             <div class="d-flex flex-row bd-highlight mb-3">
        
                                  <div class="p-2 bd-highlight">
        
                                    <a href="aboutme.php?user=<?php echo $_SESSION['view_profile'];?>"><button type="submit" class="btn btn-light">
                                    <i class="fas fa-user"></i> About
                                    </button></a>
        
                                  </div>
        
                                  <div class="p-2 bd-highlight">
        
                                    <a href="aboutmesurvey.php?user=<?php echo $_SESSION['view_profile'];?>"><button type="submit" class="btn btn-light">
                                     <i class="fas fa-poll"></i> Survey
                                     </button></a>
                                     <div class="heading-underline"></div>
                                  </div>
          
                             </div>
                              <hr class="my-2">
                <!---------------SURVEY NAMES HERE-------------------------->
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
                        
                        if($n>20)
                        {
                            $m=20;
                        }
                            for($i=0;$i<$m;$i++)
                            {
                           

                                    ?>
                                       <div class="d-flex justify-content-between bg-danger mb-3">
                                             <div class="p-3 bg-danger">
                                                 <h5 style ="color:black"><a style="font-size:15px;text-decoration:none;color:black;" href="<?php echo $survey_address[$i];?>"><?php echo ($i+1).". ".$survey_name_trending[$i];?></a></h5>
                                             </div>
                    
                                             <div class="p-3 bg-danger">
                                                 <h5 style ="color:black"><?php echo $people_respond_trending[$i];?><i class="fas fa-users"></i></h5>
                                             </div>
                                         </div>
                                    <?php
                            }
                        if($n>20)
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
                             
                             
                             
                             
                            
        <!--------------SURVEY NAMES HERE------------------>
        
        	</div>
        </div>

	<?php
	
}
else
{
     header("Location: profile.php");
     ob_end_flush();
	 exit();
}
?>
</body>
</html>