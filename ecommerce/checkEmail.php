<?php
require_once("../connection.php");

$userEmail = $_GET['email'];

$checkEmail=mysqli_query($connection, "SELECT email from users WHERE email='$userEmail'");

if (mysqli_num_rows($checkEmail) == 1) {
  $response = true;
} else {
  $response = false;
}

echo json_encode($response);
?>