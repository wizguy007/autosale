<?php
	$sql = "SELECT * FROM `p_model` ORDER BY `p_model`.`model_name` ASC  ";
	$query = mysqli_query($db,$sql);
	while($fetch = mysqli_fetch_assoc($query)){
		//echo $fetch['model_name'];
		$image = "<img id='carlogo' src='assest/img/model/".$fetch['model_image'] ."' />";
		echo"<div class='col-md-3 col-xs-6 modellist'><a href='model.php?carmodel=".$fetch['model_name']."'>".
			$image." <p><span id='carloganme'>". $fetch['model_name']
			."</span></p></a></div>";
	}
?>