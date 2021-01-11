<?php
ob_start();
session_start();
include("db_con.php");

 $survey_name_trending=array();
 $people_respond_trending=array();
 $survey_address=array();
 $counter=0;$flag=0;
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
                                        $t1=strtotime($created_date);
                                          $t2=strtotime($day_left);
                                         $enable_result_page= $surveyname_data['EnableResultPage'];
                                          if($t1>$t2&&$enable_result_page)
                                          {
                                              $flag=1;
                                          }
                                    }
                                    if($active_survey==1&&$flag)
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
	<title>Survey Result</title>
    
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
    .my-flex{
    	background-color: greenyellow;
    }  
    footer{
  	background-color:	#696969;
  }

</style>

</head>

<body>
   
    <!---Navigation Start--->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<a class="navbar-brand" href="#"><h4 class="display-6">Company Name</h4></a>
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
  <form class="form-inline">
    <input class=" mr-sm-2" type="search" placeholder="search survey,profile" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit" style="font-weight: 500;">Search</button>
  </form>
<!------------------Search Box End------->

    <button type="button" class="btn btn-outline-primary">Logout</button>
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
                                /*
                                    <div class="top-banner">
                                    <form class="form-inline">  
                                        <a style="font-size:25px;" href="<?php echo $survey_address[$i];?>"><?php echo $survey_name_trending[$i];?></a>
                           	        
                           	        <p style="font-size:20px; margin-left:40px;"><?php echo $people_respond_trending[$i];?></p>
                           	        </form>  
                           	        </div><br>


*/

                                    ?>
                               <div class="d-flex my-flex">
            
                                    <div class="p-2 mr-auto my-flex " style="font-weight: 500;color: black;margin-top: 7px;">
                                       <a style="font-size:15px;text-decoration:none;color:black;" href="<?php echo $survey_address[$i];?>"><?php echo ($i+1).".  ".$survey_name_trending[$i];?></a>
                                       </div>
            
                                    <div class="p-2 my-flex">
                                      <h5 style="font-weight: 500;color: black;margin-top: 7px;"><?php echo $people_respond_trending[$i];?><i class="fas fa-users"></i></h5>
                                    </div>
            
                                    <div class="p-2 my-flex">
                                      <button type="submit" class="btn btn-light">
                                         <i class="fas fa-poll-h"></i> Result
                                    </button>
                                    </div>
                               </div>
                                 <?php
                            }
                            ?>
                            <div class="d-flex justify-content-between mb-3">
                            <?php
                        if($n>20)
                        {
                            
                        
                              ?> 
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



		<div class="col-xs-12 col-sm-12 col-md-3">
			<div class="cards" style="width:100%;border:1px solid black;">
				<div class="card-body">
					<h5>This space for ADVERTISMENT</h5>
				</div>
			</div>
		</div>


	</div>
</div>


<footer>
  	<div  id="contact" class="container-fluid padding">
  		<div class="row text-center padding">
  		<div class="col-md-4">
  			<img src="">
  			<hr class="light">
  			<p style="color: white">55--555</p>
  			<p style="color: white">Swaraj@gmail.com</p>
  			<p style="color: white">10 Street Name</p>
  			<p style="color: white">city,state,0000</p>
  		</div>
  		<div class="col-md-4">
  			<hr class="light">
  			<p style="color: white">Our hours</p>
  			<hr class="light">
  			<p style="color: white">Monday:10am-7pm</p>
  			<p style="color: white">Monday:10am-7pm</p>
  			<p style="color: white">Monday:10am-7pm</p>
  		</div>
  		<div class="col-md-4">
  			<hr class="light">
  			<p style="color: white">Our hours</p>
  			<hr class="light">
  			<p style="color: white">Monday:10am-7pm</p>
  			<p style="color: white">Monday:10am-7pm</p>
  			<p style="color: white">Monday:10am-7pm</p>
  		</div>
  		<div class="col-12">
  			<hr class="light">
  			<h5 style="color: white">&copy;Survey Creator</h5>
  		</div>
  	</div>
  	</div>
  </footer>
<!------Foooter End-------->



</body>

</html>

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