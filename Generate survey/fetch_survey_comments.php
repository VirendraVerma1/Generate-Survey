<?php
session_start();
if(isset($_POST["limit"], $_POST["start"]))
{
 include("db_con.php");
 
 $table_name=$_SESSION['comment_column_table'];
 $query = "SELECT * FROM $table_name ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($con1, $query);
 if(mysqli_num_rows($result)>0)
 {
	 while($row = mysqli_fetch_array($result))
	 {
		 if($row['Comment'])
		 {
			 
			 //fetching person name
			 $id=$row['Person'];$name="";$imgname="";$link="";
			 if($id>0)
			 {
				 $sql="SELECT * FROM users WHERE ID='$id'";
				 $run2=mysqli_query($con,$sql);
				 if($run2)
				 {
					 $data=mysqli_fetch_assoc($run2);
					 $name=$data['Username'];
					 if($data['ProfilePic'])$imgname="dataimg/".$data['ProfilePic'];else $imgname="dataimg/people.png";
					 $link="aboutme.php?user=".$data['ID'];
				 }
			 }
			 else
			 {
				 $name="Anonymous";
				 $imgname="dataimg/people.png";
			 }
			 
	  echo '
	  <div class="container mt-3">
								  <div class="media border p-3">
									<img src="'.$imgname.'" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
									<div class="media-body">
									  <a href="'.$link.'"><h4>'.$name.' </a><small><i>Posted on '.$row['DateTime'].'</i></small></h4>
									  <p>'.$row['Comment'].'</p>      
									</div>
								  </div>
								</div>
	  
	  
	  
	  ';
		 }
		 
	 }
	 
 }
}

?>