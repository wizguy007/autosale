<?php
	include_once "head.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}
?>


<?php
	$rcarid = $_POST['rcarid'];
	$nod = $_POST['nod'];
	$user_id = $_ID;

/*-------------------------------------------------*/
	$paymethod = $_POST['paymethod'];
	$cnumber = $_POST['cnumber'];
	$edate = $_POST['edate'];
	$cvc = $_POST['cvc'];
	$cholder = $_POST['cholder'];

/*-------------------------------------------------*/
	
	$address = $_POST['address'];
	$pcode = $_POST['pcode'];
	$pnumber = $_POST['pnumber'];


	$sql = "SELECT * FROM `r_cars` WHERE `rcar_id`=".$rcarid."";
	$query = mysqli_query($db , $sql);
	$fetch = mysqli_fetch_assoc($query);

	$price = $fetch['rcar_price'];

	$price = $price * $nod;


	$sql = "INSERT INTO `booking`(`booking_id`, `user_id`, `rprod_id`, `nod`, `price`, `payment_method`, `billing_add`, `postal_code`, `phone_number`, `status`)
	 VALUES 
	 ('','".$user_id."','".$rcarid."','".$nod."','".$price."','".$paymethod."','".$address."','".$pcode."','".$pnumber."','NO')";

	 $query = mysqli_query($db , $sql);

	 if($query){
	 	echo "<script>window.location.replace('print.php')</script>";
	 }else{
	 	echo "Error occur while checking out goods";
	 	sleep(2);
	 	echo "<script>window.location.replace('renthp.php')</script>";
	 }

?>