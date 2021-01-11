<?php
ob_start();
session_start();
include("db_con.php");
include("link.php");


if(isset($_SESSION['user_id']))
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
	$phoneNO="";$dob="";$gender="";$profile_pic="";
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
        elseif($_GET['error']=='otpfailed')
        {
            $message="OTP not match";
            
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
        $email=$data['Email'];
		$address=$data['Address'];
		$occupation=$data['Occupation'];
		$location=$data['Location'];
		$about=$data['About'];
		$phoneNO=$data['PhoneNo'];
		$dob=$data['DOB'];
		$gender=$data['Gender'];
		$profile_pic=$data['ProfilePic'];
		$tatal_survey=$data['TotalSurvey'];
		if($phoneNO==0)
			$phoneNO="";
    }
    if(!$profile_pic)
	{
		$profile_pic="people.png";
	}
   
    ?>			<!DOCTYPE html>
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

                        <title>
                            About Me
						</title>
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
					@media screen and (max-width: 576px){
    h4{
      font-size: 15px;
    }
    h5{
      font-size: 15px;
    }
    
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
							
							<?php
							    if($_SESSION['user_id']==$_SESSION['view_profile'])
							    {
							        ?>
							            <li class="nav-item">
            								<a class="nav-link" href="profile.php">My Survey</a>
            							</li>
							        <?php
							    }
							    else
							    {
							        $uid=$_SESSION['user_id'];
							        $name="";
							        $sql="SELECT * FROM users WHERE ID='$uid'";
							        $run2=mysqli_query($con,$sql);
							        if($run2)
							        {
							            $data2=mysqli_fetch_assoc($run2);
							            $name=$data2['Username'];
							        }
							        ?>
							            <li class="nav-item">
            								<a class="nav-link" href="aboutme.php"><?php echo $name;?></a>
            							</li>
							        <?php
							    }
							?>
							
							
						</ul>
				<!--------------Search Box Start------->	
				 <form class="form-inline" action="search_php.php" method="POST">
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
                        
				
	<?php
     if(isset($_GET['success']))
    {
        if($_GET['success']=='passwordchangedsuccess')
        {
            $message="Password changed successfully";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
    }
    
    if(isset($_GET['button'])&&isset($_SESSION['user_id']))
    {
        if($_GET['button']=="edit"&&($_SESSION['user_id']==$_SESSION['view_profile']))
        {
             ?>
				

				<!--------------------profile Page Start-------------------------------------------------->
				<div class="container-fluid">
					<div class="row text-center padding">

						<div class="col-xs-12 col-sm-12 col-md-4">
							 <div class="cards" style="width: 300px;">
								<label for="file-upload" class="custom-file-upload">
								<img class="card-img-top" src="dataimg/<?php echo $profile_pic;?>" alt="Card image" style="width:100%">
								
								</label>
								
								<?php
								    if($_SESSION['user_id']==$_SESSION['view_profile'])
								    {
								        
								        ?>
								            <form action="aboutme_php.php" method="POST" enctype="multipart/form-data">
								        <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">
										<button type="submit" class="btn btn-outline-primary " name="profile_change" >Change</button>
								        </form>
								        <?php
								    }
								    ?>
								
							</div>
						</div>
						
						<!---------------------------about me description----------------------->
						
						
				<!--------------------profile Page Start-------------------------------------------------->



				<!----------------Editorial page Start------------------------------------------------------->
				<div class="col-xs-12 col-sm-12 col-md-8">
							 <div class="cards" style="border: 0px solid black;">
								<div class="card-body">

					

										
					 <!---------- Name and Location input field START -------------->
					 <form action="aboutme_php.php" method="POST">
										  
											<div class="d-flex flex-row bd-highlight mb-3">
                                                <div class="p-1 bd-highlight">
                                                    <input class="pta mr-sm-2" align="left" type="text" name="fname" value="<?php echo $first_name;?> ">
													
												  </div>
												</div>
												
										    
						<!---------- Name and Location input field END -------------->
						
						                  <div class="d-flex flex-row bd-highlight mb-3">
										  <div class="p-1 bd-highlight">   
									     <input  type="text" name="locationname" placeholder="Location" value="<?php  echo $location;?>">
								          </div>        
                                        </div>
								  
						<!---------- Profession input field START -------------->
								  
								  <div class="d-flex flex-row bd-highlight mb-3">
										  <div class="p-1 bd-highlight">   
									 <input type="text" name="professionname" placeholder="Profession" align="left" style="color:darkblue;border: 2px solid black;" value="<?php  echo $occupation;?>">
										  </div>
								  </div>
						<!---------- Profession input field END -------------->
								  <hr class="my-2">
										  
								  <h6 class="text" align="left" style="color:#00ced1;">CONTACT INFORMATION</h6><br>
								  
						<!------------------PHONE NUMBER INPUT BOX START---------------------------->
										<div class="form-inline">
										 <h5>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="text" name="pphone" style="
											border: 2px solid black;"  placeholder="(Optional)" value="<?php  echo $phoneNO;?>">
									   </div><br>
						<!------------------PHONE NUMBER INPUT BOX START---------------------------->


						<!------------------ADDRESS INPUT BOX START---------------------------->
										<div class="form-inline">
										 <h5>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="text" name="adress" style="
											border: 2px solid black;" placeholder="(Optional)" value="<?php  echo $address;?>">
									   </div><br>
						<!------------------ADDRESS INPUT BOX START---------------------------->


						<!------------------E-mail INPUT BOX START---------------------------->
										<div class="form-inline">
										 <h5>E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="text" name="email" style="
											border: 2px solid black;" placeholder="Email" value="<?php  echo $email;?>">
									   </div><br>
						<!------------------E-mail INPUT BOX START---------------------------->


						<!------------------E-mail INPUT BOX START---------------------------->
									<!--	<div class="form-inline">
										 <h5>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="password" name="phone" style="
											border: 2px solid black;" value="12345">
									   </div><br>  -->
									   <a href="aboutme.php?button=changepass">Change Your Password</a>
						<!------------------E-mail INPUT BOX START---------------------------->
									<hr class="my-2">

									<h6 class="text" align="left" style="color:#00ced1;">BASIC INFORMATION</h6><br>
									 <div class="form-inline">
										 <h5>Birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="date" name="bday" style="
											border: 2px solid black;" value="<?php  echo $dob;?>">
									 </div><br>

									 <div class="form-inline">
										 <h5>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <input type="Text" name="gender" style="
											border: 2px solid black;" value="Male">
									 </div><br><br>

									<?php
									    if($_SESSION['user_id']==$_SESSION['view_profile'])
									    {
									        ?>
									            <button type="submit" style="padding: 10px 20px 10px 20px;" name="save_me" class="btn btn-outline-primary mr-sm-2">
									            	<i class="fas fa-save"></i> Save
									             </button>
									        <?php
									        
									    }
									?>
									 
									
									</form>
								</div>
							 </div>
				</div>    
   
				<!----------------Editorial page End------------------------------------------------------->
				
							 
			  <?php
        }
        elseif($_GET['button']=='delete'&&($_SESSION['user_id']==$_SESSION['view_profile']))
        {
			?>
				<div align="center" style="margin-top:100px;">
                    <form action="aboutme_php.php" method="POST">
                    <input type="text" name="pass_delete" placeholder="Enter your password">
                    <h4 style="color:red;"><?php echo $message;?></h4>
                    <button type="submit" class="btn btn-outline-primary" name="confirm_delete" >Confirm Delete</button>
                    </form>
                </div>
			
			
		    <?php
        }
        elseif($_GET['button']=='changepass'&&($_SESSION['user_id']==$_SESSION['view_profile']))
        {
            
			?>
				<div align="center" style="margin-top:100px;">
                    <form action="aboutme_php.php" method="POST">
                    <h3>Change Your Password</h3>
                    <input type="text" name="new_pass" placeholder="Enter new password"><br>
                    <input type="text" name="pass_old" placeholder="Enter old password">
                    <h4 style="color:red;"><?php echo $message;?></h4>
                    <button type="submit" class="btn btn-outline-primary" name="pass_change" >Change</button>
                    </form>
                    
                    <a href="aboutme.php?button=forgotpass">Forgot Password</a>
                </div>
			
			
		    <?php
        }
        elseif($_GET['button']=='forgotpass'&&($_SESSION['user_id']==$_SESSION['view_profile']))
        {
            if(!$message=='OTP not match')
            {
            //send otp to email
            $_SESSION['otp']=rand(10000,99999);
			$_SESSION['time']=time();
            $to = $email;
            $subject = "Change Password";
            $txt = "Here is your OTP ". $_SESSION['otp'];
            $headers = "From: generatesurvey.com" . "\r\n" .
            "CC: generatesurvey.com";
            
            mail($to,$subject,$txt,$headers);
            }
			?>
				<div align="center" style="margin-top:100px;">
                    <form action="aboutme_php.php" method="POST">
                    <h3>Change Your Forgot Password</h3>
                    <input type="text" name="pass_change" placeholder="Enter new password"><br>
                    <input type="text" name="otp" placeholder="Enter OTP">
                    <h4 style="color:red;"><?php echo $message;?></h4>
                    <button type="submit" class="btn btn-outline-primary" name="forgot_pass_change" >Change</button>
                    </form>
                    <h5>An OTP is sent to your email address</h5>
                    <a href="aboutme.php?button=forgotpass">Resend OTP</a>
                    
                </div>
			
			
		    <?php
        }
    }
    else
    {
    
    
    
    ?>
		       

				
				
				
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

				<!--------DETAILS SECTION ----------------------------->

				   <!-----------NAME AND PROFESSION SECTION------------------------->
						<div class="col-xs-12 col-sm-12 col-md-8">
							 <div class="cards" style="border: 0px solid black;">
								<div class="card-body">
								    
								     <form action="aboutme_php.php" method="POST">
								    <div class="d-flex flex-row-reverse bd-highlight">
            								<div class="p-2 bd-highlight">	
								    <?php
								    
								        //for people you follow button , followers button
								        if($_SESSION['user_id']==$_SESSION['view_profile'])
								        {
								            $followers=0;
								            $table_name="userid_".$_SESSION['view_profile']."_friend_list";
								            $sql="SELECT * FROM $table_name";
								            $run=mysqli_query($con,$sql);
								            if($run)
								            {
								                while($data=mysqli_fetch_assoc($run))
								                {
								                    if($data['State']=='follower')
								                    {
								                        $followers=$followers+1;
								                    }
								                }
								            }
								            ?>
								               	
            									 
            									 
            									 <button type="submit" name="pyf_submit" class="btn btn-light justify-content-end" >
            									  </i> Following
            									 </button>
            									 
            									 
            									 <button type="submit" name="followers_submit" class="btn btn-light justify-content-end" >
            									  Followers <?php echo " ".$followers;?>
            									 </button>
            									 
								                
								            <?php
								        }
								        else
								        {
								            $followers=0;
								            //getting followers of user
								            $table_name="userid_".$_SESSION['view_profile']."_friend_list";
								            $sql="SELECT * FROM $table_name";
								            $run=mysqli_query($con,$sql);
								            if($run)
								            {
								                while($data=mysqli_fetch_assoc($run))
								                {
								                    if($data['State']=='follower')
								                    {
								                        $followers=$followers+1;
								                    }
								                }
								            }
								            
								            
								            $flag=0;
								            //getting if follow
								            $table_name="userid_".$_SESSION['user_id']."_friend_list";
								            $friend_id=$_SESSION['view_profile'];
								            $sql="SELECT * FROM $table_name";
								            $run=mysqli_query($con,$sql);
								            if($run)
								            {
								                while($data=mysqli_fetch_assoc($run))
								                {
    								                if($data['State']=='following'&&$data['FriendName']==$friend_id)
    								                {
    								                    $flag=1;
    								                }
								                
								                }
								            }
								            
								            if($flag==0)
								            {
								                ?>
								                    <?php echo $followers;?> Followers  
								               
								                    <button type="submit" name="follow_user" class="btn btn-primary justify-content-end" style="color:white;font-weight:700;" >
            									         <i class="fas fa-plus-square"></i> Follow
            									         
            									    </button>
								                <?php
								            }
								            else
								            {
								                ?>
								                      <?php echo $followers;?>  Followers
    								                    <button type="submit" name="unfollow_user" class="btn btn-danger justify-content-end" style="color:white;font-weight:700;">
                									         <i class="fas fa-minus-square"></i> Unfollow
                									       
                									    </button>
								                    <?php
								            }
								            
								        }
								    ?>
									 </div> 
            						</div>   
            						</form>
            					<br>
									 
									 
									 <form class="form-inline">
									 <h4 class="display-6" align="left"><?php  echo $first_name;?></h4>
									 <sub><i class="fas fa-globe"></i> <?php  echo $location;?></sub>
									 </form>
									 <h6 class="display-6" align="left" style="color:darkblue;"><?php  echo $occupation;?></h6>
				  <!-----------NAME AND PROFESSION SECTION------------------------->
									 <hr class="my-2">

				   <!----------CONTACT//BASIC INFORMATION START---------------------->                  
									 <div class="d-flex flex-row bd-highlight mb-3">

										  <div class="p-2 bd-highlight">

											<a href="aboutme.php?user=<?php echo $_SESSION['view_profile'];?>"><button type="submit" class="btn btn-light">
											<i class="fas fa-user"></i> About
											</button></a>
											<div class="heading-underline"></div>

										  </div>

										  <div class="p-2 bd-highlight">

										  <a href="aboutmesurvey.php?user=<?php echo $_SESSION['view_profile'];?>"><button type="submit" class="btn btn-light">
											 <i class="fas fa-poll"></i> Survey
											 </button></a>

										  </div>
				  
									 </div>
									  <hr class="my-2">

									 <h6 class="text" align="left" style="color:#00ced1;">CONTACT INFORMATION</h6><br>
									 <div class="form-inline">
										 <h5>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <h5><?php  echo $phoneNO;?></h5>
									 </div><br>

									 <div class="form-inline">
										 <h5>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <h5 class="address"><?php  echo $address;?></h5>
									 </div><br>
									 <div class="form-inline">
										 <h5>E-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <h5 class="email"><?php  echo $email;?></h5>
									 </div>
									 <hr class="my-2">
									 <h6 class="text" align="left" style="color:#00ced1;">BASIC INFORMATION</h6><br>
									 <div class="form-inline">
										 <h5>Birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <h5><?php  echo date("d-m-Y", strtotime($dob));?></h5>
									 </div>

									 <div class="form-inline">
										 <h5>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										 <h5><?php echo $gender;?></h5>
									 </div><br><br>
									
									
									<form action="aboutme_php.php" method="POST">
								  <div class="d-flex flex-row bd-highlight mb-3">
								  
								  
								  <?php
								  
								    if($_SESSION['user_id']==$_SESSION['view_profile'])
								    {
								        ?>
								            <div class="p-2 bd-highlight">
									 <a href="Aboutmeditor.html"><button type="submit" name="edit_me" class="btn btn-outline-primary mr-sm-2">
										<i class="fas fa-user-edit"></i> Edit
									 </button></a>
									 </div>
									
									 <div class="p-2 bd-highlight">
									 <button type="submit"  name="delete_me" class="btn btn-outline-primary">
										<i class="fas fa-trash-alt"></i> Delete Account
									 </button>
									 </div>
								        <?php
								    }
								  ?>
									  
									 
								 </div>
								 </form>
								 
								 

								</div>
							 </div>
						</div>
				<!----------CONTACT//BASIC INFORMATION END---------------------->

					</div>
				</div>

	
	<?php
	}
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