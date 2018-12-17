<?php
	session_start();
	include_once "../../server/connection.php";
	include_once "../../include/function.php";

	if (!isset($_SESSION['admin_id'])) {
		echo "<script>window.location.replace('../login.php')</script>";
	}

?>