<?php
	include_once 'head.php';

	if (isset($_POST['insubmit'])) {
		
		$scm = $_POST['scm'];
		$cbn = $_POST['cbn'];
		
		$cbp = $_POST['cbp'];
		$cbq = $_POST['cbq'];
		$cbd = $_POST['cbd'];


		if($imagename = $_FILES['cbpic']['name']){
			$folder = "../../assest/img/brand/";
			$allowed = array("jpg","jpeg");
			$expl = explode('.', $imagename);
			$ext = end($expl);

			if (in_array($ext, $allowed)) {
				$fcar = preg_replace('/\s+/','_', $cbn);
				$newname = $fcar.".".$ext;
				$path = $folder."".$newname;
				move_uploaded_file($_FILES['cbpic']['tmp_name'], $path);


			 $sql = "INSERT INTO `p_brand`(`brand_id`, `brand_name`, `brand_model`, `brand_image`, `brand_description`, `brand_price`, `brand_quantity`) 
			 	  VALUES
				 ('','".$cbn."','".$scm."','".$newname."','".$cbd."','".$cbp."','".$cbq."')";
				
				$query = mysqli_query($db , $sql);

				if ($query) {
       				echo "<script>window.location.replace('../viewcarbrand.php')</script>";
       			}else{
       				echo "Error while Inserting Information";
       			}
       		}else{
       			echo "Only JPEG AND JPG Pictures Allowed";
       		}		
		}
	}

?>