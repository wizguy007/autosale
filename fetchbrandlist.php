<?php

	include_once "server/connection.php";

	$id =$_POST['id'];
	$sql = "SELECT * FROM `p_brand` WHERE `brand_model`='".$id."' ORDER BY `p_brand`.`brand_name` ASC ";
	$query = mysqli_query($db , $sql);
	if($query){
	$output = "<option value='none'>--------------------------- Select Car Model ---------------------------</option>";

	while($fetch = mysqli_fetch_assoc($query)){
		$modelid = $fetch['brand_id'];
		$modelname = $fetch['brand_name'];

		$output.= "<option value='".$modelid."'>".$modelname."</option>";
	}

	echo $output;
}
?>