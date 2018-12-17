<?php
	if(isset($_SESSION['id'])){

		$sql = "SELECT * FROM `user` WHERE `user_id`=".$_SESSION['id']."";
		$query = mysqli_query($db , $sql);
		$row = mysqli_num_rows($query);

		if($row == 1){
			$fetch = mysqli_fetch_assoc($query);
				$_ID = $fetch['user_id'];
				$_USERNAME = $fetch['user_username'];
			
		}else{
			exit();
		}

	}
?>