<?php
ob_start();
session_start();
include("db_con.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
  	background-color:	#696969;
  }
  
  
  
  

    </style>
	
</head>

<body>
      
<!-------------Navigation------------------>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#"><h4 class="display-6"><img src="img/icon.png" width="60" height="50">Generate Survey</h4></a>
    <button class="navbar-toggler" type="button" data-target="#navResponsive" data-toggle="collapse">
    	<span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navResponsive">
    	<ul class="navbar-nav ml-auto">
    		<li class="nav-item">
    			<a class="nav-link" href="homepage.php">Home</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="signup.php">Sign Up</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="contact_us.php">Contact</a>
    		</li>
    	</ul>
    </div>
</nav>
<!-----End Of Navigation----->

<?php
	if(isset($_GET['user']))
	{
		if($_GET['user']==0)
		{
			//means no account found
			?>
			<div align="center" style="margin-top:100px;">
				Sorry we didnt find your account
				<a href="forgetpassword.php" style="text-decoration:none;"><button type="submit" name="check_account" class="btn btn-outline-primary">Try Again</button></a>
				</div>
			<?php
		}
		else
		{
			$id=$_GET['user'];$email="";
			//got an account
			//get email from users database
			$sql="SELECT * FROM users WHERE ID='$id'";
			$run=mysqli_query($con,$sql);
			if($run)
			{
				$data=mysqli_fetch_assoc($run);
				$email=$data['Email'];
			}
			
			//send otp to email
            $_SESSION['otp']=rand(1000,9999);
			$_SESSION['time']=time();
            $to = $email;
            $subject = "Change Password";
            $txt = "Here is your OTP ". $_SESSION['otp'];
            $headers = "From: generatesurvey.com" . "\r\n" .
            "CC: generatesurvey.com";
            
            mail($to,$subject,$txt,$headers);
			?>
			<div align="center" style="margin-top:100px;">
			OPT is sent to your email address
				<form action="forgetpassword_php.php" method="POST">
			<div align="center">
				<input type="text" placeholder="New Password" name="new_password">
				<input type="text" placeholder="OTP" name="otp">
				<input type="hidden" name="user" value="<?php echo $_GET['user'];?>">
				<button type="submit" name="verify_otp" class="btn btn-outline-primary" >Change</button>
			</div>
			</form>
			</div>
			<?php
		}
	}
	elseif(isset($_GET['otp']))
	{
		if($_GET['otp']=='fail')
		{
			?>
			<div align="center" style="margin-top:100px;">
				OTP dosent match
				<a href="forgetpassword.php" style="text-decoration:none;"><button type="submit" name="check_account" class="btn btn-outline-primary">Try Again</button></a>
			</div>
			<?php
		}
		elseif($_GET['otp']=='timeout')
		{
			?>
			<div align="center" style="margin-top:100px;">
				Time Out
				<a href="forgetpassword.php" style="text-decoration:none;"><button type="submit" name="check_account" class="btn btn-outline-primary">Try Again</button></a>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div align="center" style="margin-top:100px;">
			<form action="forgetpassword_php.php" method="POST">
			<div align="center">
				<input type="text" placeholder="Email" name="email">
				<input type="text" placeholder="Phone number" name="pno">
				<button type="submit" name="check_account" class="btn btn-outline-primary" >Check Account</button>
			</div>
			</form>
			</div>
		<?php
	}

?>

	
	
</body>
</html>