<?php
ob_start();
?>
<html>
    <head>
        <title>Font Add</title>
    </head>
    
    <body>
        <h3 align="center" style="margin-top:100px;">Available Fonts</h3>
        <div align="center">
        <table border="1px" collspan="1px">
            <tr>
                <td>
                    SNO.
                </td>
                
                <td>
                    Font Name
                </td>
                
                <?php get_font();?>
            </tr>
        </table>
        <table  border="1px" collspan="1px" style="margin-top:100px;">
            <tr>
               
                
                <td>
                    Font Name
                </td>
                
                
            </tr>
            
            <form action="addfont.php" method="POST">
                   
                        <tr>
                        <td>
                            <input type="text" name="input1" placeholder="enter font name">
                        </td>
                         </tr>
                    
                    
                    <tr>
                        <td align="center">
                            <input type="submit" name="save" value="save">
                        </td>
                    </tr>
            </form>
            
        </table>
        </div>
    </body>
</html>

<?php

    function get_font()
    {
        include("../db_con.php");
        $sql="SELECT * FROM fonts";
        $run=mysqli_query($con,$sql);
        if($run)
        {
            while($data=mysqli_fetch_assoc($run))
            {
                   ?>
                    <tr>
                        <td>
                            <?php echo $data['ID'];?>
                        </td>
                        <td>
                            <?php echo $data['FontName'];?>
                        </td>
                    </tr>
                   <?php
            
            }
        
        }
    }
    
    if(isset($_POST['save']))
    {
        include("../db_con.php");
         $temp=$_POST['input1'];
         $sql="INSERT INTO fonts(FontName) VALUES ('$temp')";
    	$run=mysqli_query($con,$sql);
    	if($run)
    	{
    	    header("Location: redirect.php");
	        ob_end_flush();
        	exit();
    	}
    	else
    	{
    	    header("Location: redirect.php");
        	ob_end_flush();
        	exit();
    	}
    }
?>