<?php
include('DB.php');

if(isset($_POST['createaccount'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if(!DB::query('SELECT username FROM users WHERE username=:username',array(':username'=>$username))) {
        
        if(strlen($username) >= 3 && strlen($username) <= 32) {
            if(preg_match('/[a-zA-Z0-9_]+/', $username)){
                if(strlen($password) >= 6 && strlen($password) <= 60){
                    
                            DB::query('INSERT INTO users VALUES (:username,:password)',array('username'=>$username,'password'=>password_hash($password,PASSWORD_BCRYPT)));
                            echo "success!";
                            header("location: login.php");
                        
                        
                    }
                }
                else{
                    echo 'Invalid password';
                }
            }
            else{
                echo 'Invalid username';
            }
        }
        else{
            echo 'Invalid username';
        }
    }
    else{
        echo 'User already exists!';
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Signup page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
    <!--
    <style>
    body {
    margin: 0px;
    padding: 0px;
    background-image: url(bk2.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.login-block {
    width: 400px;
    height: 500px;
    position: absolute;
    /*background: transparent;*/
    top: 0%;
    bottom: 0%;
    left: 0%;
    right: 0%;
    margin: auto;
    box-sizing: border-box;
    padding: 20px;
}

img {
    width: 100px;
    height: 100px;
    margin-top: -50px;
    margin-left: 130px;
    border-radius: 50%;
}

h1 {
    font-size: 45px;
    text-align: center;
    margin-top: -30px;
    margin-bottom: 30px;
    color: white;
}

.login-block p {
    margin: 0%;
    padding: 0%;
    font-weight: bold;
    font-size: 20px;
    color: white;
}

.login-block input {
    width: 100%;
    border: none;
    border-bottom: solid rgb(247, 35, 28);
    margin-bottom: 10px;
    height: 40px;
    background: transparent;
}

.login-block input[type="text"],
input[type="submit"] {
    color: white;
    background: transparent;
    font-size: 13px;
}

.login-block input[type="submit"] {
    background: rgb(247, 35, 28);
    color: black;
    font-size: 15px;
    border-radius: 20px;
}

.login-block input[type="submit"]:hover {
    color: red;
    background: white;
}

#link {
    font-size: 20px;
}

.login-block a {
    text-decoration: none;
    font-size: 20px;
    line-height: 5px;
    color: white;
}

.login-block a:hover {
    color: rgb(247, 35, 28);
}
    </style>
-->
</head>

<body>
    
    <div class="container-fluid" style="background-image: url(aa.jpg); width: 1210px height: 710px;">
    	<div class="row">
    		<div class="col-sm-3">
    			
    		</div>
    		<div class="col-sm-6" style="font-size: 30px;">
    			<h1 style="color:orange;"><br>SIGN UP<br></h1> <hr style="height:2px;">
        <form class="form-block" action="register1.php" method="post">
            
            <p style="color:orange;">Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p style="color:orange;">Password</p>
            <input type="password" name="password" placeholder="Enter your Password">
            <p style="color:orange;">Confirm Password</p>
            <input type="password" name="confirmpassword" placeholder="Enter your Password">
            <input type="submit" name="createaccount" value="Submit"><br>
            <p style="color:orange;">Already have an account</p><br>
          <a id="link" href="login.php" style="color:red">Login</a>
        </form>

    			
    		</div>
    		<div class="col-sm-3">
    			
    		</div>
    	</div>
    	
    </div>


</body>

</html>