<!


<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
include('DB.php');
if(isset($_POST['login'])){
$uname=$_POST['username']; 
$upass=$_POST['password']; 
if(DB::query('SELECT username from users where username = :un',array(':un'=>$uname))){
    if(password_verify($upass,DB::query('SELECT password from users where username = :un',array(':un'=>$uname))['0']['password'])){
        echo 'logged in';
        header("location:index.php");
    }
    else{
        echo "incoret";
}
}else{
    echo 'in';
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 1000px; padding: 20px; padding-left:500px; }
    </style>
</head>
<body>
    <div class="container-fluid" style="background-image: url(aa.jpg); height: 710px; font-size:30px; font-color: orange;">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
               
                    <h2 style="color:orange; font-size: 35px;">Login</h2> <hr style="height:2px;"><br>
                    <p style="color: orange;">Please fill in your credentials to login.</p>
                    <form action="login.php" method="post" >
                        <label style="color: orange;">Username</label>
                        <input type="text" name="username" class="form-control"><br>
               
            
                        <label style="color:orange;">Password</label>
                        <input type="password" name="password" class="form-control">
                        <br>
               
            
                        <input type="submit" class="btn btn-primary"name="login" value="Login">
                        <p style="color: orange;">Don't have an account? </p> <a style="color: white;" href="register.php">Sign up now</a>
                    </form>
              
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        
    </div>
   
</body>
</html>



 