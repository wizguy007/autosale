<?php
	include_once "head.php";

	if(isset($_POST['cartid'])){
		$user_id = $_ID;
		$cart_id = $_POST['cartid'];
		$new_quan = $_POST['newquan'];


		$sql = "UPDATE `cart` SET `quantity`='".$new_quan."' WHERE `cart_id`='".$cart_id."' AND `user_id`='".$user_id."' ";
		$query = mysqli_query($db , $sql);

		if($query){
			echo "<script>window.location.replace('cart.php')</script>";
		}else{
			echo "<script>window.location.replace('index.php')</script>";
		}
	}
?>