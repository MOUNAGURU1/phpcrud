<?php

$conn = mysqli_connect("localhost", "root", "", "bees");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>