<?php
    $strStart = '2013-06-19 22:25'; 
   $strEnd   = '06/19/13 21:47';
   
   $dteStart = new DateTime($strStart); 
   $dteEnd   = new DateTime($strEnd); 
   
   $dteDiff  = $dteStart->diff($dteEnd); 
   
   if($dteStart<$dteEnd)
   echo $dteDiff->format("%H:%I:%S"); 
   else
   echo "big diif";
?>