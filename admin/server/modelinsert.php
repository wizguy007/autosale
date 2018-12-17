<?php
	include_once 'head.php';

	if(isset($_POST['update'])){
		$cmn = $_POST['cmn'];
		$cmid = $_POST['cmid'];

		if($imagename = $_FILES['cmpic']['name']){
			$folder = "../../assest/img/model/";
			$allowed = array("png");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed) && ($_FILES['cmpic']['size'] < 100000)) {
				$newname = $cmn.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cmpic']['tmp_name'], $path);

				$sql = "UPDATE `p_model` SET `model_name`='".$cmn."',`model_image`='".$newname."' WHERE `model_id`='".$cmid."'";
				$query = mysqli_query($db , $sql);
				if ($query) {
       				echo "<script>window.location.replace('../viewcarmodel.php')</script>";
       			}
				
			}else{
				echo "PNG pictures Only";
			}

		}else{
			$sql = "UPDATE `p_model` SET `model_name`='".$cmn."' WHERE `model_id`='".$cmid."'";
       		$query = mysqli_query($db , $sql);
       		if ($query) {
       			echo "<script>window.location.replace('../viewcarmodel.php')</script>";
       		}
		}
		

	}else if(isset($_POST['add'])){
		$cmn = $_POST['cmn'];
		if($imagename = $_FILES['cmpic']['name']){
			$folder = "../../assest/img/model/";
			$allowed = array("png");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed) && $_FILES['cmpic']['size'] < 100000) {
				$newname = $cmn.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cmpic']['tmp_name'], $path);

				$sql = "INSERT INTO `p_model`(`model_id`, `model_name`, `model_image`) VALUES ('','".$cmn."','".$newname."')";
				$query = mysqli_query($db , $sql);
	       		if ($query) {
	       			echo "<script>window.location.replace('../viewcarmodel.php')</script>";
	       		}
			}else{
				echo "PNG pictures Only";
			}
		}
	}else{
		echo "<script>window.location.replace('../viewcarmodel.php')</script>";
	}




?>