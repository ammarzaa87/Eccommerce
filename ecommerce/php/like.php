<?php
include "connection.php";
session_start();
$u_id = $_SESSION['user_id'];
$p_id = $_GET['product_id'];
$s_id = $_SESSION['s_id'];

$sql1="Select * from likes where user_id=? and product_id=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ii",$u_id,$p_id);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
/* if he didn't like yet insert his like*/

if(empty($row)){
$sql2 = "INSERT INTO `likes` (`user_id`, `product_id`) VALUES (?, ?);"; #add likes to database
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ii",$u_id,$p_id);
$stmt2->execute();
header("location: ../product.php?s_id=$s_id");
}
/* if he has liked and press like again delete like*/
else{
$sql3 = "DELETE FROM `likes` where user_id=? and product_id=?"; #add likes to database
$stmt3 = $connection->prepare($sql3);
$stmt3->bind_param("ii",$u_id,$p_id);
$stmt3->execute();
header("location: ../product.php?s_id=$s_id");
}


?>