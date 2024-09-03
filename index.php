<?php
session_start();
include "connection.php";

if(isset($_POST['login'])){

     $username=$_POST['username'];
    $password=$_POST['password'];

    $error = array();
    if (empty($username)){
        $error['login'] ="Enter username";
    }
    elseif (empty($password)){
        $error['login'] ="Enter password";
    }
       if(count($error)==0){
        $query ="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result =mysqli_query($conn,$query);

        if (mysqli_num_rows($result)== 1){
            echo "<script> alert('you have login succesfully')</script>";
            header('location:admindashboard.php');
        

           
        }
        else{
            echo "<script>alert('Invalid username or password')</script>";
        }}}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    
</head>
<style>
    body{
        background-color:black;
    }
    .container {
	max-width: 450px;
	margin: 50px auto;
	padding: 20px;
	background-color:skyblue;
	border: 1px solid red;
	box-shadow: 0 0 10px black;
}
body{
    background-image: url(login.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    
}
.logo{
    width:200px;
    height:100px;
    margin-left:100px;
}
.head {
	text-align: center;
	margin-bottom: 20px;
}

form div {
	margin-bottom: 20px;
}

label {
	display: block;
	margin-bottom: 10px;
    text-align: center;
    font-size: 25px;
}

input {
	width: 90%;
	padding: 10px;
	margin-bottom: 20px;
	border: 1px solid red;
    border-radius: 10px;
}

button {
	width: 100%;
	padding: 10px;
	background-color:green;
	color: white;
	border: none;
	cursor: pointer;
    font-size: 22px;
    border-radius: 20px;
}

button:hover {
	background-color:blue;
}

</style>
<body>
<form method="post" >
    
    <div col-md-6 class="container">
          <h1 class="head">LOGIN PAGE</h1>
         
         <div>
          <label>USERNAME:</label>
          <input type="text" name="username"placeholder="enter username" Required>

         </div><br><br>
         <div>
          <label>PASSWORD:</label>
          <input type="password" name="password"placeholder="enter password" Required>

         </div><br><br>
         <div>
           <a href=""><button name="login">LOGIN</button></a>
           
        
         </div>

    </div>
    
</div>

    </form>
</body>
</html>