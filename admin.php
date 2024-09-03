<?php
include "connection.php";

if(isset($_POST['submit'])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $education = $_POST["education"];
    $address= $_POST["address"];
    $email = $_POST["email"];
    $phone= $_POST["phone"];
   
    
    $format = ["png", "jpg", "jpeg","txt","pdf"];
    

    $filetype= strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
    if(!in_array($filetype, $format)){
        echo "<script>alert('Invalid file type');</script>";
    }
    elseif($_FILES['image']['size']>5000000){
        echo "<script>alert('file over limit');</script>";
    }
     else{
        $filename=time().".".$filetype;
        if(move_uploaded_file ($_FILES['image']['tmp_name'], "upload/".$filename)){
            $sql="INSERT INTO employee(firstname,lastname,dob,education,address,email,phone,image)VALUES('$firstname','$lastname','$dob','$education','$address','$email','$phone','$filename')";
            if($conn->query($sql)){
                echo "<script>alert('Successfully uploaded');</script>";
                header('location:admindashboard.php');
                
            } else {
                echo "<script>alert('Database error');</script>";
            }
        } else {
            echo "<script>alert('File upload error');</script>";
        }
        }
         }





?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT FORM</title>
</head>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
           
            margin-top:30px;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            display: block;
            
            font-weight: bold;
            text-align:center;
            
        }

        input[type="text"],
        input[type="file"]
       {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
 input[type="date"]{
    width: 95%;
    padding: 10px;
 }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
       
    </style>
<body>
<a href="admindashboard.php"><button class="btn">BACK</button></a>

<form action="" method="post" enctype="multipart/form-data">
    
    <label>FIRST NAME</label>
    <input type="text" name="firstname" required><br><br>
    <label>LAST NAME</label>
    <input type="text" name="lastname" required><br><br> 
    <label>DOB</label>
    <input type="date" name="dob" required><br><br>
    <label>EDUCATION QUALIFICATION</label>
    <input type="text" name="education" required><br><br>  
    <label>ADDRESS</label>
    <input type="text" name="address" required><br><br> 
    <label>EMAIL</label>
    <input type="text" name="email" required><br><br>  
    <label>PHONE</label>
    <input type="text" name="phone" required><br><br>  
    <label>PHOTO</label>
    <input type="file" name="image" accept=".jpg,.png,.jpeg" required><br><br> 
   
    <button type="submit" name="submit">SUBMIT</button>
</form>
</body>
</html>
