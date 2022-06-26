<?php

include "connection.php";
session_start();
$s_id = $_GET['s_id'];

$p_id = $_GET['p_id'];
if(isset($_POST["name"]) && $_POST["name"] != "") {
    $name = $_POST["name"];
}else{
    die ("a Enter a valid input");
}
if(isset($_POST["price"]) && $_POST["price"] != "") {
    $price = $_POST["price"];
}else{
    die ("a Enter a valid input");
}
if(isset($_POST["size"]) && $_POST["size"] != "") {
    $size = $_POST["size"];
}else{
    die ("b Enter a valid input");
}

if(isset($_POST["quantity"]) && $_POST["quantity"] != "") {
    $quantity = $_POST["quantity"];
}else{
    die ("c Enter a valid input");
}
if(isset($_POST["description"]) && $_POST["description"] != "") {
    $description = $_POST["description"];
}else{
    die ("c Enter a valid input");
}

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";
	$s_id = $_GET['s_id'];
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: admin.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "UPDATE `products` SET `name`='$name',`price`='$price',`size`='$size',`quantity`='$quantity',`image`='$new_img_name',`details`='$description',`store_id`='$s_id' 
				WHERE id='$p_id'"; 
				        
				mysqli_query($connection, $sql);
				header("Location: ../admin.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: admin.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: admin.php?error=$em");
	}

}else {
	header("Location: store_info.php?");
}
?>
