<?php
ob_start();
session_start();
include("db_con.php");
if(isset($_POST['submit_signup']))
{
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email_name=$_POST['email'];
    $password_name=$_POST['pass'];
    
    //check for box filled with something else
    if(strlen($first_name)>12&&strlen($last_name)>12)
    {
        header("Location: signup.php?account=error");
    	ob_end_flush();
		exit();
    }
    
    
    
    $sql="SELECT * FROM users WHERE Email='$email_name'";
    $run=mysqli_query($con,$sql);
    if(mysqli_num_rows($run)>0)
    {
        //give acount exist error message
		
		
        header("Location: signup.php?account=exist");
    	ob_end_flush();
		exit();
		
    }
    else
    {
		//merge name
		$str=$first_name." ".$last_name;
        //create new account
        $sql="INSERT INTO users(Username,Email,Password) VALUES ('$str','$email_name','$password_name')";
		$run1=mysqli_query($con,$sql);
		if($run1)
		{
		    
		    //getting the of the above email address
		    $sql="SELECT * FROM users WHERE Email='$email_name'";
             $run4=mysqli_query($con,$sql);
             if(mysqli_num_rows($run4)>0)
               {
                   $data=mysqli_fetch_assoc($run4);
                   $_SESSION['user_id']=$data['ID'];
                   
                   //now creating userid table and user member location table
		          $table_name="userid_".$_SESSION['user_id'];
		          $sql="CREATE TABLE $table_name(ID  INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,SurveyName VARCHAR(50) NOT NULL,DayCreated date NULL,DayLeft date NULL,PeopleRespond INT(10) NULL,ProfilePic TEXT NULL,SurveyBackgroundPic TEXT NULL,ActiveSurvey INT(10) NULL,SurveyFont VARCHAR(50) NULL,SurveyFontColor VARCHAR(50) NULL,Bold INT(2) NULL,Italic INT(2) NULL,Underline INT(2) NULL,Outerline INT(2) NULL,Size INT(3) NULL,EnableResultPage INT(2) NULL,EnableComment INT(2) NULL,EnableRate INT(2) NULL,EnablePublic INT(2) NULL,Online_Status TIME NULL, Rate DECIMAL(50) NULL,Report INT(3) NULL,OuterDiv INT(2) NULL,OuterDivColor VARCHAR(10) NULL,InnerDiv INT(2) NULL,InnerDivColor VARCHAR(10) NULL,ThemeBlack INT(2) NULL)";
		          $con->query($sql); //table created
            			
            			 //now creating userid table and user member location table
		          $table_name="userid_".$_SESSION['user_id']."_member_ip";
		          $sql="CREATE TABLE $table_name(ID  INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
		          $con->query($sql); //table created
		          
		          		 //now creating userid table and user friend list table
		          $table_name="userid_".$_SESSION['user_id']."_friend_list";
		          $sql="CREATE TABLE $table_name(ID  INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,FriendName VARCHAR(255) NULL,State VARCHAR(50) NULL)";
		          $con->query($sql); //table created
		          
		          //now creating table nortification
				  $table_name="userid_".$_SESSION['user_id']."_nortification";
		          $sql="CREATE TABLE $table_name(ID  INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,FriendName INT(255) NULL,Nortification INT(50) NULL,Status VARCHAR(50) NULL,SurveyName VARCHAR(50) NULL,SurveyId INT(50) NULL,DayCreated date NULL)";
		             $con->query($sql);
		          
		          		 //now creating userid table and user member location table
		          $table_name="userid_".$_SESSION['user_id']."_history";
		          $sql="CREATE TABLE $table_name(ID  INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Day INT(3) NULL,Month INT(3) NULL,Year INT(5) NULL)";
		          $con->query($sql); //table created
		          
            		//now creating second table for users member location
            		$table_name="userid_".$_SESSION['user_id']."_member_survey_location";
            		$sql="CREATE TABLE $table_name(ID  INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, City VARCHAR(50) NULL,Region VARCHAR(50) NULL,Country VARCHAR(50) NULL)";
            		if($con->query($sql))
            		{
            		    $sql="INSERT INTO $table_name(City,Region,Country) VALUES ('Unknown','Unknown','Unknown')";
                		$run3=mysqli_query($con,$sql);
                		if($run3)
                		{
                		
                			    //account is succesfully created
                			    header("Location: profile.php");
                            	ob_end_flush();
	            	            exit();
                		}
                		else
                		{
                		        //problem in crating account
                		        header("Location: signup.php?account=exist1");
                             	ob_end_flush();
	                        	exit();
                		}
                			
            		}
            		else
            		{
            		    header("Location: signup.php?account=exist2");
                    	ob_end_flush();
	                	exit();
            		}
               }
               else
               {
                   //error in creating account
                   header("Location: signup.php?account=exist3");
                	ob_end_flush();
	            	exit();
               }
              
		}
		else
		{
		    //error in creating account
		    header("Location: signup.php?account=exist4");
        	ob_end_flush();
	    	exit();
		}
    }
}

?>