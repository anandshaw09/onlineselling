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
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Signup page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>

<body>
    <div class="login-block">
        <img src="usericon.jpg">
        <h1><br>SIGN UP<br></h1>
        <form class="form-block" action="r.php" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your Password">
            <p>Confirm Password</p>
            <input type="password" name="confirmpassword" placeholder="Enter your Password">
            <input type="submit" name="createaccount" value="Submit"><br>
            <p>Already have an account</p><br>
            <a id="link" href="login.php">Login</a>
        </form>


    </div>



</body>

</html>