<?php
session_start();
if(isset($_POST["limit"], $_POST["start"]))
{
 include("db_con.php");

 $table_name=$_SESSION['comment_column_table'];
 
 if(isset($_SESSION['search_type']))
 {
	 if($_SESSION['search_type']=='follower')
	 {
		  $count=0;
		 $sql="SELECT * FROM $table_name";
            $run=mysqli_query($con,$sql);
            if($run)
            {
                while($data=mysqli_fetch_assoc($run))
                {
                    if($data['State']=='follower')
                    {
						$friend_id=$data['FriendName'];
						$sql="SELECT * FROM users WHERE ID='$friend_id' ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
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
														 <a href="" style="text-decoration: none;"><h5 style="color: black;" ><?php echo $data1['Username'];?>
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
																<h5>View Profile</h5>
															</button></a>
															
														</div>
													   </div>
									<!------------------TWO Button End ---------------------->                   
													</div>
								
									<!--------------Repetition END----------------------------------------->  
							<?php
							
						}$count++;
                    }
                }//end of while loop
				$_SESSION['search_type']="none";
				
            }
            else
            {
                header("Location: login.php");
                ob_end_flush();
                exit();
            }
			if($count==0)
				{
					?>
						No Followers
					<?php
				}
	 }
	elseif($_SESSION['search_type']=='pyf')
	{ $count=0;
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
						
						$sql="SELECT * FROM users WHERE ID='$friend_id' ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
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
														 <a href="" style="text-decoration: none;"><h5 style="color: black;" ><?php echo $data1['Username'];?>
														 </h5></a>
													 </form>
													   </div>
									<!------------------Image And Name End ---------------------->
								
								  <!------------------Notificatin Button Start ---------------------->
													  <div class="d-flex justify-content-end">
													      
														</div>
								  <!------------------Notificatin Button End ---------------------->
								
									<!------------------TWO Button End ---------------------->
													   <div class="p-2 my-flex2">
													       
														<div class="form-inline" style="margin-top:8px;" action="aboutme_php.php" method="POST">
														    
														    <a href="<?php echo $nort_link;?>"><i class="fas fa-bell" style="margin-top:0px;margin-right:20px;
													  font-size: 30px;color:<?php if($nort)echo "red";else echo "black";?>"><?php if($nort) echo $nort;else echo " ";?></i></a>
													  
															<a href="aboutme.php?user=<?php echo $friend_id;?>"><button type="submit" class="btn btn-light mr-sm-2 btn-md">
																<h5>View Profile</h5>
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
							
						}$count++;
                    }
                }//end of while loop
				$_SESSION['search_type']="none";
				
            }
            else
            {
                header("Location: login.php");
                ob_end_flush();
                exit();
            }
			if($count==0)
				{
					?>
						No Following
					<?php
				}

	}
}
}

?>