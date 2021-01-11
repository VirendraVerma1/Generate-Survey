<!DOCTYPE html>
<html>
<head>
	<title>About Me</title>
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
    			<a class="nav-link" href="homepage.html">Home</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="homepage.html">Features</a>
    		</li>
    		
    	</ul>
<!--------------Search Box Start------->	
  <form class="form-inline">
    <input class=" mr-sm-2" type="search" placeholder="search survey,profile" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit" style="font-weight: 500;">Search</button>
  </form>
<!------------------Search Box End------->
    <button type="button" class="btn btn-outline-primary">Logout</button>
   </div>
</nav>
<!-----End Of Navigation----->

<!------------------Image------And Information section--->
<div class="container-fluid">
	<div class="row text-center padding">
 <!----------PROFILE IMAGE START---------------------->
		<div class="col-xs-12 col-sm-12 col-md-4">
             <div class="cards" style="width: 300px;">
             	<label for="file-upload" class="custom-file-upload">
                <img class="card-img-top" src="img/profile.png" alt="Card image" style="width:100%">
                </label>
                <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">
            </div>
        </div>
<!----------PROFILE IMAGE END---------------------->

<!----------CONTACT//BASIC INFORMATION START---------------------->
		<div class="col-xs-12 col-sm-12 col-md-8">
             <div class="cards" style="border: 0px solid black;">
             	<div class="card-body">
                     <div class="d-flex flex-row-reverse bd-highlight">
             	     <div class="p-2 bd-highlight">	
             		 <button type="submit" class="btn btn-light justify-content-end" >
                      <i class="fas fa-bookmark"></i> Bookmark
                     </button>
                     </div> 
                     </div>     
                     <br>
             		 <form class="form-inline">
                     <h4 class="display-6" align="left">Swaraj Kumar</h4>
                     <sub><i class="fas fa-globe"></i> Lucknow,LKO</sub>
                     </form><br>
                     <h6 class="display-6" align="left" style="color:darkblue;">Front End Developer</h6><br>

                     <h6 class="display-6" align="left" style="color:darkblue;">Total Number Surveys:245</h6>
                     <br>
                     <hr class="my-2">
    <!----------CONTACT//BASIC INFORMATION START---------------------->                 
                     <div class="d-flex flex-row bd-highlight mb-3">

                          <div class="p-2 bd-highlight">

                            <a href="Aboutme.html"><button type="submit" class="btn btn-light">
                            <i class="fas fa-user"></i> About
                            </button></a>

                          </div>

                          <div class="p-2 bd-highlight">

                            <a href="Aboutme2.html"><button type="submit" class="btn btn-light">
                             <i class="fas fa-poll"></i> Survey
                             </button></a>
                             <div class="heading-underline"></div>
                          </div>
  
                     </div>
                      <hr class="my-2">
        <!---------------SURVEY NAMES HERE-------------------------->
                     
                     <div class="d-flex justify-content-between bg-danger mb-3">
                         <div class="p-3 bg-danger">
                             <h5 style ="color:black">HCL Company</h5>
                         </div>

                         <div class="p-3 bg-danger">
                             <h5 style ="color:black">23<i class="fas fa-users"></i></h5>
                         </div>
                     </div>
<!--------------SURVEY NAMES HERE------------------>

	</div>
</div>


</body>
</html>