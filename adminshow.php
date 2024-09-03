<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          h1{
            text-align:center;
        }
       table{
        margin:auto;
       }
       .btn{
        float: right;
        width: 100px;
        height:30px;
       }

    </style>
</head>
<body>
    <h1>STUDENT DETAILS VIEW</h1>
    <a href="admindashboard.php"><button class="btn">BACK</button></a>
    
    <table class="table" border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>employeeid</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>dob</th>
                <th>education</th>
                <th>address</th>
                <th>email</th>
                <th>phone</th>
                <th>photo</th>
                <th colspan="2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * from employee";
            $result =$conn->query($sql);
             $i=0;
            while($row=$result->fetch_assoc()){
                $i++;
                echo "
                 <tr>
                    <td>{$i}</td>
                    <td>{$row['firstname']}</td>
                      <td>{$row['lastname']}</td>
                        <td>{$row['dob']}</td>
                          <td>{$row['education']}</td>
                            <td>{$row['address']}</td>
                              <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                  
                                  
                    <td><img src='upload/{$row['image']}' style='height:100px; width:100px'></td>
                                        <td><a href='adminedit.php?id={$row['id']}'>Edit</a></td>

                                                            <td><a href='admindelete.php?id={$row['id']}'>Delete</a></td>

                  
                    
                     
                </tr>
               
                
                
                
               
                
                
                
                
                
                ";

            }



?>


          
        </tbody>
    </table>
</body>
</html>
