<?php
ob_start();
$string="sim_id_1";
    
  $survey_name="";
  $survey_id;
  
    for($i=0;$i<strlen($string);$i++)
    {
        if($string[$i]=="_"&&$string[$i+1]=="i"&&$string[$i+2]=="d"&&$string[$i+3]=="_")
        {
           for($j=$i+4;$j<strlen($string);$j++)
           {
               $survey_id = $string[$j];
           }
           break;
        }
        else
        {
            $survey_name .= $string[$i];
        }
    }

    $survey_name=str_replace("_"," ",$survey_name);
    echo $survey_name."<br>";
    
    $survey_id=str_replace("_"," ",$survey_id);
    echo $survey_id."<br>";
    
    
    /*
    Session used
    
    $_SESSION['user_id']; for storing user id
    $_SESSION['current_ques_id']; for storing current ques of survey id
    $_SESSION['user_survey_id']; for storing survey name table
    $_SESSION['current_survey_name_id'];//storing pure id of current survey from userid table
	$_SESSION['current_survey_page'];
	$_SESSION['page'];
	
	users  : ID ,Username, Email,Password,PhoneNo,TotalSurvey
	userid_1  : ID, SurveyName, DayLeft, PeopleRespond,ProfilePic,SurveyPic,SurveyBackgroundPic
	userid_1_surveyid_3  :  ID, Ques , Ques_Order, Page, ..
	
	session for users member
	$_SESSION['member_user_table_id'];//for storing user table id
	$_SESSION['member_survey_table_id'];// for storing users survey table id
	$_SESSION['member_city'];
	$_SESSION['member_region'];
	$_SESSION['member_country'];
    */
	
	
?>