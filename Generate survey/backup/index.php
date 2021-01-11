<?php
    include("home_php.php");
?>
<html>
    <head>
        <title>surveycreater</title>
        <link rel="shortcut icon" type="image/png" href="sssss.png">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    
        <style type="text/css">

        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        html, body{
  	height: 100%;
  	width:100%;
  	font-family: 'poppins',sans-serif;
  	color: #222;
  }
  .navbar {
  min-height: 50px;
}
 .navbar-brand{
 	padding: 0px;
 	margin: 0px;
 }
  .margin-left{
  	   margin-left: 15px
  }
    /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  .carousel-caption{
      position: absolute;
      top: 150px;
  }
  footer{
  	background-color:	#696969;
  }
    </style>
    
    <body>
        <!-------Navigation-------->
 <nav class="navbar navbar-expand-sm navbar-light bg-light stick-top">
  	<div class="container-fluid">
  		<a class="navbar-brand" href="#"><img src="res/surveyhoste.png"></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
  			<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarResponsive">
  	<ul class="navbar-nav ml-auto">
  		<a href="login.php"><button type="button" class="btn btn-outline-primary float-right margin-left btn-lg">
        LogIn</button></a><br>
  		<a href="signupp.html"><button type="button" class="btn btn-outline-primary float-right margin-left btn-lg">Sign Up</button></a>
  	</ul>	
  </div>
  </nav>
  <!--------Image Slider--------->
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="res/homeimage.jpg" alt="Los Angeles" width="1100" height="400">
      <div class="carousel-caption">
      	<h1 class="display-4" style="color: black; font-weight:700;">SMART SURVEY</h1>
        <h3 class="display-6" style="color: purple; font-weight:700;">create your own survey</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="res/homeimage2.jpg" alt="Chicago" width="1100" height="400">
    </div>
  </div>
</div>
  <!------------Three Section---------------->
  <div class="container-fluid padding">
  	<div class="row text-center padding">
  		<div class="col-xs-12 col-sm-6 col-md-4">
  			<h1 class="display-6">Result Ongoing</h1>
  		</div>
  		<div class="col-xs-12 col-sm-6 col-md-4">
  			<h1 class="display-6">Old Survey Result</h1>
  		</div>
  		<div class="col-sm-12 col-md-4">
  			<h1 class="display-6">People Oppinions</h1>
  		</div>
  	</div>
  	<hr class="my-4">
  </div>
  <!-------connect Section--------->
  <div class="container-fluid padding">
  	<div class="row text-center padding">
  		<div class="col-12">
  			<h2>Connect</h2>
  		</div>
  		<div class="col-12 social padding">
  			<a href="#"><li class="fab fa-facebook" style="font-size:50px;color:#3b5998;padding:20px;"></li></a>
  			<a href="#"><li class="fab fa-twitter" style="font-size:50px;color:#38A1F3;padding:20px;"></li></a>
  			<a href="#"><li class="fab fa-google-plus-g" style="font-size:50px;color:#DD4B39;padding:20px;"></li></a>
  			<a href="#"><li class="fab fa-instagram" style="font-size:50px;color: #c32aa3;padding:20px;"></li></a>
  		</div>
  	</div>
  </div>
  <!--------Footer------------>
  <footer>
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
  </footer>
    </body>
</html>