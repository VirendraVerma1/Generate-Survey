<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_GET['user']))
{
    //get user name
    $user_id=$_GET['user'];
    $sql="SELECT * FROM users WHERE ID='$user_id'";
    $run=mysqli_query($con,$sql);;
    if($run)
    {
        $data=mysqli_fetch_assoc($run);
        
    
    ?>
        <!DOCTYPE html>
        <html>
        <head>
        	<title><?php echo $data['Username'];?></title>
            <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" href="img/icon.png">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="css/fixed.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
          
          <style type="text/css">
          	@import url('https://fonts.googleapis.com/css?family=Lato:400,700');
        
        body{
        	overflow-x: hidden;
        	font-family: 'Lato', sans-serif;
        	color: #505962;
        }
        .my-flex2{
        	background-color: #00bfff;
        }
        .btn-md{
        	margin-bottom: 10px;
        }
        
        
        </style>
        
        </head>
        
        <body>
         
        <!---Navigation--->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        	<a class="navbar-brand" href="#"><h4 class="display-6"><img src="img/icon.png" width="60" height="50">Company Name</h4></a>
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
        
        <div class="container-fluid padding">
        	<div class="row text-center padding">
        		<div class="col-12">
        			<a href="aboutme.php?user=<?php echo $user_id;?>" align="left" style="text-decoration:none;"><img src="<?php if($data['ProfilePic'])echo "dataimg/".$data['ProfilePic'];else
                     	    echo "dataimg/people.png";?>" width="50" height="50" align="left" ><h5  style="margin-top:15px;" align="left"><?php echo $data['Username'];?></h5></a>	
                            
                     <div class="cards" style="width:100%;border: 0px solid black;">
                     	<div class="card-body">
                     		
                     		
                     	    
							<div class="text-center">
                            	<h4 class="display-6">Nortification</h4>
                            </div>

    <?php
    }
    
    $friend_id=$_GET['user'];
    $count=0;
    $table_name="userid_".$_SESSION['user_id']."_nortification";
    $sql="SELECT * FROM $table_name ORDER BY ID DESC";
    $run=mysqli_query($con,$sql);
    if($run)
    {
        while($data=mysqli_fetch_assoc($run))
        {
            if($data['FriendName']==$friend_id&&$data['Status']!='created')
            {
				//check for activated survey
				$table_name="userid_".$friend_id;
				$survey_id=$data['SurveyId'];
				$sql="SELECT * FROM $table_name WHERE ID='$survey_id'";
				$run2=mysqli_query($con,$sql);
				if($run2)
				{
					$data2=mysqli_fetch_assoc($run2);
					if($data2['ActiveSurvey'])
					{
						$count++;
						$survey_link="survey.php?user=".$friend_id."&&survey=".$data['SurveyId']."&&page=1";
						$date_created=$data['DayCreated'];
						$date_created=date("d-m-Y", strtotime($date_created));
						?>
							 <!--------------Repetition Start----------------------------------------->

							<!------------------Image And Name Start ---------------------->
											<div class="d-flex justify-content-between my-flex2 mb-4">
											   <div class="p-2 my-flex2">
												<form class="form-inline">
												
												 <h5 style="color:<?php if($data['Status']=='not seen')echo "red";else echo "black";?> ;margin-top:20px;" ><?php echo $count.". ".$data['SurveyName'];?>
												 </h5>
											 </form>
											   </div>
							<!------------------Image And Name End ---------------------->
						
							 <!------------------Notificatin Button Start ---------------------->
											  <div class="p-2 my-flex2">
												  <h6 style="margin-top:20px;"><?php echo $date_created;?></h6>
											  </div>
							 <!-----------------Notificatin Button End ---------------------->
							
							<!------------------TWO Button End ---------------------->
											   <div class="p-2 my-flex2">
												<div class="form-inline" style="margin-top:8px;">
													
													<a href="<?php echo $survey_link;?>" style="text-decoration:none;"><button type="submit" class="btn btn-light mr-sm-2 btn-md" style="padding-right: 23px;">
														<h5>Take Survey</h5></a>
													</button>
												</div>
											   </div>
							<!------------------TWO Button End ---------------------->                   
											</div>
						
							<!--------------Repetition END----------------------------------------->      
						<?php
						$id=$data['ID'];
						$sql="UPDATE $table_name SET Status='seen' WHERE ID='$id'";
						$run2=mysqli_query($con,$sql);
					}
				}
			}
        }//end of while loop
    }
	
	if($count==0)
	{
		?>
			<p align="center">No Survey Found</p>
		<?php
	}
    ?>
        
                 	</div>
                 </div>
    
    		</div>
    	</div>
    </div>
        
       
    
    </body>
    
    </html>
    <?php
    
    
}
else
{
    header("Location: signup.php?account=exist");
  	ob_end_flush();
    exit();
}
?>

             
