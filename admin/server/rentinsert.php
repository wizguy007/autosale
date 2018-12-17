<?php
	include_once 'head.php';

	if (isset($_POST['insubmit'])) {
		
		$scm = $_POST['scm'];
		$cbn = $_POST['cbn'];
		$cbp = $_POST['cbp'];
		$cbd = $_POST['cbd'];


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

				$sql = "INSERT INTO `r_cars`(`rcar_id`, `rcar_name`, `rcat_id`, `rcar_img`, `rcar_desc`, `rcar_price`) VALUES 
				('','".$cbn."','".$scm."','".$newname."','".$cbd."','".$cbp."')";

				$query = mysqli_query($db , $sql);

				if ($query) {
       				echo "<script>window.location.replace('../viewrentcars.php')</script>";
       			}else{
       				echo "Error while Inserting Information";
       			}
       		}else{
       			echo "Only JPEG AND JPG Pictures Allowed";
       		}		
		}
	}

?>