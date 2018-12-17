<?php
	include_once 'head.php';

	if (isset($_POST['insubmit'])) {
		
		$scm = $_POST['scm'];
		$cbn = $_POST['cbn'];
		
		$cbp = $_POST['cbp'];
		$cbd = $_POST['cbd'];

		$caridd = $_POST['caridd'];


		if($imagename = $_FILES['cbpic']['name']){
			$folder = "../../assest/img/r_car/";
			$allowed = array("jpg","jpeg");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed)) {
				$fcar = preg_replace('/\s+/','_', $cbn);
				$newname = $fcar.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cbpic']['tmp_name'], $path);


			 	$sql = "UPDATE `r_cars` SET `rcar_name`='".$cbn."',`rcat_id`='".$scm."',`rcar_img`='".$newname."',`rcar_desc`='".$cbd."',`rcar_price`='".$cbp."' WHERE `rcar_id`='".$caridd."'";
				
				$query = mysqli_query($db , $sql);

				if ($query) {
       				echo "<script>window.location.replace('../viewrentcars.php')</script>";
       			}else{
       				echo "Error while Inserting Information";
       			}
       		}else{
       			echo "ONLY JPEG AND JPG PICTURE FORMATE ALLOWED";
       		}	
		}else{
			$sql = "UPDATE `r_cars` SET `rcar_name`='".$cbn."',`rcat_id`='".$scm."',`rcar_desc`='".$cbd."',`rcar_price`='".$cbp."' WHERE `rcar_id`='".$caridd."'";
			$query = mysqli_query($db , $sql);

			if ($query) {
       			echo "<script>window.location.replace('../viewrentcars.php')</script>";
       		}else{
       			echo "Error while Updating Information";
       		}
		}

	}

?>