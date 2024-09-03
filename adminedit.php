<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $education = $_POST["education"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    
    $filetype = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowedFormats = ["png", "jpg", "jpeg", "txt", "pdf"];

    if (!in_array($filetype, $allowedFormats)) {
        echo "<script>alert('Invalid file type');</script>";
    } elseif ($_FILES['image']['size'] > 5000000) {
        echo "<script>alert('File size exceeds limit');</script>";
    } else {
   
        $sql = "SELECT image FROM employee WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $old_image = $row['image'];

          
            $new_filename = time() . "." . $filetype;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $new_filename)) {
                $sql = "UPDATE employee SET image = '$new_filename', firstname = '$firstname', lastname = '$lastname', dob = '$dob', education = '$education', address = '$address', email = '$email', phone = '$phone' WHERE id = '$id'";

                if ($conn->query($sql)) {
                    if (!empty($old_image) && file_exists("upload/" . $old_image)) {
                        unlink("upload/" . $old_image);
                    }

                    echo "<script>alert('Details and image updated successfully');</script>";
                    header("Location: adminshow.php");
                    exit();
                } else {
                    echo "<script>alert('Database error: Could not update data');</script>";
                }
            } else {
                echo "<script>alert('Error uploading the file');</script>";
            }
        } else {
            echo "<script>alert('Record not found');</script>";
        }
    }
}


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM employee WHERE id = '$id'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    echo "<script>alert('Record not found');</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
</head>
<body>

<h2>Update Existing Record</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo ($employee['id']); ?>">
    <label>FIRST NAME</label>
    <input type="text" name="firstname" value="<?php echo ($employee['firstname']); ?>" required><br><br>
    <label>LAST NAME</label>
    <input type="text" name="lastname" value="<?php echo ($employee['lastname']); ?>" required><br><br>
    <label>DOB</label>
    <input type="date" name="dob" value="<?php echo ($employee['dob']); ?>" required><br><br>
    <label>EDUCATION QUALIFICATION</label>
    <input type="text" name="education" value="<?php echo ($employee['education']); ?>" required><br><br>
    <label>ADDRESS</label>
    <input type="text" name="address" value="<?php echo ($employee['address']); ?>" required><br><br>
    <label>EMAIL</label>
    <input type="text" name="email" value="<?php echo ($employee['email']); ?>" required><br><br>
    <label>PHONE</label>
    <input type="text" name="phone" value="<?php echo ($employee['phone']); ?>" required><br><br>
    <label>PHOTO</label>
    <input type="file" name="image" accept=".jpg,.png,.jpeg"><br><br>

    <button type="submit" name="submit">UPDATE</button>
</form>

</body>
</html>
