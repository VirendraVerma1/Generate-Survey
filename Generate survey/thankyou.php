<?php
ob_start();
session_start();
include("db_con.php");
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

	<title>Thank You</title>
	
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">




   <style type="text/css">
   @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500');
 body{
	overflow-x: hidden;
	font-family: 'Montserrat', sans-serif;
}
h3{
   margin-top: 10px;
} 
.rating-header {
    margin-top: -10px;
    margin-bottom: 10px;
}
.mylast{
	background-color: lavenderblush;
}
textarea::placeholder {
  color: black;
}

</style>
    
</head>
<body>
  
  <div class="container-fluid padding">
  	<div class="row text-center padding">
  		<div class="col-12">
  			
  			
            <h4 class="display-1  text-success animated infinite rubberBand delay-2s" style="margin-top:100px;">THANK YOU</h4>
            <h6 class="  text-success animated infinite rubberBand delay-2s">FOR YOUR OPINION</h6>
			
			<?php
				// for result date
				if(isset($_SESSION['member_user_table_id'])&&isset($_SESSION['member_survey_table_id']))
				{
					$table_name="userid_".$_SESSION['member_user_table_id'];
					$survey_id=$_SESSION['member_survey_table_id'];
					$sql="SELECT * FROM $table_name WHERE ID='$survey_id'";
					$result=mysqli_query($con,$sql);
					if($result)
					{
						$data=mysqli_fetch_assoc($result);
						if($data['EnableResultPage']==1)
						{
							$t1=strtotime($data['DayCreated']);
                            $t2=strtotime($data['DayLeft']);
							
								$link="result.php?surveyname=".$data['SurveyName']."&&user=".$_SESSION['member_user_table_id']."&&survey=".$_SESSION['member_survey_table_id']."&&page=1";
								$number= round(((($t2-$t1)/24)/60)/60)-2;
								if($number>0)
								{
								?>
									<div align="center" style="margin-top:10px;">
										<h3><?php echo $number; ?>day left for survey result of <?php echo str_replace("_"," ",$data['SurveyName']);?></h3>
									</div>
								<?php
								}
								else
								{
									?>
									<div align="center" style="margin-top:10px;">
										<a href="<?php echo $link;?>">Check Result of Survey <?php echo str_replace("_"," ",$data['SurveyName']);?></a> 
									</div>
									<?php
								}
							
						}
					}
				}
				
			?>
			
			
<?php

if(isset($_SESSION['member_user_table_id'])&&isset($_SESSION['member_survey_table_id']))
{
    $user_id=$_SESSION['member_user_table_id'];
    $survey_id=$_SESSION['member_survey_table_id'];
    
    //for cheching rate system enable
    $table_name="userid_".$user_id;
    $sql="SELECT * FROM $table_name WHERE ID='$survey_id'";
    $run=mysqli_query($con,$sql);
    if($run)
    {
        $data=mysqli_fetch_assoc($run);
        
        if($data['EnableComment'])
        {
            if(isset($_SESSION['comment']))
            {
                ?>
                    Your Comment :<?php echo $_SESSION['comment'];?>
                <?php
            }
            else
            {
                ?>
                <!--------------------Comments Ke liye----------------------------->
                   <form action="thankyou_php.php" method="POST">
                    <textarea rows="4" cols="35" name="comment"placeholder="Give your suggestion about this survey..." style="margin-top:20px;" ></textarea><br>
                    <button type="submit" name="submit_comment"class="btn btn-primary" style="margin-top:10px;">Comment</button></form>
                <?php
            }
            
        }
    }
    
}
else
{
    ?>
    
    <?php
}
?>
	

        
    
    <div class="cards" style="border: 0px solid black;">
    	<div class="card-body">
    	    
    	    <div class="d-flex justify-content-center bg-light">
                <div class="p-2">
                	<a href="ongoingsurvey.php" style="text-decoration:none;"><button class="btn btn-primary" style="font-weight:800;">View more Survey</button></a>
                </div>
            </div><br> 
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
                        
                        if($n>2)
                        {
                            $m=2;
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
                                        
                                        <div class="d-flex justify-content-center bg-light">
                                        <div class="p-2 mylast">
                     <a style="font-size:15px;color:black;" href="<?php echo $survey_address[$i];?>"><?php echo $survey_name_trending[$i];?></a>
                                        </div>

                
                                        </div><br>
                                    <?php
                            }
                        if($n>3)
                        {
                            
                        }
                    }
                    else
                    echo "no survey found";
                ?>
            

                
    	</div>
    </div>
   
<!--------------------Create Your own Survey link----------->
                 <div class="d-flex justify-content-center bg-light">
                        <div class="p-2">
                         <a href="homepage.php">
                         	<h5 class="animated infinite bounce delay-2s">Create Your Own Survey</h5></a>
                        </div>
                    </div>

  		</div>
  	</div>
  </div>
  
  



<!-----------------RATING SCRIPT------------------------->
<script>
	
 	jQuery(document).ready(function($){
	    
	$(".btnrating").on('click',(function(e) {
	
	var previous_value = $("#selected_rating").val();
	
	var selected_value = $(this).attr("data-attr");
	$("#selected_rating").val(selected_value);
	
	$(".selected-rating").empty();
	$(".selected-rating").html(selected_value);
	
	for (i = 1; i <= selected_value; ++i) {
	$("#rating-star-"+i).toggleClass('btn-warning');
	$("#rating-star-"+i).toggleClass('btn-default');
	}
	
	for (ix = 1; ix <= previous_value; ++ix) {
	$("#rating-star-"+ix).toggleClass('btn-warning');
	$("#rating-star-"+ix).toggleClass('btn-default');
	}
	
	}));
	
		
});

</script>

<br><br><br>
</body>
</html>