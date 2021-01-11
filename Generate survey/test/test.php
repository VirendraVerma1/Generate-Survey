<?php
function getRealIpAddr(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //check if ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //to check if ip is passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
        $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
   echo getRealIpAddr();
?>