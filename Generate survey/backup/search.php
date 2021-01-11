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
                        <title>
                            About Me
						</title>
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
				 <form class="form-inline" action="search_php.php" method="POST">
					<input class="form-control mr-sm-2" type="search" name="str_data" placeholder="search survey,profile" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" name="search_submit" type="submit" style="font-weight: 500;">Search</button>
				  </form>
				<!------------------Search Box End------->
					<button type="button" class="btn btn-outline-primary">Logout</button>
				   </div>
				</nav>
				<!-----End Of Navigation----->
					<table align="center"  style="margin-top:100px;">
					<center>
					    
					  Search For Survey , Peoples
					  <hr>
					  <tr>
					      <td>
					          <h3>Survey</h3>
					          <hr>
					          <br>
					      </td>
					  </tr>
					  
					
	<?php
	
		$str=$_GET['search'];
		$username_array=array();$lastname_array=array();$email_array=array();$surveyname_array=array();$id_array=array();
		$count=0;
		//searching start
		
		//first search in users table
		$sql="SELECT * FROM All_Survey_Name WHERE Survey_Name LIKE '%$str%'";
		$run=mysqli_query($con,$sql);
		if(mysqli_num_rows($run)>0)
		{
			while($data=mysqli_fetch_assoc($run))
			{
			    $survey_name=$data['Survey_Name'];
			    $user_id=$data['User_Id'];
			    $survey_id=$data['Survey_Id'];
			    $link="survey.php?surveyname=".$survey_name."&&user=".$user_id."&&survey=".$survey_id."&&page=1";
				?>
					
						<tr>
							
							<td>
								<a href="<?php echo $link;?>"><?php echo $data['Survey_Name'];?></a>
							</td>
							<td>
								<?php echo $data['People_Respond'];?>
							</td>
						</tr>
					
					
				<?php
			}
		}
		if(isset($_SESSION['user_id']))
		{
		    ?>
		    <tr>
					      <td>
					          <hr>
					          <br>
					         <h3>Peoples</h3> 
					         <hr>
					         <br>
					      </td>
					  </tr>
		    <?php
    		//first search in users table
    		$sql="SELECT * FROM users WHERE Email LIKE '%$str%' OR Username LIKE '%$str%' OR Lastname LIKE '%$str%'";
    		$run=mysqli_query($con,$sql);
    		if(mysqli_num_rows($run)>0)
    		{
    			while($data=mysqli_fetch_assoc($run))
    			{
    			    $user_id=$data['ID'];
    			    $link="aboutme.php?user=".$user_id;
    				?>
    					
    						<tr>
    							<td>
    								<img class="card-img-top" src="dataimg/<?php if($data['ProfilePic'])echo $data['ProfilePic'];else echo "people.png";?>" alt="Card image" style="width:50px;height:50px;">
    								<a href="<?php echo $link;?>"><?php echo " ".$data['Username'];?><?php echo " ".$data['Lastname'];?></a>
    							</td>
    							
    						</tr>
    					
    					
    				<?php
    			}
    		}
		}
		else
	      {  ?>
	        
	        
	        <tr>
	            <td>
	                Log in first to search for peoples.
	            </td>
	        </tr>
	        <?php
	      }
		
	
	
}
else
{
	echo "Something went error.";
}
?>
<hr>
<tr>
    <td>
<div style="margin-top:200px;">
    SurveyBuilder@organization
</div>
    </td>
</tr>

</center>
</table>
</body>
					
</html>