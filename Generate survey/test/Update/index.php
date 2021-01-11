<?php
    
    function add_column()
    {
        //adding column in userid table
        include("db_con.php");
        $column_name="ThemeBlack";
        $sql="SELECT * FROM users";
        $run=mysqli_query($con,$sql);
        if($run)
        {
            while($data=mysqli_fetch_assoc($run))
            {
                $id=$data['ID'];
                $table_name="userid_".$id;
                $sql="ALTER TABLE $table_name ADD $column_name INT(2) NOT NULL";
	        	$add=mysqli_query($con,$sql);
	        	if($add)
	        	echo "done ".$id;
            }
        }
        echo "<br>finish";
    }
?>