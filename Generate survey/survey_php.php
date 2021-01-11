<?php
ob_start();
session_start();
include("db_con.php");

	//next page and submit
	if(isset($_POST['next_page']))
	{
		//submiting data
		$user_table="userid_".$_SESSION['member_user_table_id'];
		$survey_table=$user_table."_surveyid_".$_SESSION['member_survey_table_id'];
		
		//first get total answer options
		$sql="SELECT * FROM $survey_table";
		$run=mysqli_query($con1,$sql);
		if(mysqli_num_rows($run)>0)
		{
			while($data=mysqli_fetch_assoc($run))
			{
				
				$total_answer_option=$data['Answer_Options'];
				
				//taking value of single radio answer type
				if(!$data['Multiple']&&($data['Answer_Type']=='Radio'||$data['Answer_Type']=='Dropdown'))
				{
					
						$t="Option".$data['ID'];// column name
						$r="Result".$data['ID'];
						if(isset($_POST[$t]))//geting value of user entered
						{
							$temp=$_POST[$t];
							$ques_id=$data['ID'];
							
							
							$r1=$data[$temp]+1;
							$tr=$data['TotalResult']+1;
							$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
							$run1=mysqli_query($con1,$sql);
							if($run1)
							{
								echo $temp."<br>";
								$counter++;
								//header("Location: thankyou.php?survey=".$survey_table);
								//ob_end_flush();
								//exit();
							}
							else
							{
								$save_fail++;
								//header("Location: errorlink.php");
								//ob_end_flush();
								//exit();
							}
						}
				}//end of single radio answer type condition
				
				
				//taking value of multiple answer type
				elseif($data['Multiple']&&$data['Answer_Type']=='Radio')
				{
					for($i=1;$i<=$total_answer_option;$i++)
					{
						$t="Option".$i.$data['ID'];// column name
						$r="Result".$i.$data['ID'];//column name
						if(isset($_POST[$t]))//geting value of user entered
						{
							$temp=$_POST[$t];
							$ques_id=$data['ID'];
							
							$r1=$data[$temp]+1;
							$tr=$data['TotalResult']+1;
							$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
							$run1=mysqli_query($con1,$sql);
							if($run1)
							{
								echo $temp."<br>";
								$counter++;
							}
							else
							{
								$save_fail++;
							}
						}
						
					}//end of for loop
				}//end of mmultiple answer type condition
				
				
				//taking value of multiple answer type
				elseif($data['Answer_Type']=='Checkbox')
				{
					for($i=1;$i<=$total_answer_option;$i++)
					{
						$t="Option".$i.$data['ID'];// column name
						$r="Result".$i.$data['ID'];//column name
						if(isset($_POST[$t]))//geting value of user entered
						{
							$temp=$_POST[$t];
							$ques_id=$data['ID'];
							
							$r1=$data[$temp]+1;
							$tr=$data['TotalResult']+1;
							$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
							$run1=mysqli_query($con1,$sql);
							if($run1)
							{
								echo $temp."<br>";
								$counter++;
							}
							else
							{
								$save_fail++;
							}
						}
						
					}//end of for loop
				}//end of mmultiple answer type condition
				
				
				else //for commentbox
				{
					
				}
			}//end of while loop
		}
		//redirecting to next page
		$user_id=$_SESSION['member_user_table_id'];
		$current_survey_id=$_SESSION['member_survey_table_id'];
		$_SESSION['page_member']=$_SESSION['page_member']+1;
		$_GET['page']=$_SESSION['page_member'];
		header("Location: survey.php?user=".$user_id."&&survey=".$current_survey_id."&&page=".$_GET['page']);
		ob_end_flush();
		exit();
	}
	
	
	//button for previous page
	if(isset($_POST['prev_page']))
	{
		if($_SESSION['page_member']>1)
		{
			$user_id=$_SESSION['member_user_table_id'];
			$current_survey_id=$_SESSION['member_survey_table_id'];
			$_SESSION['page_member']=$_SESSION['page_member']-1;
			$_GET['page']=$_SESSION['page_member'];
			header("Location: survey.php?user=".$user_id."&&survey=".$current_survey_id."&&page=".$_GET['page']);
			ob_end_flush();
			exit();
		}
		else
			echo "problem";
	}
	
	//button for submit
	if(isset($_POST['submit_survey']))
	{
		$user_table="userid_".$_SESSION['member_user_table_id'];
		$survey_table=$user_table."_surveyid_".$_SESSION['member_survey_table_id'];
		
		$counter=0;$save_fail=0;
		//first get total answer options
		$sql="SELECT * FROM $survey_table";
		$run=mysqli_query($con1,$sql);
		if(mysqli_num_rows($run)>0)
		{
			while($data=mysqli_fetch_assoc($run))
			{
				
				$total_answer_option=$data['Answer_Options'];
				
				//taking value of single radio answer type
				if(!$data['Multiple']&&($data['Answer_Type']=='Radio'||$data['Answer_Type']=='Dropdown'))
				{
					
						$t="Option".$data['ID'];// column name
						$r="Result".$data['ID'];
						if(isset($_POST[$t]))//geting value of user entered
						{
							$temp=$_POST[$t];
							$ques_id=$data['ID'];
							
							
							$r1=$data[$temp]+1;
							$tr=$data['TotalResult']+1;
							$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
							$run1=mysqli_query($con1,$sql);
							if($run1)
							{
								
								$counter++;
								//header("Location: thankyou.php?survey=".$survey_table);
								//ob_end_flush();
								//exit();
							}
							else
							{
								$save_fail++;
								//header("Location: errorlink.php");
								//ob_end_flush();
								//exit();
							}
						}
				}//end of single radio answer type condition
				
				
				//taking value of multiple answer type
				elseif($data['Multiple']&&$data['Answer_Type']=='Radio')
				{
					for($i=1;$i<=$total_answer_option;$i++)
					{
						$t="Option".$i.$data['ID'];// column name
						$r="Result".$i.$data['ID'];//column name
						if(isset($_POST[$t]))//geting value of user entered
						{
							$temp=$_POST[$t];
							$ques_id=$data['ID'];
							
							$r1=$data[$temp]+1;
							$tr=$data['TotalResult']+1;
							$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
							$run1=mysqli_query($con1,$sql);
							if($run1)
							{
								echo $temp."<br>";
								$counter++;
							}
							else
							{
								$save_fail++;
							}
						}
						
					}//end of for loop
				}//end of mmultiple answer type condition
				
				
				//taking value of multiple answer type
				elseif($data['Answer_Type']=='Checkbox')
				{
					for($i=1;$i<=$total_answer_option;$i++)
					{
						$t="Option".$i.$data['ID'];// column name
						$r="Result".$i;//column name
						if(isset($_POST[$t]))//geting value of user entered
						{
							if($_POST[$t])
							{
								$temp=$r;
								$ques_id=$data['ID'];
								
								$r1=$data[$temp]+1;
								$tr=$data['TotalResult']+1;
								$sql="UPDATE $survey_table SET $temp='$r1',TotalResult='$tr' WHERE ID='$ques_id'";
								$run1=mysqli_query($con1,$sql);
								if($run1)
								{
									
									$counter++;
								}
								else
								{
									$save_fail++;
								}
							}
						}
						
							
						
					}//end of for loop
				}//end of mmultiple answer type condition
				
				
				elseif($data['Answer_Type']=='Comment') //for commentbox
				{
					$table_ques_comment=$survey_table."_survey_ques_comment";
					$ques_id=$data['ID'];
					$column="Ques_id_".$ques_id;
					$data="text_comment_".$data['ID'];
					if($_POST[$data])
					{
						$data=$_POST[$data];
						$sql="INSERT INTO $table_ques_comment($column) VALUES ('$data')";
						$run6=mysqli_query($con1,$sql);
						
					}
					
					
				}
				
				
				
			}//end of while loop
			
			
			//---------------------------------------for storing participants submitting survey date--------start-------------------
			
			    //split date month year from date
                $date = date("m/d/Y");
                $date = explode('/', $date);
                	
            	$month = $date[0];
            	$day   = $date[1];
            	$year  = $date[2];
            	
            	$flag_id=0;$value=0;
            	$survey_table=$user_table."_surveyid_".$_SESSION['member_survey_table_id'];
            	$table_name="userid_".$_SESSION['member_user_table_id']."_history";
            	$sql="SELECT * FROM $table_name";
            	$run5=mysqli_query($con,$sql);
            	if($run5)
            	{
            	    while($data=mysqli_fetch_assoc($run5))
            	    {
            	        if($data['Year']==$year)
            	        {
            	            if($data['Month']==$month)
            	            {
            	                if($data['Day']==$day)
            	                {
            	                    //update the value by one
            	                    $flag_id=$data['ID'];
            	                    $value=$data[$survey_table];
            	                }
            	                
            	            }
            	        }
            	    }//end of while loop
            	}
            	$value=$value+1;
            	if($flag_id)
            	{
            	    
            	    $sql="UPDATE $table_name SET $survey_table='$value' WHERE ID='$flag_id'";
            		$run5=mysqli_query($con,$sql);
            		if($run5)
            	    	$counter++;
            		else
            			$save_fail++;
            	}
            	else
            	{
            	    //insert value
            	    $sql="INSERT INTO $table_name(Day,Month,Year,$survey_table) VALUES ('$day','$month','$year','$value')";
            		$run5=mysqli_query($con,$sql);
            		if($run5)
            		    $counter++;
            		else
            			$save_fail++;
            	}
			
			//---------------------------------------for storing participants submitting survey date--------end----------------------
			
			
			//---------------------------------------for storing location of member-saving location start---------------------------
				$_SESSION['member_country']=code_to_country($_SESSION['member_country']);
				$user_table="userid_".$_SESSION['member_user_table_id'];
				$table_name="userid_".$_SESSION['member_user_table_id']."_member_survey_location";
				$survey_table_name=$user_table."_surveyid_".$_SESSION['member_survey_table_id'];
				
				if(isset($_SESSION['member_city'])&&isset($_SESSION['member_country'])&&isset($_SESSION['member_region']))
				{
					
					$sql="SELECT * FROM $table_name";
					$run1=mysqli_query($con,$sql);
					if(mysqli_num_rows($run1)>0)
					{
						$temp_cityname=$_SESSION['member_city'];
						$counter_ifnamefound=0;
						$temp_fetch_number=0;
						//cecking if name exist in db
						while($data=mysqli_fetch_assoc($run1))
						{
							if($_SESSION['member_city']==$data['City'])
							{
								$counter_ifnamefound++;
								$temp_fetch_number=$data[$survey_table_name]+1;
								$sql="UPDATE $table_name SET $survey_table_name='$temp_fetch_number' WHERE ID=".$data['ID'];
								$run=mysqli_query($con,$sql);
								if($run)
								{
									$counter++;
									break;
								}
								else
								{
									$save_fail++;
								}
							}
						}
						//if found then store number+1
						if($counter_ifnamefound<=0)
						{
							$city=$_SESSION['member_city'];
							$region=$_SESSION['member_region'];
							$country=$_SESSION['member_country'];
							
							$sql="INSERT INTO $table_name(City,Region,Country) VALUES ('$city','$region','$country')";
							$run2=mysqli_query($con,$sql);
							if($run2)
							{
								$counter++;
								$sql="SELECT * FROM $table_name";
								$run3=mysqli_query($con,$sql);
								if(mysqli_num_rows($run3)>0)
								{
									while($data1=mysqli_fetch_assoc($run3))
									{
										if($_SESSION['member_city']==$data1['City'])
										{
											$temp_fetch_number=$data1[$survey_table_name]+1;
											$sql="UPDATE $table_name SET $survey_table_name='$temp_fetch_number' WHERE ID=".$data1['ID'];
											$run=mysqli_query($con,$sql);
											if($run)
											{
												$counter++;
												break;
											}
											else
											{
												$save_fail++;
											}
										}
									}
								}
								else
								{
									$save_fail++;
								}
							}
							else
							{
								$save_fail++;
							}
						}
						
					}
					else
					{
						header("Location: errorlink.php");
						ob_end_flush();
						exit();
					}
				}
				else
				{
					//saving member location to unknown
					
					$sql="SELECT * FROM $table_name";
					$run1=mysqli_query($con,$sql);
					if(mysqli_num_rows($run1)>0)
					{
						$data=mysqli_fetch_assoc($run1);
						$temp_fetch_number=$data[$survey_table_name]+1;
						$sql="UPDATE $table_name SET $survey_table_name='$temp_fetch_number' WHERE ID=1";
						$run=mysqli_query($con,$sql);
						if($run)
						{
							$counter++;
						}
						else
						{
							$save_fail++;
						}
					}
					else
					{
						$save_fail++;
					}
				}
				//--------------------------------------------------------------------saving location end-------------------------
				
			
			if($save_fail>0)
			{
				header("Location: errorlink.php");
				ob_end_flush();
				exit();
			}
			else
			{
				//updating people respond in userid table
				$table_name="userid_".$_SESSION['member_user_table_id'];
				
				$sql="SELECT * FROM $table_name";
				$run=mysqli_query($con,$sql);
				if(mysqli_num_rows($run)>0)
				{
					$temp_count=0;
					while($data=mysqli_fetch_assoc($run))
					{
						if($_SESSION['member_survey_table_id']==$data['ID'])
						{
							$temp_count=$data['PeopleRespond']+1;
							$sql="UPDATE $table_name SET PeopleRespond='$temp_count' WHERE ID=".$_SESSION['member_survey_table_id'];
							$run=mysqli_query($con,$sql);
							if($run)
							{
							    $temp_ip=$_SESSION['member_ip'];
							    $member_survey_table_name="userid_".$_SESSION['member_user_table_id']."_surveyid_".$_SESSION['member_survey_table_id'];
                            	$columnsurveyname=$member_survey_table_name;
                            	$table_name="userid_".$_SESSION['member_user_table_id']."_member_ip";
							    
							    $sql="INSERT INTO $table_name($columnsurveyname) VALUES ('$temp_ip')";
	                            $run=mysqli_query($con,$sql);
	                            
	                            //update in all survey name
                    			$survey_id=$member_survey_table_name;
                    			$sql="UPDATE All_Survey_Name SET People_Respond='$temp_count' WHERE Survey_User_Id='$survey_id'";
                    		    $run=mysqli_query($con,$sql);   
	
								header("Location: thankyou.php");
								ob_end_flush();
								exit();
							}
							else
							{
								header("Location: errorlink.php");
								ob_end_flush();
								exit();
							}
						}
						
					}
					
				}
				else
				{
					header("Location: errorlink.php");
					ob_end_flush();
					exit();
				}
				
				
			}
		}
		else
		{
			header("Location: errorlink.php");
			ob_end_flush();
			exit();
		}
		
	}
	
	
	
	
	
	//--------------------------------------------------------------------for location section------------------------------------------
	
	

	
	function code_to_country( $code ){

		$code = strtoupper($code);

		$countryList = array(
			'AF' => 'Afghanistan',
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas the',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island (Bouvetoya)',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros the',
			'CD' => 'Congo',
			'CG' => 'Congo the',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => 'Cote d\'Ivoire',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FO' => 'Faroe Islands',
			'FK' => 'Falkland Islands (Malvinas)',
			'FJ' => 'Fiji the Fiji Islands',
			'FI' => 'Finland',
			'FR' => 'France, French Republic',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia the',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'VA' => 'Holy See (Vatican City State)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KP' => 'Korea',
			'KR' => 'Korea',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyz Republic',
			'LA' => 'Lao',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libyan Arab Jamahiriya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'AN' => 'Netherlands Antilles',
			'NL' => 'Netherlands the',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Islands',
			'PL' => 'Poland',
			'PT' => 'Portugal, Portuguese Republic',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barthelemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia (Slovak Republic)',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia, Somali Republic',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard & Jan Mayen Islands',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland, Swiss Confederation',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States of America',
			'UM' => 'United States Minor Outlying Islands',
			'VI' => 'United States Virgin Islands',
			'UY' => 'Uruguay, Eastern Republic of',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe'
		);

		if( !$countryList[$code] ) return $code;
		else return $countryList[$code];
	}


?>