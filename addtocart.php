<?php
	include_once "head.php";

if(isset($_SESSION['id'])){
	$proid = $_POST['proid'];

	$sql = "SELECT * FROM `cart` WHERE `user_id`=".$_ID." AND `product_id`=".$proid."";
	
	$query = mysqli_query($db, $sql);


	if(mysqli_num_rows($query) > 0){
		$fetch = mysqli_fetch_assoc($query);
		$quan = $fetch['quantity'];
		$quan = $quan + 1;

		$sql = "UPDATE `cart` SET `quantity`=".$quan."  WHERE `user_id`=".$_ID." AND `product_id`=".$proid."";
		$query = mysqli_query($db, $sql);
		echo (1);
	}else{

		$sql = "SELECT * FROM `p_brand` WHERE `brand_id`=".$proid."";
		$query = mysqli_query($db, $sql);
		$fetch = mysqli_fetch_assoc($query);
		$price = $fetch['brand_price'];
		$quan = 1;

		$sql = " INSERT INTO `cart`(`cart_id`, `user_id`, `product_id`, `quantity`, `price`) VALUES ('', ".$_ID." ,".$proid.",".$quan.",".$price.")";
		$query = mysqli_query($db, $sql);
		if($query){
			echo (2);
		}else{
			echo (3);
		}
	}
}else{
	echo (0);
}

?>