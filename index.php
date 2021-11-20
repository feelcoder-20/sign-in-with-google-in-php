<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin with Google</title>
    <script src="http://apis.google.com/js/platform.js?onload=initAuth" async defer></script>
    <meta name="google-signin-client_id" content="XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX">
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
   * {
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 100%;
            height: 100vh;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }
        
        .container .googlesignin {
            position: relative;
            border: 1px solid black;
            box-sizing: border-box;
            height: 450px;
            width: 400px;
            padding: 50px;
            background-color: orangered;
            border-bottom-left-radius: 50px;
            box-shadow: 10px 10px 10px 10px rgb(126, 112, 88);
        }
        
        .container .googlesignin .textdata {
            width: 260px;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 20px;
            outline: none;
            border-color: bisque;
            font-size: 20px;
        }
        
        .container .googlesignin .emaildata {
            width: 260px;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 20px;
            outline: none;
            border-color: bisque;
            font-size: 20px;
        }
        
        .container .googlesignin .btn {
            width: 170px;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 20px;
            outline: none;
            font-size: 20px;
            background-color: blueviolet;
        }
        
        h1 {
            text-align: center;
        }
        .container .googlesignin .g-signin2 {
            width: 200px;
            position: relative;
            left: 30px;
            top:40px;
           
        }
  </style>


</head>
<body>

      <?php if(isset($_SESSION['userid'])) { ?>
      
           <a href="javascript:void(0)"  onclick="logOut()">Logout <img src="<?php echo $_SESSION['userimage']; ?>" alt="" style="border-radius:50%;">  </a>
        <?php } else
         { ?>  

     <div class="container">
        <div class="googlesignin">
            <form action="">
                <input type="text" name="username" id="username" placeholder="enter your name" required class="textdata"><br>
                <input type="email" name="email" id="email" placeholder="enter your email-id" required class="emaildata"><br>
                <input type="submit" value="Sign Up" class="btn">
            </form>
            <h1>OR</h1>
            <div class="g-signin2" data-onsuccess="onSignIn" data-width="250" data-height="50" data-prompt="select_account" data-longtitle='true'></div>
 
        </div>
    </div>


           
    <?php } ?>
     <script>

       function initAuth(){
           gapi.load('auth2',function(){
               gapi.auth2.init();
           });
           
       }
        function logOut(){

        var at=  gapi.auth2.getAuthInstance();
        at.signOut();
        $.ajax({
            url:'logout.php',
            success:function(result){
             window.location.href='index.php';
            }
        });

        }
        function onSignIn(user){
              var userdata=user.getBasicProfile();
              $.ajax({
                 url:'storeuser.php',
                 type:'post',
                 data:{'username':userdata.getName(),'userid':userdata.getId(),'email':userdata.getEmail(),'imageurl':userdata.getImageUrl()},
                 success:function(result){
                        window.location.href='index.php';
                 }

              });

        }
     </script>
</body>
</html>
