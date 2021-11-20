<?php
  //use your credentials here
 $conn= mysqli_connect("localhost:3308","root",'','googlesignin');

 if(!$conn)
 {
     die("Error ".mysqli_connect_error($conn));
 }


?>