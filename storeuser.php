<?php
   session_start();
   include_once 'connection.php';
    

   $username=$_POST['username'];
   $userid=$_POST['userid'];
   $useremail=$_POST['email'];
   $userimage=$_POST['imageurl'];

   $query="select * from userdata where userid='$userid'";
   $result=mysqli_query($conn,$query);
   
   if(mysqli_num_rows($result)>0){
         $_SESSION['userid']=$userid;
         $_SESSION['username']=$username;
         $_SESSION['userimage']=$userimage;
   }
   else{
    $query="insert into userdata(username,userid,emailid,imageurl)  values('$username','$userid','$useremail','$userimage') ";

    mysqli_query($conn,$query);
    echo "Saved";
    $_SESSION['userid']=$userid;
    $_SESSION['username']=$username;
    $_SESSION['userimage']=$userimage;

   }

  

?>