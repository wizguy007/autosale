<?php
	include_once 'head.php';
	$orderid = $_GET['orderid'];

	$sql = "UPDATE `orders` SET`status`='YES' WHERE `order_id`='".$orderid."'";
    $query = mysqli_query($db , $sql);

    if ($query) {
    	echo "<script>window.location.replace('../order.php')</script>";
    }

?>