<?php
	$sql = "SELECT * FROM `p_model` ORDER BY `p_model`.`model_name` ASC ";
	$query = mysqli_query($db , $sql);

	$output = "<option value='none'>--------------------------- Select Car Model ---------------------------</option>";

	while($fetch = mysqli_fetch_assoc($query)){
		$modelid = $fetch['model_id'];
		$modelname = $fetch['model_name'];

		$output.= "<option value='".$modelid."'>".$modelname."</option>";
	}

	echo $output;
?>