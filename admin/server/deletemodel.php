<?php
	
include_once 'head.php';

if (isset($_GET['modelid'])) {
		
	$modelid = $_GET['modelid'];
	echo $modelid;

	$sql = "DELETE FROM `p_model` WHERE `model_id`='".$modelid."'";
	$query = mysqli_query($db , $sql);

	if ($query) {
		echo "<script>window.location.replace('../viewcarmodel.php')</script>";
	}
}

?>