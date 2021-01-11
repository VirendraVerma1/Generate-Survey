<?php
session_start();
if(isset($_POST["limit"], $_POST["start"]))
{
 include("db_con.php");
 $column=$_SESSION['comment_column'];
 $table_name=$_SESSION['comment_column_table'];
 $query = "SELECT * FROM $table_name ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($con1, $query);
 while($row = mysqli_fetch_array($result))
 {
     if($row[$column])
     {
  echo '
  <div class="container mt-3">
        <div class="media border p-2">
              <img src="img/profile.png" class="mr-3 align-self-start" style="width:60px">
                    <div class="media-body">
                     
                         <p style="color:black;" align="left">'.$row[$column].'</p>
                     </div>
                              
       </div>
 </div>
  
  
  
  ';
     }
 }
}

?>