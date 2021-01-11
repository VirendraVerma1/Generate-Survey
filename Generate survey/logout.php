<?php

if(isset($_POST['submit_logout']))
{
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        ob_end_flush();
}
?>