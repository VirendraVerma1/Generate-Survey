<?php

if(isset($_POST['submit']))
{
    
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
    if($name=="viru"&&$pass=='1234')
        {
            ?>
            <html>
                <head><title>Profile</title></head>
                <body>
                    <a href="profile.php">Profile</a>
                </body>
            </html>
            <?php
            
        }
}
?>