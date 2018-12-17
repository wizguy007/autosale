<?php
	include_once 'head.php';

	if(isset($_POST['update'])){
		$cmn = $_POST['cmn'];
		$cmid = $_POST['cmid'];

		if($imagename = $_FILES['cmpic']['name']){
			$folder = "../../assest/img/rent_cat/";
			$allowed = array("png");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed) && ($_FILES['cmpic']['size'] < 100000)) {
				$newname = $cmn.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cmpic']['tmp_name'], $path);


				$sql = "UPDATE `rent_cat` SET `rentcat_name`='".$cmn."',`rentcat_image`='".$newname."' WHERE `rentcat_id`='".$cmid."'";
				$query = mysqli_query($db , $sql);
				if ($query) {
       				echo "<script>window.location.replace('../viewcarmodel.php')</script>";
       			}	
			}else{
				echo "PNG pictures Only";
			}

		}else{

			$sql = "UPDATE `rent_cat` SET `rentcat_name`='".$cmn."' WHERE `rentcat_id`='".$cmid."'";
       		$query = mysqli_query($db , $sql);
       		if ($query) {
       			echo "<script>window.location.replace('../viewrcarcat.php')</script>";
       		}
		}
		
	}

	else if(isset($_POST['add'])){
		$cmn = $_POST['cmn'];
		if($imagename = $_FILES['cmpic']['name']){
			$folder = "../../assest/img/rent_cat/";
			$allowed = array("png");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed) && $_FILES['cmpic']['size'] < 100000) {
				$newname = $cmn.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cmpic']['tmp_name'], $path);

				$sql = "INSERT INTO `rent_cat`(`rentcat_id`, `rentcat_name`, `rentcat_image`) VALUES ('','".$cmn."','".$newname."')";
				$query = mysqli_query($db , $sql);
	       		if ($query) {
	       			echo "<script>window.location.replace('../viewrcarcat.php')</script>";
	       		}
			}else{
				echo "PNG pictures Only";
			}
		}
	}else{
		echo "<script>window.location.replace('../viewrcarcat.php')</script>";
	}




?>