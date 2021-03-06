<?php
ob_start();
session_start();
include("db_con.php");

 $survey_name_trending=array();
 $people_respond_trending=array();
 $survey_address=array();
 $counter=0;$flag=0;$report=0;$t1=0;
            //trending fetching data
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
                                    $flag=0;
                                    if(isset($surveyname_data['ActiveSurvey']))
                                    {
                                        $survey_name_id=$surveyname_data['ID'];
                                        $active_survey=$surveyname_data['ActiveSurvey'];
                                        $created_date=$surveyname_data['DayCreated'];
                                        $day_left=$surveyname_data['DayLeft'];
										$report=$surveyname_data['Report'];
                                        $t1=strtotime($created_date);
                                          $t2=strtotime($day_left);
                                         $enable_result_page= $surveyname_data['EnableResultPage'];
                                          if($t1>$t2&&$enable_result_page)
                                          {
                                              $flag=1;
                                          }
                                    }
                                    if($active_survey==1&&$flag&&$report==0)
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
                                        $survey_address[$counter]="result.php?surveyname=".$temp_survey_name."&&user=".$userid."&&survey=".$survey_name_id."&&page=1";
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

	<title>Survey Result</title>
    
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
   	.fixed{
   		background-image: url('img/Paint.jpg');
   		z-index: -1;
   	}
    .dark{
    	background-color: rgba(0,0,0,0.56);
    }
    .my-flex{
    	background-color: greenyellow;
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
    	</ul>
    	<!--------------Search Box Start------->	
  <form class="form-inline" action="search_php.php" method="POST">
    <input class=" mr-sm-2" type="search" name="str_data" placeholder="search survey,profile" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" name="search_submit" type="submit" style="font-weight: 500;">Search</button>
  </form>
<!------------------Search Box End------->

    
   </div>
</nav>
<!-----End Of Navigation----->


<!-------Create Survey Box Start----------->
 <div class="fixed-background">
	<div class="row dark text-center">

	
       <h3 class="display-4 text-center col-12" style="color:white">Survey Result</h3>

    </div>

    <div class="fixed-wrap">
		<div class="fixed">
			
		</div>
	</div>
 </div>
<!-------Create Survey Box End----------->

<div class="container-fluid padding">
	<div class="row text-center padding">


		<div class="col-xs-12 col-sm-12 col-md-9">
			<div class="cards" style="width:100%;border:0px solid black;">
				<div class="card-body">
					
<!-------------Repetition Start------------------------------------->

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
                        
                            $lastpage=0;
                            $startingpage=0;
                            
                            $m=$_SESSION['index_content']+20;
                            if($m>$n)
                            {
                            $m=$n;$lastpage=1;
                            }
                            if($_SESSION['index_content']<20)
                            {
                                $startingpage=1;
                            }
                        
                        
                            for($i=$_SESSION['index_content'];$i<$m;$i++)
                            {
                                
                                    ?>
                                        <div class="d-flex my-flex">
            
                                    <div class="p-2 mr-auto my-flex " style="font-weight: 500;color: black;margin-top: 7px;">
                                       <p style="font-size:15px;text-decoration:none;color:black;"><?php echo ($i+1).".  ".$survey_name_trending[$i];?></p>
                                       </div>
            
                                    <div class="p-2 my-flex">
                                      <h5 style="font-weight: 500;color: black;margin-top: 7px;"><?php echo $people_respond_trending[$i];?><i class="fas fa-users"></i></h5>
                                    </div>
            
                                    <div class="p-2 my-flex">
                                      <a href="<?php echo $survey_address[$i];?>"><button type="submit" class="btn btn-light">
                                         <i class="fas fa-poll-h"></i> Result
                                    </button></a>
                                    </div>
                               </div><br>
                                    
                                    <?php
                            }
                            ?>
                            
                             <?php
                        if($n>20)
                        {
                            ?> 
                                <div class="d-flex justify-content-between mb-3">

                                  <div class="p-2 ">
                                <form action="surveyresult_php.php" method="POST">
                              	<button type="submit" name="prev_button" class="btn btn-outline-primary" <?php if($startingpage) echo "disabled";?>>
                              		<i class="fas fa-backward"></i> Previous
                              	</button>
                              	</form>
                              </div>
                                
                              <div class="p-2 display-6"><?php echo "Page ".$_SESSION['page_no'];?></div>
                            
                              <div class="p-2">
                                  <form action="surveyresult_php.php" method="POST">
                              	<button type="submit" name="next_button" class="btn btn-outline-primary"<?php if($lastpage) echo "disabled";?>>
                              		Next <i class="fas fa-forward"></i>
                              	</button>
                              	</form>
                              </div>
                                </div>
                              
                            <?php
                        }
                    }
                    else
                    echo "No survey found";
                ?>
                   

                   

<!-------------Repetition End------------------------------------->

                    

				</div>
			</div>
		</div>


<!--------------------ADVETISMENT SECION --------------------->
		<div class="col-xs-12 col-sm-12 col-md-3">
			<div class="cards" style="width:100%;border:0px solid black;">
				<div class="card-body">
					    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- resultpage -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5870321000407115"
                             data-ad-slot="9361693353"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        			
            	</div>
			</div>
		</div>
<!--------------------ADVETISMENT SECION END--------------------->

	</div>
</div>


<?php include("page_data.php"); footer_content();?>

<!------Foooter End-------->



</body>

</html>