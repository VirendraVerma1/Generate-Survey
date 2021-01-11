<?php
session_start();
 $message="";
    if(isset($_GET['password']))
    {
        if($_GET['password']=="wrongpassword")
        {
            $message="! Wrong Password";
        }
    }
    if(isset($_GET['email']))
    {
        if($_GET['email']=="notfound")
        {
            $message="! Email not found";
        }
    }
   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fixed.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <style type="text/css">
  	@import url('https://fonts.googleapis.com/css?family=Lato:400,700');

body{
	overflow-x: hidden;
	font-family: 'Lato', sans-serif;
	color: #505962;
}

.navbar{
	text-transform: uppercase;
	font-weight: 700;
	font-size: .9rem;
	letter-spacing: .1rem;
	background:rgba(0,0,0,0.6)!important;
}

.navbar-nav li{
	padding-right: .7rem;
}
.navbar-dark .navbar-nav .nav-link{
	color: white;
	padding-top: .8rem;
}
.navbar-dark .navbar-nav .nav-link:hover{
        color: cyan;
}
.responsive{
  height: 200px;
  width: 200px;
  color: cyan;
  
}
/*.heading-underline{
  width: 3rem;
  height: .2rem;
  background-color: cyan;
  margin: 0 auto;
}*/
.main-section{
      margin-top: 150px;
      position:relative;
      padding-bottom: 40px;
    }
    .modal-content{
      padding: 0,18;
      box-shadow: 1px 1px 6px cyan;
  }
  .btn-primary-outline-light{
  	background-color:white;
  	margin-bottom: 45px;
  }
   .form-group{
      margin-bottom: 35px;
    }
    .form-group input{
      height: 42px;
      border-radius: 5px;
      font-size: 18px;
    }
    #button2{
      width: 100%;
      margin: 5px 0 25px;
    }
    #button2{
      font-size: 19px;
      padding: 7px 14px;
      border-radius: 5px;
      box-shadow:cyan;
      border-bottom: 4px solid cyan;
    }
    #button2:hover,#button2:focus{
      background-color: cyan!important;
      border-bottom: 4px solid cyan!important;
    }
    .svg-inline--fa{
      font-size: 20px;
      margin-right: 7px;
    }
    .forgot{
      padding: 5px 0 25px;
    }
    .forgot a{
      color: grey;
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
    <div id="Home">
	
<!---Navigation--->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
	<a class="navbar-brand" href="#"><h5 class="display-6"><img src="img/icon.png" width="50" height="50">Generate Survey</h5></a>
    <button class="navbar-toggler" type="button" data-target="#navResponsive" data-toggle="collapse">
    	<span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navResponsive">
    	<ul class="navbar-nav ml-auto">
    		<li class="nav-item">
    			<a class="nav-link" href="homepage.php">Home</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="homepage.php">Features</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="contact_us.php">Contact</a>
    		</li>
    	</ul>
    </div>
</nav>
<!-----End Of Navigation----->

<!------Sign Up Form---------->
<div class="container-fluid padding">
	<div class="row text-center padding">
       <div class="col-12">
       	  <div class="modal-dialog text-center">
       	  	<div class="main-section">
              <div class="modal-content">
                 
                 <!--------Place  where login and sign up are shown(start)--->
                 <div>
                  	<a class="btn1"  href="#">
		            <button class="btn btn-primary-outline-light btn-lg">Login
		            </button>
	                </a> 
	                <a href="signup.php" class="btn2">
                    <button type="button" class="btn btn-primary-outline-light btn-lg">Sign up</button>
	                </a>
	              </div>  
                 <!--------Place  where login and sign up are shown(End)--->
                    
                 <!------Form Start---------->
                    <div>
             <form class="col-12" action="loginphp.php" method="POST">

               <div class="form-group">
               	 <h5 class="display-6  text-left" style="color:black; font-weight: 400;">Email</h5>
                 <input type="text" class="form-control" name="email_login" required>
               </div>

               <div class="form-group">
               	 <h5 class="display-6  text-left" style="color:black; font-weight: 400;">Password</h5>
                 <input type="password" class="form-control"  name="password_login" required>
               </div>
               
               <div>
                   <h4 style="color:red;"><?php echo $message;?></h4>
               </div>
               
        <!----------Login Button--------->

               <button type="submit" id="button2" name="submit_login">
                   <i class="fas fa-sign-in-alt" style="margin-right:7px;"></i>Login
               </button>
              
             </form>
             <div class="col-12 forgot">
               <a href="forgetpassword.php">Forgotten Password?</a>
             </div>
           </div>
                 <!------Form End---------->  
              </div>	
            </div>  	
       	  </div>
       </div>		
	</div>
</div>
<!------Sign up End-------->

<!------Foooter Start-------->
 <!--------Footer------------>
<?php include("page_data.php"); footer_content();?>
<!------Foooter End-------->
</div>
</body>

</html>

