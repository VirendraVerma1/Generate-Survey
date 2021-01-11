<!DOCTYPE html>
<html>
<head>
	<title>Search Survey/people</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fixed.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

   <style type="text/css">
   @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,700');
 body{
	overflow-x: hidden;
	font-family: 'Playfair Display', serif;
	color: #505962;
}
.fixed{
   		background-image: url('img/nature.jpg');
   		z-index: -1;
   	}
    .dark{
    	background-color: rgba(0,0,0,0.56);
    }

   /*-----------------First Checkbox--------------------*/
    /* The container */
.firstcheck {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  user-select: none;
}

 /*Hide the browser's default checkbox */
.firstcheck input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  margin-top: 5px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.firstcheck:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.firstcheck input:checked ~ .checkmark {
  background-color: darkgreen;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.firstcheck input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.firstcheck .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  transform: rotate(45deg);
}
.myfle{
  background-color: yellowgreen;
}

   /*------------------First checkbox end  -------------------*/

.matter{
      position: absolute;
        padding: 10px 0px 0px 40px;

    }
      
      @media screen and (max-width: 576px){
         .matter{
          padding: 10px 0px 0px 40px;
         }
             .matter h1{
              font-size: 22px;
             }
             .matter .btn-group{
              width: 10px;
              height: 30px;
              margin-left: 5px;
             }
             .matter .btn-group .btn-primary{
              font-size: 11px;
             }
        }


footer{
    background-color: #696969;
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
    		<li class="nav-item">
    			<a class="nav-link" href="#">About me</a>
    		</li>
    	</ul>
<!--------------Search Box Start------->	
  <form class="form-inline">
    <input class=" mr-sm-4" type="search" placeholder="search survey,profile" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit" style="font-weight: 500;">Search</button>
  </form>
<!------------------Search Box End------->
    <button type="button" class="btn btn-outline-primary">Logout</button>
   </div>
</nav>
<!-----End Of Navigation----->

<!-------Create Survey Box Start----------->
 <div class="fixed-background">
	<div class="row dark text-center">

	   <div class="col-12">

      <div class="d-flex bg-highlight">
          <div class="p-2 mr-auto">
            <h4 class="display-6" style="color: white;">HCL Company</h4>
          </div>
          <div class="p-2">
            <h6 class="display-6" style="color: white;margin-top:7px;">18-01-2019</h6>
          </div>
          <div class="p-2">
            <h6 class="display-6" style="color: white;margin-top:7px;">Day:12</h6>
          </div>    
      </div>
        
      <form>
        <input type="text" name="link" class="form-control">
        <h6 align="center" style="color:white;">Here your Sharable link</h6>
      </form>

   </div>

    <div class="fixed-wrap">
		<div class="fixed">
			
		</div>
	</div>

 </div>
</div>
<!-------Create Survey Box End----------->

<div class="container-fluid padding">
  <div class="row text-center padding">

<!--------LEFT CARD START HERE---------------------------->
    <div class="col-xs-12 col-sm-12 col-md-8">
      <div class="cards" style="border: 1px solid black;">
        <div class="card-body">
          

        <h5 class="display-6 text-center" style="color:black;">Features For Candidates</h5>
<!-------------------ENABLE RESULT START---------------------------->
          <div class="d-flex myfle"> 
            <div class="p-2 mr-auto">
              <label class="firstcheck" style="margin-top: 10px;color:black;">Enable Comments
                <input type="checkbox" name="link">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
<!-------------------ENABLE RESULT END---------------------------->


<!-------------------ENABLE RATE START---------------------------->
          <div class="d-flex myfle"> 
            <div class="p-2 mr-auto">
              <label class="firstcheck" style="margin-top: 10px;color:black;">Enable Rate
                <input type="checkbox" name="link">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
<!-------------------ENABLE RATE END---------------------------->          

<!-------------------ENABLE PUBLIC  START---------------------------->
          <div class="d-flex myfle"> 
            <div class="p-2 mr-auto">
              <label class="firstcheck" style="margin-top: 10px;color:black;">Enable Public
                <input type="checkbox" name="link">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
<!-------------------ENABLE PUBLIC  END---------------------------->


<!-------------------ENABLE RESULT PAGE START---------------------------->
          <div class="d-flex myfle"> 
            <div class="p-2 mr-auto">
<!-------------------MAIN---------------------------->
              <form class="form-inline">
              <label class="firstcheck mr-sm-2" style="margin-top: 10px;color:black;">Enable Result Page
                <input type="checkbox" name="link">
                <span class="checkmark"></span>
              </label>
              <input type="text" name="Date" style="margin-top: 10px;">
            </form>
<!-------------------ENABLE RESULT PAGE END---------------------------->
            </div>
          </div>
 

        </div>
      </div>
    </div>
<!--------LEFT CARD END HERE---------------------------->   


<!--------RIGHT CARD START HERE---------------------------->
<div class="col-xs-12 col-sm-12 col-md-4">
  <div class="cards" style="border:1px solid black;">
    <div class="card-body">
      
        <h4 class="display-6" style="color:black;">
          Activate</h4><br>
       <div class="d-flex justify-content-center myfle"> 
            <div class="p-2 ">
              <button class="btn btn-secondary">Activate</button>
            </div>

            <div class="p-2 ">
               <button class="btn btn-secondary">Deactivate</button>
            </div>

       </div>

    </div>
  </div>
</div> 
<!--------RIGHT CARD END HERE---------------------------->

  </div>
</div>


<!----------------------FIRST CHART START------------------>
<div class="container-fluid padding">
 <div class="row text-center padding">
  <div class="col-12">
    <form class="form-inline matter">
      <h1 class="display-6 mr-sm-2">1.</h1>
      <h1 class="display-6 mr-sm-2">Food Quality</h1>

        <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Doughnut chart</button>

             <div class="dropdown-menu">
               <a class="dropdown-item" href="#">Polar area chart</a>
               <a class="dropdown-item" href="#">Pie chart</a>
             </div>
        </div>

    </form><br><br><br>

          
          <canvas id="pie-chart" min-width= "420px" height="150px"></canvas>

          <script>
            new Chart(document.getElementById("pie-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {}
});
          </script>

</div>
 </div>
</div>
<!----------------------FIRST CHART END------------------>




<!----------------------SECOND CHART START------------------>
<div class="container-fluid padding">
 <div class="row text-center padding">
  <div class="col-12">
    <form class="form-inline matter">
      <h1 class="display-6 mr-sm-2">1.</h1>
      <h1 class="display-6 mr-sm-2">Food Quality</h1>

        <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Doughnut chart</button>

             <div class="dropdown-menu">
               <a class="dropdown-item" href="#">Polar area chart</a>
               <a class="dropdown-item" href="#">Pie chart</a>
             </div>
        </div>

    </form><br><br><br>

          
          <canvas id="c12-chart" min-width= "420px" height="150px"></canvas>

          <script>
            new Chart(document.getElementById("c12-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {}
});
          </script>
          
</div>
 </div>
</div>
<!----------------------SECOND CHART END------------------>



<!---------COMMENT SECTION START--------------------------->

<div class="container-fluid padding">
  <div class="row text-center padding">
    <div class="col-12">
      
         <h4 class="display-4" style="color:black;">Comments</h4>
<!---------------MAIN------------------------------------------->
        <div class="container mt-3">
         <div class="media border p-2">
            <img src="img/profile.png" class="mr-3 align-self-start" style="width:60px">
          <div class="media-body">
             <h4 style="color:tomato;" align="left">Swaraj Chaturvedi<small><i>Posted on January 19, 2019</i></small></h4>
             <p style="color:black;" align="left">asasfhedghefjdjigohdfjodfjoegjswfsd</p>
          </div>
          
         </div>
        </div>
<!---------------MAIN------------------------------------------->
        

    </div>
  </div>
</div>

<!---------COMMENT SECTION END--------------------------->

<!------Foooter Start-------->
 
 <footer>
    <div  id="contact" class="container-fluid padding">
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
<!------Foooter End-------->

</body>

</html>