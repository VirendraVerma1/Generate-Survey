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
        	<a class="navbar-brand" href="#"><h4 class="display-6">Company Name</h4></a>
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
        ?>
                                        <a href="follow.php?button=pyf" >  <button type="submit" class="btn btn-primary btn-md" ><h4>Following</h4>
                                                   		</button></a>
                                        <div class="text-center">
                            	<h5 class="display-6">Followers</h5>
                            </div>
        
            
            <!--------------Repetition Start----------------------------------------->
        <?php
            $table_name="userid_".$_SESSION['user_id']."_friend_list";
            $sql="SELECT * FROM $table_name";
            $run=mysqli_query($con,$sql);
            if($run)
            {
                while($data=mysqli_fetch_assoc($run))
                {
                    if($data['State']=='follower')
                    {
                    $friend_id=$data['FriendName'];
                    $sql="SELECT * FROM users WHERE ID='$friend_id'";
                    $run1=mysqli_query($con,$sql);
                    if($run1)
                    {
                        $data1=mysqli_fetch_assoc($run1);
                        
                        ?>
                                                <!------------------Image And Name Start ---------------------->
                                                <div class="d-flex justify-content-between my-flex2 mb-4">
                                                   <div class="p-2 my-flex2">
                                                   	<form class="form-inline">
                                                     <img src="dataimg/<?php if($data1['ProfilePic'])echo $data1['ProfilePic'];else echo "people.png";?>" width="70px" height="70px">
                                                     <a href="" style="text-decoration: none;"><h5 style="color: black;" ><?php echo $data1['Username']." ".$data1['Lastname'];?>
                                                     </h5></a>
                                                 </form>
                                                   </div>
                                <!------------------Image And Name End ---------------------->
                            
                              <!------------------Notificatin Button Start ---------------------
                                                  <div class="p-2 my-flex2">
                                                  	<a href=""><i class="fas fa-bell" style="margin-top:16px;
                                                  font-size: 30px;color: black;"></i></a></div>
                              ------------------Notificatin Button End ---------------------->
                            
                                <!------------------TWO Button End ---------------------->
                                                   <div class="p-2 my-flex2">
                                                   	<div class="form-inline" style="margin-top:8px;" action="aboutme_php.php" method="POST">
                                                   		<a href="aboutme.php?user=<?php echo $friend_id;?>"><button type="submit" class="btn btn-light mr-sm-2 btn-md">
                                                   			<h5>View Page</h5>
                                                   		</button></a>
                                                   		
                                                   	</div>
                                                   </div>
                                <!------------------TWO Button End ---------------------->                   
                                                </div>
                            
                                <!--------------Repetition END----------------------------------------->  
                        <?php
                    }
                    }
                }//end of while loop
            }
    }//end of button followers
    elseif($_GET['button']=='pyf')
    {
        ?>
                                     
                            	<a href="follow.php?button=followers" >  <button type="submit" class="btn btn-primary btn-md" ><h4>Followers</h4>
                                                   		</button></a>
                                                   		
                                        <div class="text-center">
                                         
                            	<h4 class="display-6">Following</h4>
                            </div>
        
            <!--------------Repetition Start----------------------------------------->
        <?php
            $table_name="userid_".$_SESSION['user_id']."_friend_list";
            $sql="SELECT * FROM $table_name";
            $run=mysqli_query($con,$sql);
            if($run)
            {
                while($data=mysqli_fetch_assoc($run))
                {
                    if($data['State']=='following')
                    {
                    $friend_id=$data['FriendName'];
                    $nort=0;
                    //getting nortification
                    $nortification_table="userid_".$_SESSION['user_id']."_nortification";
                    $sql="SELECT * FROM $nortification_table";
                    $run2=mysqli_query($con,$sql);
                    if($run2)
                    {
                        while($data2=mysqli_fetch_assoc($run2))
                        {
                            if($data2['FriendName']==$friend_id&&$data2['Status']=='not seen')
                            $nort++;
                        }
                    }
                    
                    $sql="SELECT * FROM users WHERE ID='$friend_id'";
                    $run1=mysqli_query($con,$sql);
                    if($run1)
                    {
                        $data1=mysqli_fetch_assoc($run1);
                        $nort_link="nortification.php?user=".$data1['ID'];
                        ?>
                                                <!------------------Image And Name Start ---------------------->
                                                <div class="d-flex justify-content-between my-flex2 mb-4">
                                                   <div class="p-2 my-flex2">
                                                   	<form class="form-inline">
                                                     <img src="dataimg/<?php if($data1['ProfilePic'])echo $data1['ProfilePic'];else echo "people.png";?>" width="70px" height="70px">
                                                     <a href="" style="text-decoration: none;"><h5 style="color: black;" ><?php echo $data1['Username']." ".$data1['Lastname'];?>
                                                     </h5></a>
                                                 </form>
                                                   </div>
                                <!------------------Image And Name End ---------------------->
                            
                              <!------------------Notificatin Button Start ---------------------->
                                                  <div class="p-2 my-flex2">
                                                  	<a href="<?php echo $nort_link;?>"><i class="fas fa-bell" style="margin-top:16px;
                                                  font-size: 30px;color:<?php if($nort)echo "red";else echo "black";?>"><?php if($nort) echo $nort;else echo " ";?></i></a></div>
                              <!------------------Notificatin Button End ---------------------->
                            
                                <!------------------TWO Button End ---------------------->
                                                   <div class="p-2 my-flex2">
                                                   	<div class="form-inline" style="margin-top:8px;" action="aboutme_php.php" method="POST">
                                                   		<a href="aboutme.php?user=<?php echo $friend_id;?>"><button type="submit" class="btn btn-light mr-sm-2 btn-md">
                                                   			<h5>View Page</h5>
                                                   		</button></a>
                                                   		<a href="aboutme_php.php?unfollow=<?php echo $friend_id;?>"><button type="submit" class="btn btn-danger btn-md">
                                                   			<h5>Unfollow</h5>
                                                   		</button></a>
                                                   	</div>
                                                   </div>
                                <!------------------TWO Button End ---------------------->                   
                                                </div>
                            
                                <!--------------Repetition END----------------------------------------->  
                        <?php
                    }
                    }
                }//end of while loop
            }
       
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