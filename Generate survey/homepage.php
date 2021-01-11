<?php
ob_start();
session_start();
$_SESSION['index_content']=0;//take content number 
$_SESSION['page_no']=1;
$_SESSION['content_id']=0;//get from where onwards it start
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

	<title>Generate Survey</title>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/icon.png">
  <meta name="google018385a02a7c0a43.html" content="qAY-tM3AMsk98i3qmxbHh7ckvR7TY-a9E6ACtzM6zrs" />
  <meta name="keywords" content="Create Survey, Generate Survey, Survey Builder, Free survey, Current Survey, Ongoing Survey, Survey Result, Easy Survey Creator, Survey, Survey form, Form, Survey Design, Survey India, Global Survey, Best Survey, Survey Report,">
  <meta name="description" content="Create your survey free of cost, with the best otimization. Its a completely user friendly to design your survey with a best result sytsem..">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/fixed.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<?php
          //---------------------------
       if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
             $screen_width= $_SESSION['screen_width'];
        } else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
            $_SESSION['screen_width'] = $_REQUEST['width'];
            $_SESSION['screen_height'] = $_REQUEST['height'];
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
           echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
           
        }
         ?>

  <style type="text/css">
  	@import url('https://fonts.googleapis.com/css?family=Lato:400,700');

body{
	overflow-x: hidden;
	font-family: 'Lato', sans-serif;
	color: #505962;
}
/*.offset:before{
	display: block;
	content: "";
	height: 4rem;
}*/
/*-----Navigation----*/
.navbar{
	text-transform: uppercase;
	font-weight: 700;
	font-size: .9rem;
	letter-spacing: .1rem;
	background:rgba(0,0,0,0.3)!important;
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
/*------Landing page----*/
.home-inner{
    background-image: url(img/white-man-using-apple-macbook-laptop-and_iphone7-and_drink-starbuck-coffee.jpg);
}
.caption{
  width: 100%;
  max-width: 100%;
  position: absolute;
  top: 38%;
  z-index: 1;
  color: black;
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
	padding-bottom: 1rem;
}
.caption .btn1{
	border-width: medium;
	border-radius: 0px;
	padding-right: 20px;
}
.caption .btn2{
	border-width: medium;
	border-radius: 0px;
	padding-right: 20px;
}
.jumbotron{
	margin-bottom: 0px;
	padding: 2rem 0 3.5rem;
	border-radius: 0;
}
h3.heading{
 font-weight: 700;
 text-transform: uppercase;
}
.heading-underline{
  width: 3rem;
  height: .2rem;
  background-color: cyan;
  margin: 0 auto;
}

 footer{
  	background-color:	black;
  }
  
  .hv{
      
      background:white;
  }

  </style>

</head>

<body class="scroll" data-target="#navResponsive">

<!--------Strat Home Section----->
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
    			<a class="nav-link" href="#Home">Home</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="#Features ">Features</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="#Contact">Contact</a>
    		</li>
    	</ul>
    </div>
</nav>
<!---End Of Navigation--->

<!-----Start Landing page Section------>
<div class="landing">
	<div class="home-wrap">
		<div class="home-inner" role="img" aria-label="white-man-using-apple-macbook-laptop-and_iphone7-and_drink-starbuck-coffee">
			
		</div>
	</div>
</div>

<div class="caption text-center">
	<h3 class="display-4" style="color:white;size:5px;">Generate Survey, The best you can get!!</h3>
	<h4 class="display-6" style="color:white;">Create your own Survey</h4>
	<a class="btn1"  href="login.php">
		<button class="btn btn-primary btn-lg">Login
		</button>
	</a>
	<a href="signup.php" class="btn2">
		<button type="button" class="btn btn-primary btn-lg">Sign up</button>
	</a>
</div>
<!-----Start Landing page Section------>

</div>
<!--------End Home Section----->

<!--------Strat Features Section----->
<div id="Features" class="offset">

<!----Start Of Jumbotron----->
<div class="jumbotron">	
 <div class="narrow">
	
    <div class="col-12 text-center padding">
    	<h3 class="heading" class="display-6">Features</h3>
    	<div class="heading-underline"></div>
    </div>
    
    <div class="row text-center">
    	<div class="col-md-6">
    		<div class="feature">
    			<a href="ongoingsurvey.php"><img src="img/currentsurvey.jpg"></a>
    			<h3 class="display-6">Current Survey</h3>
    		</div> 
    	</div>

    	<div class="col-md-6">
    		<div class="feature">
    			<a href="surveyresult.php"><img src="img/result.png"></a>
    			<h3 class="display-6">Survey Results</h3>
    		</div> 
    	</div>

    	<!--<div class="col-md-4">
    		<div class="feature">
    			<img src="img/peoples.jpg">
    			<h3 class="display-6">People Opinions</h3>
    		</div> 
    	</div>-->
    </div><!-------End of row-------->

 </div><!-----End of Narrow--->
</div>
<!----End Of Jumbotron--->
	
</div>
<!--------End Features Section----->

<!--------Start Connect Section----->
<div id="Contact" class="offset">
	<!-------connect Section--------->
  <div class="container-fluid padding">
  	<div class="row text-center padding">
  		<div class="col-12">
  			<h3 class="heading" class="display-6">Connect</h3>
  			<div class="heading-underline"></div>
  		</div>
  		<div class="col-12 social padding">
  			<a href="https://www.facebook.com/Survey-2143891599009887/?modal=admin_todo_tour"><li class="fab fa-facebook" style="font-size:50px;color:#3b5998;padding:30px;"></li></a>
  			<a href="https://twitter.com/GenerateSurvey"><li class="fab fa-twitter" style="font-size:50px;color:#38A1F3;padding:30px;"></li></a>
  			<a href="https://plus.google.com/u/0/115048219716680303958"><li class="fab fa-google-plus-g" style="font-size:50px;color:#DD4B39;padding:30px;"></li></a>
  			<a href="https://www.instagram.com/generate_survey/"><li class="fab fa-instagram" style="font-size:50px;color: #c32aa3;padding:30px;"></li></a>
  		</div>
  	</div>
  </div>


<!--------Footer------------>
 <?php include("page_data.php"); footer_content();?>



</div>
<!--------End Connect Section----->
  
</body>

</html>
