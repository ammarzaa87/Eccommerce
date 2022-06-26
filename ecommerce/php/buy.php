<?php
include "connection.php";
session_start();




if(isset($_GET["product_id"]) && $_GET["product_id"] != "") {
    $product_id = $_GET["product_id"];
}else{
    die ("An Error has been Occurred");
}

if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "" ) {
    $user_id = $_SESSION["user_id"];
}else{
    die ("An Error has been Occurred");
}


$sql2 = "INSERT INTO `users_buy_products` (`user_id`, `product_id`) VALUES (?, ?);"; #insert user id and product id 
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ii",$user_id,$product_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
header('location: ../cart.php');

?>