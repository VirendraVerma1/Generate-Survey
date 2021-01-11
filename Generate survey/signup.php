<?php
$message="";

if(isset($_GET['account']))
  {
      if($_GET['account']=='exist')
         {
           $message="!Account Exist";
         }
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

	<title>Sign Up</title>
    <meta charset="utf-8">
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
  #button2{
      width: 100%;
      margin: 5px 0 25px;
    }
    #button2{
      font-size: 20px;
      padding: 7px 14px;
      border-radius: 0px;
      opacity: 0.8;
    }
  .btn-primary-outline-light{
  	background-color:white;
  	margin-bottom: 35px;
  }
   .form-group{
      margin-bottom: 35px;
    }
    .form-group input{
      height: 42px;
      border-radius: 5px;
      font-size: 18px;
    }
    #button1{
      width: 100%;
      margin: 5px 0 25px;
    }
    #button1{
      font-size: 19px;
      padding: 7px 14px;
      border-radius: 5px;
      box-shadow:cyan;
      border-bottom: 4px solid cyan;
    }
    #button1:hover,#button1:focus{
      background-color: cyan!important;
      border-bottom: 4px solid cyan!important;
    }
    .forgot{
      padding: 5px 0 25px;
    }
    .forgot a{
      color: grey;
    }
    h5{
      font-size: 1rem;
    }
 /*footer{
  	background-color:	#696969;
  }*/

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
    			<a class="nav-link" href="homepage.php">Contact</a>
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
                  	<a class="btn1"  href="login.php">
		                <button type="button" class="btn btn-primary-outline-light btn-lg">Login
                    </button>
	                </a> 
	                <a href="#" class="btn2">
                    <button type="button" class="btn btn-primary-outline-light btn-lg">Sign up</button>
	                </a>
	              </div>  
                 <!--------Place  where login and sign up are shown(End)--->
                    
    <!------------------------Form Start---------->
                    <div>
             <form class="col-12" action="signup_php.php"  method="POST">

    <!------Sign up button--------->
              <!-- <fb:login-button type="submit" id="button2" class="btn-primary" name="submit_login">
                   <i class="fab fa-facebook" style="font-size:25px; margin-right:7px;" scope="public_profile,email" onlogin="checkLoginState();"></i>Login with facebook
               </fb:login-button>
               <div id="status">
               </div>
               <h5 class="text-center">OR</h5>-->
    <!--Sign up button end---->
               
               <div class="form-group">
                
                 <h5 class="display-6  text-left">First Name</h5>
                 <input type="text" class="form-control" name="fname" required>
               </div>

                <div class="form-group"> 
                 <h5 class="display-6 text-left">Last Name</h5>
                 <input type="text" class="form-control" name="lname" required>
                </div>

                <div class="form-group"> 
                 <h5 class="display-6 text-left">Email</h5>
                 <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group"> 
                 <h5 class="display-6 text-left">New Password</h5>
                 <input type="password" class="form-control" name="pass" required>
                </div>
                
                
                
                <div>
                    <h4 style="color:red;"><?php echo $message;?></h4>
                </div>
                
                <button type="submit" id="button1" name="submit_signup">
                  Signup</button>
             </form>
             <h5>By joining, you agree to our <a href="term_and_conditions.php">Terms of Service</a> and <a href="privacy_policy.php">Privacy Policy</a></h5>
           </div>
  <!---------------------Form End---------->  
              </div>	
            </div>  	
       	  </div>
       </div>		
	</div>
</div>
</div>
<!------Sign up End-------->

<!------Foooter Start-------->
 <!--------Footer------------>
 <!--<footer>
  	<div class="container-fluid padding">
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
  </footer>----->
<!------Foooter End-------->
<!----------------------------Javascipt  Code--------->
<script>
 
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
   
    if (response.status === 'connected') {
      
      testAPI();
    } else {
      
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : '{api-version}' // The Graph API version to use for the call
    });

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
<!----javascipt End------------------------------------>

</body>

</html>