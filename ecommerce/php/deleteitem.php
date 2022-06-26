<?php
require_once 'connection.php';
$item_id=$_GET['item_id'];
$query="delete from products where id=$item_id";
if(mysqli_query($connection, $query))
{
header("location: ../admin.php");
}
else
{
echo "deletion error";
}
?>

