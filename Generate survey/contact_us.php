<?php
$message="";
if(isset($_GET['email']))
{
	if($_GET['email']=='notfound')
		$message="Email Not Found.";
}
elseif(isset($_GET['pass']))
{
	if($_GET['pass']=='notmatch')
		$message="Password Not Match.";
}
elseif(isset($_GET['mail']))
{
	if($_GET['mail']=='send')
		$message="Mail Send";
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

	<title>Contact Us</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/fixed.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400' rel='stylesheet' type='text/css'>
  <style type="text/css">
  .navbar{
	text-transform: uppercase;
	font-weight: 700;
	font-size: .9rem;
	letter-spacing: .1rem;

	background-color:#191970;
}
.navbar-nav li{
	padding-right: .7rem;
}
.navbar-dark .navbar-nav .nav-link{
	color: white;
	padding-top: .8rem;
}
.navbar-dark .navbar-nav .nav-link:hover{
        color: yellowgreen;
}



  	.home-inner{
    background-color: #191970;
}
.caption{
  width: 100%;
  max-width: 100%;
  position: absolute;
  top: 38%;
  z-index: 1;
  color: white;
  text-transform: uppercase;
}
.caption h1{
	font-weight: 700;
	font-size: 3.8rem;
	text-shadow: .1rem .1rem .8rem black;
	padding-bottom: 1rem;
}
.caption h4{
	font-weight: 700;
	font-size: 1.8rem;
	text-shadow: .1rem .1rem .8rem black;
	padding-bottom: 1rem;
}
.caption h6{
	font-weight: 600;
	font-size: 1.3rem;
	text-shadow: .1rem .1rem .8rem black;
	padding-bottom: 1rem;
}
input::placeholder{
    font-family: Times New Roman; 
    color: #191970;
}
textarea {
  height:auto;
  max-width:600px;
  color:#999;
  font-weight:400;
  font-size:30px;
  font-family:'Ubuntu', Helvetica, Arial, sans-serif;
  width:100%;
  background:#fff;
  border-radius:3px;
  line-height:2em;
  border:none;
  box-shadow:0px 0px 5px 1px rgba(0,0,0,0.5);
  padding:30px;
transition: height 2s ease;
}


  </style>


</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
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
    			<a class="nav-link" href="homepage.php">Features</a>
    		</li>
    		
    	</ul>
    </div>
</nav>
<!---End Of Navigation--->

<!-----Start Landing page Section------>
<div class="landing">
	<div class="home-wrap">
		<div class="home-inner">
			
		</div>
	</div>
</div>

<div class="caption text-center">
	<h1 class="display-4">CONTACT US</h1>
	<h4 class="display-6">GENERATE SURVEY</h4>
	<h6 class="display-6">Sector-6 Vikas Nagar,</h6>
	<h6 class="display-6">Lucknow,Uttar Pradesh,India</h6>
</div>
<!-----Start Landing page Section------>

<div class="container-fluid">
	<div class="row text-center padding">

        <div class="col-xs-12 col-sm-12 col-md-6">
        	<div class="cards" style="border:0px solid black;">
        		<div class="card-body">
        			

                    <div class="d-flex justify-content-center mt-3">
                    	<div>
                    		<h5>Contact Us:</h5>
                    	</div>
                    </div>  

                    <div class="d-flex justify-content-center mt-3">
                    	<div>
                    		<h5 >survey555559@gmail.com</h5>
                    	</div>
                    </div>  

        		</div>
        	</div>
        </div>  

		
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="cards" align="center" style="border: 0px solid black;">
				<div class="card-body">
					<form action="contact_us_php.php" method="POST">
                     <h4 class="display-6" style="font-weight:700;">
                     	Leave Message:
                     </h4>

                        <input type="text" class="form-control mt-4"  name="email" placeholder="Your Email Address"><br>
                     	

                     	<input type="password" class="form-control" name="pass" placeholder="Your Password"><br>                      
						<h4 style="color:red;"><?php echo $message;?></h4>
                        <textarea id="TextArea" ng-model="loremIpsum" ng-keyup="autoExpand($event)" name="message" style="margin-top:10px;" placeholder="Your Message...."></textarea>
                        
                  <button class="btn btn-outline-success" name="submit_comment">
                     Submit<i class="fas fa-step-forward"></i></button>
					 </form>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	var app = angular.module('myApp', []);

app.controller('AppCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
  
  // Load the data
  $http.get('http://www.corsproxy.com/loripsum.net/api/plaintext').then(function (res) {
		$scope.loremIpsum = res.data;
    $timeout(expand, 0);
  });
  
  $scope.autoExpand = function(e) {
        var element = typeof e === 'object' ? e.target : document.getElementById(e);
    		var scrollHeight = element.scrollHeight -60; // replace 60 by the sum of padding-top and padding-bottom
        element.style.height =  scrollHeight + "px";    
    };
  
  function expand() {
    $scope.autoExpand('TextArea');
  }
}]);
</script>

</body>
</html>