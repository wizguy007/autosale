<?php
function substr_word($body,$maxlength){
    if (strlen($body)<$maxlength) return $body;
    $body = substr($body, 0, $maxlength);
    $rpos = strrpos($body,' ');
    if ($rpos>0) $body = substr($body, 0, $rpos);
    return $body;
}


function username($db , $id){
	$sql = "SELECT * FROM `user` WHERE `user_id`=".$id."";
	$query = mysqli_query($db , $sql);
	$row = mysqli_num_rows($query);
	$fetch = mysqli_fetch_assoc($query);
	$fullname = $fetch['user_username'];
	return $fullname;
}

function email($db , $id){
	$sql = "SELECT * FROM `user` WHERE `user_id`=".$id."";
	$query = mysqli_query($db , $sql);
	$row = mysqli_num_rows($query);
	$fetch = mysqli_fetch_assoc($query);
	$fullname = $fetch['user_email'];
	return $fullname;
}

function fullname($db , $id){
	$sql = "SELECT * FROM `user` WHERE `user_id`=".$id."";
	$query = mysqli_query($db , $sql);
	$row = mysqli_num_rows($query);
	$fetch = mysqli_fetch_assoc($query);
	$fullname = $fetch['user_fullname'];
	return $fullname;
}





function productname($db , $id){
	$sqll = "SELECT * FROM `p_brand` WHERE `brand_id`='".$id."'";
	$queryy = mysqli_query($db , $sqll);
	$get = mysqli_fetch_assoc($queryy);

	$pname = $get['brand_name'];
	return $pname;
}

function rprodname($db , $id){
	$sqll = "SELECT * FROM `r_cars` WHERE `rcar_id`='".$id."'";
	$queryy = mysqli_query($db , $sqll);
	$get = mysqli_fetch_assoc($queryy);

	$pname = $get['rcar_name'];
	return $pname;
}

?>