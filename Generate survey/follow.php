<?php
ob_start();
session_start();
include("db_con.php");

if(isset($_GET['button']))
{
    ?>
        <!DOCTYPE html>
        <html>
        <head>
        	<title>Follow</title>
            <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" href="img/icon.png">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="css/fixed.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="font/fontawesome-free-5.6.3-web/css/all.css">
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">

          <style type="text/css">
          	@import url('https://fonts.googleapis.com/css?family=Lato:400,700');
        
        body{
        	overflow-x: hidden;
        	font-family: 'Lato', sans-serif;
        	color: #505962;
        }
        .my-flex2{
        	background-color: #00bfff;
        }
        .btn-md{
        	margin-bottom: 10px;
        }
        
        
        </style>
        
        </head>
        
        <body>
         
        <!---Navigation--->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
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
            			<a class="nav-link" href="profile.php">My Survey</a>
            		</li>
            		<li class="nav-item">
            			<a class="nav-link" href="aboutme.php">About me</a>
            		</li>
            	</ul>
            </div>
        </nav>
        <!-----End Of Navigation----->
         
		 
		 
        <div class="container-fluid padding">
        	<div class="row text-center padding">
        		<div class="col-12">
        	
                     <div class="cards" style="width:100%;border: 0px solid black;">
                     	<div class="card-body">
    
    <?php
    if($_GET['button']=='followers')
    {
		/*
		
		<div class="d-flex justify-content-center">
                             <a href="follow.php?button=pyf" >  <button type="submit" class="btn btn-primary btn-md" ><h4>Following</h4>
                                                   		</button></a>
                                        
                            	<h5 class="display-6">Followers</h5>
                            
							</div>
		*/
        ?>
							<div class="d-flex justify-content-center mb-3">
							
								<div class="p-2">
								<a href="follow.php?button=pyf" >  <button type="submit" class="btn btn-primary btn-md" ><h4>Following</h4>
                                                   		</button></a>
								</div>
								
								<div class="mt-2 p-2"><h3 class="display-6">Followers</h3>
								</div>
								
							  </div>
        
            
            <!--------------Repetition Start----------------------------------------->
        <?php
            $_SESSION['comment_column_table']="userid_".$_SESSION['user_id']."_friend_list";
			$_SESSION['search_type']='follower';
			
            ?>
					<div id="load_data"></div>
                               
					<br />
			<?php
			
    }//end of button followers
    elseif($_GET['button']=='pyf')
    {
        ?>
                                     
                            <div class="d-flex justify-content-center mb-3">
							    	<div class="mt-2 p-2"><h3 class="display-6">Following</h3>
								</div>
								<div class="p-2">
								<a href="follow.php?button=followers" >  <button type="submit" class="btn btn-primary btn-md" ><h4>Followers</h4>
                                                   		</button></a>
								</div>
								
							
								
							  </div>
        
            <!--------------Repetition Start----------------------------------------->
        <?php
            $_SESSION['comment_column_table']="userid_".$_SESSION['user_id']."_friend_list";
			$_SESSION['search_type']='pyf';
            ?>
				<div id="load_data"></div>
                               
					<br />
			<?php
       
    }
}
?>
               

             	</div>
             </div>

		</div>
	</div>
</div>
    
   

</body>

</html>

		<script>

$(document).ready(function(){
 
 var limit = 20;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch_follow_nort.php",
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