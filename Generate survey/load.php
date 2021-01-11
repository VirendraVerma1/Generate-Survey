<?php
ob_start();
session_start();

if(isset($_GET['t']))
{
    $_SESSION['comment_column_table']=$_GET['t'];
	$_SESSION['comment_column']=$_GET['c'];
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Comments</title>
        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
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
                    </style>
        
    </head>
    <body>
        
        <div class="container-fluid padding">
                      <div class="row text-center padding">
                        <div class="col-12">
                          <h4 class="display-4" style="color:black;"><?php if(isset($_GET['ques']))echo $_GET['ques'];?></h4>
                             <h4 class="display-4" style="color:black;">Comments</h4>
                    <!---------------MAIN------------------------------------------->
                               
                            
                    <!---------------MAIN------------------------------------------->
                            
                    
                        </div>
                      </div>
                    </div>
                 <div class="container">
   
   <br />
   <div id="load_data"></div>
   
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
    </body>
</html>

<script>

$(document).ready(function(){
 
 var limit = 50;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch_result_comments.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>