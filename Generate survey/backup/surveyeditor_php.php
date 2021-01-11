<?php
ob_start();
session_start();
include("db_con.php");

//changing text to text field of survey name-----------------------------------------------------------------------------------------------------
if(isset($_POST['change_survey_name_text_to_textfield']))
{
    header("Location: surveyeditor.php?surveyname=change");
	ob_end_flush();
	exit();
}

//saving image from user browse-----------------------------------------------------------------------------------------------
if(isset($_POST['submit_sbgfile']))
{
	//checking if image exist then delete that image
	$imagename="";
	$table_name="userid_".$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	//getting file name
	$sql="SELECT * FROM $table_name WHERE ID='$current_survey_id'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		$data=mysqli_fetch_assoc($run);
		$imagename=$data['SurveyBackgroundPic'];
		$file='dataimg/'.$imagename;
		if(file_exists($file))
		{
			unlink($file);
			$imagename="";
			
			$imagename=$_FILES['sbgfile']['name'];
			$tempname=$_FILES['sbgfile']['tmp_name'];
			
			move_uploaded_file($tempname,"dataimg/$imagename");
			
			$table_name="userid_".$_SESSION['user_id'];
			$current_survey_id=$_SESSION['current_survey_name_id'];
			$sql="UPDATE $table_name SET SurveyBackgroundPic='$imagename' WHERE ID='$current_survey_id'";
			$file='dataimg/'.$imagename;
			$run=mysqli_query($con,$sql);
			if($run)
			{
				$sql="SELECT * FROM $table_name WHERE ID='$current_survey_id'";
				$run=mysqli_query($con,$sql);
				if($run)
				{
					$data=mysqli_fetch_assoc($run);
					$imagename=$data['SurveyBackgroundPic'];
					$file='dataimg/'.$imagename;
					if(file_exists($file))
					{
						header("Location: surveyeditor.php?uploadedsuccessfully");
						ob_end_flush();
						exit();
					}
					else
					{
						$imagename="";
						$sql="UPDATE $table_name SET SurveyBackgroundPic='$imagename' WHERE ID='$current_survey_id'";
						$run=mysqli_query($con,$sql);
						if($run)
						{
							header("Location: surveyeditor.php?size_of_the_file_is_large");
							ob_end_flush();
							exit();
						}
					}
				}
				else
				{
					header("Location: profile.php");
							ob_end_flush();
							exit();
				}
				 
			}
			else
			{
				unlink($file);
				 header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
			}
		}
		else
		{
			header("Location: profile.php");
			ob_end_flush();
			exit();
		}
	}
	else
		{
			header("Location: profile.php");
			ob_end_flush();
			exit();
		}
}


//removing image from user browse------------------------------------------------------------------------------------------------------
if(isset($_POST['submit_remove_bgimage']))
{
	$imagename="";
	$table_name="userid_".$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	//getting file name
	$sql="SELECT * FROM $table_name WHERE ID='$current_survey_id'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		$data=mysqli_fetch_assoc($run);
		$imagename=$data['SurveyBackgroundPic'];
		$file='dataimg/'.$imagename;
		
		if($imagename)
		{
			
			
			$imagename="";
			$sql="UPDATE $table_name SET SurveyBackgroundPic='$imagename' WHERE ID='$current_survey_id'";
			$run=mysqli_query($con,$sql);
			if($run)
			{
				if(file_exists($file))
				{
					unlink($file);
					header("Location: surveyeditor.php");
					ob_end_flush();
					exit();
				}
				else
				{
					header("Location: surveyeditor.php");
					ob_end_flush();
					exit();
				}
			}
			else
			{
				header("Location: profile.php");
				ob_end_flush();
				exit();
			}
			
		}
		else
		{
			header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
		}
	}
	else
	{
		header("Location: profile.php");
		ob_end_flush();
		exit();
	}
	
	
	
}
//change survey name--------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST['change_survey_name']))
{
	//getting font name
	$font_name=$_POST['survey_font'];
	//getting color name or code
	$font_color=$_POST['survey_color_font'];
	//getting bold,ittalic,underline,size,outerline
	if(isset($_POST['survey_bold']))$font_bold=1;else $font_bold=0;
	if(isset($_POST['survey_italic']))$font_italic=1;else $font_italic=0;
	if(isset($_POST['survey_underline']))$font_underline=1;else $font_underline=0;
	if(isset($_POST['survey_outerline']))$font_outerline=1;else $font_outerline=0;

	$font_size=$_POST['survey_text_size'];
	if($font_size>100)$font_size=100;
	if($font_size<20)$font_size=20;
	//getting survey name
    $new_name=$_POST['new_survey_name'];
    $new_name = str_replace(' ', '_', $new_name); //removing spaces with underscore
    $table_name="userid_".$_SESSION['user_id'];
    $current_survey_id=$_SESSION['current_survey_name_id'];
    $sql="UPDATE $table_name SET SurveyName='$new_name',SurveyFont='$font_name',SurveyFontColor='$font_color',Bold='$font_bold',Italic='$font_italic',Underline='$font_underline',Outerline='$font_outerline',Size='$font_size' WHERE ID='$current_survey_id'";
    $run=mysqli_query($con,$sql);
    if($run)
    {
         header("Location: surveyeditor.php");
		ob_end_flush();
		exit();
    }
    else
    {
        header("Location: profile.php?surveycreate=error");
		ob_end_flush();
		exit();
    }
}

//add ques-----------------------------------------------------------------------------------------------------------------------------
if(isset($_POST['add_ques']))
{
	$table_name=$_SESSION['user_survey_id'];
	//getting max ques id
	$ques_order_count=0;
	$sql="SELECT * FROM $table_name";
	$run=mysqli_query($con1,$sql);
	if(mysqli_num_rows($run)>0)
	{
		while($data=mysqli_fetch_assoc($run))
		{
			$ques_order_count++;
		}
	}
	$ques_order=$ques_order_count+1;$t=0;$answer_type_t="Radio";$t1=3;$o1="";$o2="";$o3="";$page=$_SESSION['current_survey_page'];$text_size=18;
	$sql="INSERT INTO $table_name(Ques_Order,Page,Save_Ques,Required,Multiple,Heading,Bold,Italic,Underline,Text_SizeQues,Answer_Type,Answer_Options,Option1,Option2,Option3,FontFamilyQues)
                   	VALUES ('$ques_order','$page', '$t',     '$t',    '$t',    '$t',   '$t','$t', '$t'  ,'$text_size','$answer_type_t','$t1','$o1','$o2','$o3','Verdana')";
		$run=mysqli_query($con1,$sql);
		if($run)
		{
			$data=mysqli_fetch_assoc($run);
			$_SESSION['current_ques_id']=$data['ID'];
			header("Location: surveyeditor.php?if".$_SESSION['current_ques_id']);
			ob_end_flush();
			exit();
		}
		else
		{
			header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
		}
}

// next page-----------------------------------------------------------------------------------------------------------------------
if(isset($_POST['next_page']))
{
	$_SESSION['current_survey_page']=$_SESSION['current_survey_page']+1;
	header("Location: surveyeditor.php");
	ob_end_flush();
	exit();
}

// prev page-----------------------------------------------------------------------------------------------------------------------
if(isset($_POST['prev_page']))
{
	$_SESSION['current_survey_page']=$_SESSION['current_survey_page']-1;
	header("Location: surveyeditor.php");
	ob_end_flush();
	exit();
}

//preview button----------------------------------------------------------------------------------------------------------------------

if(isset($_POST['submit_preview']))
{
	$user_id=$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	$_SESSION['page']=1;
	header("Location: preview.php?user=".$user_id."&&survey=".$current_survey_id."&&page=1");
	ob_end_flush();
	exit();
}

//start survey
if(isset($_POST['submit_start_survey']))
{
     $user_table_id="userid_".$_SESSION['user_id'];
     $user_id=$_SESSION['user_id'];
	$current_survey_id=$_SESSION['current_survey_name_id'];
	
	
	$_SESSION['page']=1;
     $temp=$_SESSION['current_survey_name_id'];
      
            
             $survey_state=$_SESSION['survey_state'];
             if($survey_state==0)$state="deactivated";else $state="activated";
             $_SESSION['survey_state']=$state;
					header("Location: survey_optimize.php?user=".$user_id."&&survey=".$current_survey_id."&&survey_state=".$state);
					ob_end_flush();
					exit();
            
        
}


//getting edit button details and put save_ques value 1 to 0----------------------------------------------------------------------------
$table_name=$_SESSION['user_survey_id'];
$sql="SELECT * FROM $table_name";
$run=mysqli_query($con1,$sql);
if(mysqli_num_rows($run)>0)
{
	while($data=mysqli_fetch_assoc($run))
	{
		$id=$data['ID'];
		$temp="edit_".$id;
		if(isset($_POST[$temp]))
		{
			$t=0;
			$sql="UPDATE $table_name SET Save_Ques='$t' WHERE ID='$id'";
			$run=mysqli_query($con1,$sql);
			if(mysqli_num_rows($run)>0)
			{
				header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
			}
			else
			{
				$data=mysqli_fetch_assoc($run);
				$_SESSION['current_ques_id']=$data['ID'];
				 header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
			}
		}
	}
}



//getting delete button details and delete ques----------------------------------------------------------------------------------------------
$table_name=$_SESSION['user_survey_id'];
$sql="SELECT * FROM $table_name";
$run=mysqli_query($con1,$sql);
if(mysqli_num_rows($run)>0)
{
	while($data=mysqli_fetch_assoc($run))
	{
		$id=$data['ID'];
		$temp="delete_".$id;
		if(isset($_POST[$temp]))
		{
			
			$sql="DELETE FROM $table_name WHERE ID='$id'";
			$run=mysqli_query($con1,$sql);
			if($run)
			{
				header("Location: surveyeditor.php");
				ob_end_flush();
				exit();
			}
			else
			{
				header("Location: profile.php");
				ob_end_flush();
				exit();
			}
		}
	}
}

//saving the filled current question data----------------------------------------------------------------------------------------------------------------
$current_ques_id="save_".$_SESSION['current_ques_id'];
if(isset($_POST[$current_ques_id]))
{
    $multiple=0;$required=0;$heading=0;$bold=0;$italic=0;$underline=0;$font="";
    $ques_order=$_POST['ques_order'];
    $ques=$_POST['ques'];
    $table_name=$_SESSION['user_survey_id'];
    $current_ques_id=$_SESSION['current_ques_id'];
    $sql="SELECT * FROM $table_name WHERE ID='$current_ques_id'";
    $run=mysqli_query($con1,$sql);
    if(mysqli_num_rows($run)>0)
    {
        $count_options=1;$option_counter=0;
        $option_array=array();
        $data=mysqli_fetch_assoc($run);
        $total_answer_option=$data['Answer_Options'];
        for($i=1;$i<=$total_answer_option;$i++)
        {
            $count_options++;
            $option_array[$i]=$_POST['Option'.$i];
			if(isset($_POST['Option'.$i]))
			{
				$option_counter++;
			}
        }
		
        
        if(isset($_POST['required_option']))$required=1;else $required=0;
		if(isset($_POST['heading_option']))$heading=1;else $heading=0;
		if(isset($_POST['bold_option']))$bold=1;else $bold=0;
		if(isset($_POST['italic_option']))$italic=1;else $italic=0;
		if(isset($_POST['underline_option']))$underline=1;else $underline=0;
		if(isset($_POST['multiple_option'])){$multiple=1;$required=0;}else $multiple=0;
		
		$font=$_POST['survey_ques_font'];
		$answer_options=$data['Answer_Options'];
		$answer_options=sizeof($option_array);
        $option_update_count=0;
        $table_name=$_SESSION['user_survey_id'];
        $ques_id=$_SESSION['current_ques_id'];
        $answer_type=$data['Answer_Type'];
        $page=$_SESSION['current_survey_page'];
		$text_size=$_POST['text_size_option'];
		
		if($text_size>35)
		{
			$text_size=35;
		}
		if($text_size<10)
		{
			$text_size=10;
		}
		if($heading)
		{
			$answer_type="none";$count_options=0;$answer_options=0;
		}
		
		
		
		
		
        $sql="UPDATE $table_name SET Ques='$ques',FontFamilyQues='$font', Ques_Order='$ques_order',Page='$page', Multiple='$multiple', Required='$required',Heading='$heading', Bold='$bold',Italic='$italic',Underline='$underline',Text_SizeQues='$text_size',Answer_Type='$answer_type',Answer_Options='$answer_options', Save_Ques='1' WHERE ID='$ques_id'";
		$run=mysqli_query($con1,$sql);
		if($run)
			{
			    //inserting options
			    for($i=1;$i<$count_options;$i++)
			    {
			        $temp_column="Option".$i;
			        $temp=$option_array[$i];
    			   
    			    $sql="UPDATE $table_name SET $temp_column='$temp' WHERE ID='$ques_id'";
            		$run=mysqli_query($con1,$sql);
            		if($run)
            			{
            			    $option_update_count++;
            			}
            			else
            			$i=$i-1;
            			
			    }
			    if($option_update_count)
				{
					 header("Location: surveyeditor.php");
					ob_end_flush();
					exit(); 
				}
			}
		else
		{
         header("Location: profile.php?sqlproblem");
		    ob_end_flush();
		    exit();   
		    
		}
    }
    else
    {
      header("Location: profile.php");
		    ob_end_flush();
		    exit();   
        
    }
}

//for changing answer option and type
/*
if(isset($_POST['change_answer_type_option']))
{
    $temp="Answer_Options_".$_SESSION['current_ques_id'];
    $answer_option=$_POST[$temp];
    $temp1="Answer_Type_".$_SESSION['current_ques_id'];
    $answer_type=$_POST[$temp1];
    $option_value=$_POST[$current_ques_id];
    $table_name=$_SESSION['user_survey_id'];
    $current_ques_id=$_SESSION['current_ques_id'];
    $sql="UPDATE $table_name SET Answer_Options='$answer_option', Answer_Type='$answer_type', WHERE ID='$current_ques_id'";
            		$run=mysqli_query($con1,$sql);
            		if($run)
            			{
            			    header("Location: surveyeditor.php?update=done");
		                     ob_end_flush();
		                    exit();
            			}
            			else
            			{
            			    header("Location: surveyeditor.php?update=".$table_name);
		                     ob_end_flush();
		                    exit();
            			}
}
*/

//if getting answertype then store on db and refresh before saving answer---------------------------------------------------------------------------
$temp1="Answer_Type_".$_SESSION['current_ques_id'];
if(isset($_POST[$temp1]))
{
    $answer_type=$_POST[$temp1];
    $table_name=$_SESSION['user_survey_id'];
    $ques_id=$_SESSION['current_ques_id'];
	
	if($answer_type=="Comment")
	{
		//add column in survey ques comment table 
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment ADD $column TEXT NOT NULL";
		$add=mysqli_query($con1,$sql);
		
		
		$temp=1;
		$sql="UPDATE $table_name SET Answer_Type='$answer_type', Answer_Options='$temp' WHERE ID='$ques_id'";
		
		
	}
	elseif($answer_type=="none")
	{
		//delete column in survey ques comment table
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment DROP $column";
		$add=mysqli_query($con1,$sql);
		
		$temp=0;
		$sql="UPDATE $table_name SET Answer_Type='$answer_type', Answer_Options='$temp' WHERE ID='$ques_id'";
	}
	else
	{
		//delete column in survey ques comment table
		$table_ques_comment=$_SESSION['user_survey_id']."_survey_ques_comment";
		$column="Ques_id_".$ques_id;
		$sql="ALTER TABLE $table_ques_comment DROP $column";
		$add=mysqli_query($con1,$sql);
		
		$sql="UPDATE $table_name SET Answer_Type='$answer_type' WHERE ID='$ques_id'";
	}
    
		$run=mysqli_query($con1,$sql);
		if($run)
		{
			 header("Location: surveyeditor.php");
		    ob_end_flush();
		    exit();  
		}
		else
		{
		    header("Location: profile.php");
		    ob_end_flush();
		    exit();
		}
		
}









?>