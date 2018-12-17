<?php
	include_once 'head.php';
	$bookingid = $_GET['bookingid'];

	$sql = "UPDATE `booking` SET`status`='YES' WHERE `booking_id`='".$bookingid."'";
    $query = mysqli_query($db , $sql);

    if ($query) {
    	echo "<script>window.location.replace('../booking.php')</script>";
    }

?>