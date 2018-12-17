<?php
	include_once "head.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}
?>


<?php

	$cnumber = $_POST['cnumber'];
	$edate = $_POST['edate'];
	$cvc = $_POST['cvc'];
	$cholder = $_POST['cholder'];
/*-------------------------------------------------*/

	$cartid = $_POST['cartid'];
	$paymethod = $_POST['paymethod'];
	$address = $_POST['address'];
	$pcode = $_POST['pcode'];
	$pnumber = $_POST['pnumber'];
	$user_id = $_ID;


	$sql = "SELECT * FROM `cart` WHERE `cart_id`=".$cartid."";
	$query = mysqli_query($db , $sql);
	$fetch = mysqli_fetch_assoc($query);

	$product_id = $fetch['product_id'];
	$quantity = $fetch['quantity'];
	$price = $fetch['price'];

	$price = $price * $quantity;


	$sql = "INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `quantity`, `price`, `payment_method`, `billing_add`, `postal_code`, `phone_number`, `status`)
	 VALUES 
	 ('','".$user_id."','".$product_id."','".$quantity."','".$price."','".$paymethod."','".$address."','".$pcode."','".$pnumber."','NO')";

	 $query = mysqli_query($db , $sql);

	 if($query){
	 	$sql = "DELETE FROM `cart` WHERE `cart_id`='".$cartid."'";
	 	$query = mysqli_query($db , $sql);
	 	echo "<script>window.location.replace('print.php')</script>";
	 }else{
	 	echo "Error occur while checking out goods";
	 	sleep(2);
	 	echo "<script>window.location.replace('cart.php')</script>";
	 }

?>