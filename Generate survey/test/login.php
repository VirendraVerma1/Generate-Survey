<html>
    <head>
        <title>Log in</title>
    </head>
    
    <body>
        <div align="center">
            <form action="" method="post">
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="password" name="pass">
                <input type="submit" value="submit" name="subit">
            </form>
        </div>
    </body>
</html>

<?php

if(isset($_POST['submit']))
{
    
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
    if($name=="viru"&&$pass=='1234')
        {
            ?>
            
                    <a href="profile.php">Profile</a>
               
            <?php
            
        }
}
?>