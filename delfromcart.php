<?php
	include_once "head.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}

	if(isset($_GET['cartid'])){
		$user_id = $_ID;
		$cart_id = $_GET['cartid'];


		$sql = "DELETE FROM `cart` WHERE `cart_id`='".$cart_id."' AND `user_id`='".$user_id."' ";
		$query = mysqli_query($db , $sql);

		if($query){
			echo "<script>window.location.replace('cart.php')</script>";
		}else{
			echo "<script>window.location.replace('index.php')</script>";
		}
	}
?>