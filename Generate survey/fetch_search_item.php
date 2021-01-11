<?php
session_start();
if(isset($_POST["limit"], $_POST["start"]))
{
 include("db_con.php");
 $count=0;
 $str=$_SESSION['comment_column_table'];
 
 if(isset($_SESSION['search_type']))
 {
	 if($_SESSION['search_type']=='survey')
	 {
		 $query = "SELECT * FROM All_Survey_Name WHERE Survey_Name LIKE '%$str%' ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
		 $result = mysqli_query($con, $query);
		 while($data = mysqli_fetch_array($result))
		 {
			 
				 
														$survey_name=$data['Survey_Name'];
														$user_id=$data['User_Id'];
														$survey_id=$data['Survey_Id'];
														$link="survey.php?surveyname=".$survey_name."&&user=".$user_id."&&survey=".$survey_id."&&page=1";
													
													  echo '
													  <div class="d-flex myself">
															
															<div class="p-2  myself">
																<h5 style="margin-top: 10px;">'.$survey_name.'</h5>
															</div>

															<div class="p-2 ml-auto myself">
																<a href="'.$link.'" style="text-decoration:none;"><button class="btn btn-outline-light">Take Survey</button></a>
															</div>
														</div><br>
		  
		  
		  
															';
			 
													
		}
		}

	else
	{
		$query = "SELECT * FROM users WHERE Email LIKE '%$str%' OR Username LIKE '%$str%' ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
		 $result = mysqli_query($con, $query);
		 while($data = mysqli_fetch_array($result))
		 {
			 
				 
											$user_id=$data['ID'];
											$link="aboutme.php?user=".$user_id;
													
													  ?>
													  <div class="d-flex  myself">
														<div class="p-2  myself">
															<img src="dataimg/<?php if($data['ProfilePic'])echo $data['ProfilePic'];else echo "people.png";?>" style="width:50px;height:50px;">
														</div>

														<div class=" p-2  myself">
															<h5 style="margin-top: 10px;"><?php echo " ".$data['Username'];?></h5>
														</div>

														<div class="p-2 ml-auto myself">
															<a href="<?php echo $link;?>" style="text-decoration:none;"><button class="btn btn-outline-light">View Profile</button></a>
														</div>
													</div><br>
		  
		  
		  
															<?php
			 
													
		
		}

	}
}
}

?>