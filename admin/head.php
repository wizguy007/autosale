<?php
	session_start();
	include_once "../server/connection.php";
	include_once "../include/function.php";

	if (!isset($_SESSION['admin_id'])) {
		echo "<script>window.location.replace('login.php')</script>";
	}

	$sql = "SELECT * FROM `admin` WHERE `admin_id`='".$_SESSION['admin_id']."'";
    $query = mysqli_query($db , $sql);
    $fetch = mysqli_fetch_assoc($query);
    $FULLNAME = $fetch['admin_fullname'];

?>