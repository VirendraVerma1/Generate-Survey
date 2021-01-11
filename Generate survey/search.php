<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_GET['search']))
{
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

			<title>Search Survey/People</title>
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
		   @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
		body{
			overflow-x: hidden;
			font-family: 'Playfair Display', serif;
			color: #505962;
		}
		.myself{
			background-color: yellowgreen;
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
		<!--------------Search Box Start------->	
		  <form class="form-inline" action="search_php.php" method="POST">
			<input class=" mr-sm-4" type="search" name="str_data" placeholder="search survey,profile" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" name="search_submit" type="submit" style="font-weight: 500;">Search</button>
		  </form>
		<!------------------Search Box End------->
		   </div>
		</nav>
		<!-----End Of Navigation----->


		<div class="container-fluid">
			<div class="row text-center padding">
				<div class="col-12">
		<div class="d-flex justify-content-center">
			
			<a href="search.php?search=<?php echo $_GET['search'];?>&&type=survey" style="text-decoration: none;"><div class="display-6 mr-sm-2">
				<h5>Survey</h5>
			</div></a>
            | 
			<a href="search.php?search=<?php echo $_GET['search'];?>&&type=people" style="text-decoration: none;"><div class="display-6">
				<h5>People</h5>
			</div></a>

		</div>
				</div>
			</div>
		</div>

	

		<div class="container-fluid">
			<div class="row text-center padding">
				<div class="col-xs-12 col-sm-12 col-md-9">
					
				  <div class="cards" style="width:auto;border: 0px solid black;">
					<div class="card-body">
						
						<?php
						$str=$_GET['search'];
						//removing %20 (space)
						$str=urlencode($str);
						$str = str_replace('+', ' ', $str);
						echo $str;
						$_SESSION['comment_column_table']=$str;
						
						if(isset($_GET['type']))
						$_SESSION['search_type']=$_GET['type'];
					
							if(!isset($_GET['type']))
							{
									?>
										<h2>Survey</h2><br>
									<?php
							
								$username_array=array();$email_array=array();$surveyname_array=array();$id_array=array();
								$count=0;
								//searching start
								
								//first search in users table
								$sql="SELECT * FROM All_Survey_Name WHERE Survey_Name LIKE '%$str%'";
								$run=mysqli_query($con,$sql);
								if(mysqli_num_rows($run)>0)
								{
									while($data=mysqli_fetch_assoc($run))
									{
										if($count<20)
										{
										$survey_name=$data['Survey_Name'];
										$user_id=$data['User_Id'];
										$survey_id=$data['Survey_Id'];
										$link="survey.php?surveyname=".$survey_name."&&user=".$user_id."&&survey=".$survey_id."&&page=1";
										?>
											<div class="d-flex myself">
												
												<div class="p-2  myself">
													<h4 style="margin-top: 10px;"><?php echo $data['Survey_Name'];?></h4>
												</div>

												<div class="p-2 ml-auto myself">
													<a href="<?php echo $link;?>" style="text-decoration:none;"><button class="btn btn-outline-light">Take Survey</button></a>
												</div>
											</div><br>
										<?php
										
										}
										if($count==20)
										{
											?>
												<a href="search.php?search=<?php echo $_GET['search'];?>&&type=survey" style="text-decoration:none;"><button class="btn btn-primary">View More Survey</button></a>
											<?php
										}
										$count++;
									}
									
								}
								else
								{
									?>
										No Survey found
									<?php
								}
								
									?>
										<hr>
										<br><br><h2>Peoples</h2><br>
									<?php
								//first search in users table
									$sql="SELECT * FROM users WHERE Email LIKE '%$str%' OR Username LIKE '%$str%' ORDER BY ID DESC";
									$run=mysqli_query($con,$sql);
									if(mysqli_num_rows($run)>0)
									{
										while($data=mysqli_fetch_assoc($run))
										{
											if($count<20)
											{
											$user_id=$data['ID'];
											$link="aboutme.php?user=".$user_id;
											?>
											<div class="d-flex myself">
												<div class="p-2  myself">
													<img src="dataimg/<?php if($data['ProfilePic'])echo $data['ProfilePic'];else echo "people.png";?>" style="width:50px;height:50px;">
												</div>

												<div class="p-2  myself">
													<h5 style="margin-top: 10px;"><?php echo " ".$data['Username'];?></h5>
												</div>

												<div class="p-2 ml-auto myself">
													<a href="<?php echo $link;?>" style="text-decoration:none;"><button class="btn btn-outline-light">View Profile</button></a>
												</div>
											</div><br>
											<?php
											
											}
											if($count==20)
											{
												?>
													<a href="search.php?search=<?php echo $_GET['search'];?>&&type=people" style="text-decoration:none;"><button class="btn btn-primary">View More Peoples</button></a>
												<?php
											}
											$count++;
										}
										
									}
								else
								{
									?>
										No people found
									<?php
								}
							}
							if(isset($_SESSION['user_id'])&&isset($_GET['type']))
							{
								if($_GET['type']=='people')
								{
									//first search in users table
									$sql="SELECT * FROM users WHERE Email LIKE '%$str%' OR Username LIKE '%$str%'";
									$run=mysqli_query($con,$sql);
									if(mysqli_num_rows($run)>0)
									{
										
										
											?>
											
												<div id="load_data"></div>
                               
													<br />
												
											<?php
											
											
										
									}
									else
									{
										?>
											No people found
										<?php
									}
								}
								elseif($_GET['type']=='survey')
								{
									$str=$_GET['search'];
									$_SESSION['comment_column_table']=$str;
									$username_array=array();$lastname_array=array();$email_array=array();$surveyname_array=array();$id_array=array();
									$count=0;
									//searching start
									
									//first search in users table
									$sql="SELECT * FROM All_Survey_Name WHERE Survey_Name LIKE '%$str%'";
									$run=mysqli_query($con,$sql);
									if(mysqli_num_rows($run)>0)
									{
										
											?>
												<div id="load_data"></div>
                               
													<br />
												
											<?php
											
									}
									else
									{
										?>
											No survey found
										<?php
									}
									
								}
									
							}
							else
							{  ?>

								<?php
							}
		
	
	
}
else
{
	echo "Something went error.";
}
?>
						<hr>
						</div>
				  </div>

				</div>

                <!--for ADVETISMENT-->
				<div class="col-xs-12 col-sm-12 col-md-3">
					<div class="cards" style="border:0px solid black;">
						<div class="card-body">
						        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- searchrightcontent -->
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-5870321000407115"
                                     data-ad-slot="2402189878"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
						</div>
					</div>
				</div>
			</div>
		</div>

		</body>

		</html>
		
		
		
		
		
		<script>

$(document).ready(function(){
 
 var limit = 20;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch_search_item.php",
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