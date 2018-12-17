<?php
	include_once 'head.php';

	if (isset($_POST['insubmit'])) {
		
		$scm = $_POST['scm'];
		$cbn = $_POST['cbn'];
		
		$cbp = $_POST['cbp'];
		$cbq = $_POST['cbq'];
		$cbd = $_POST['cbd'];

		$caridd = $_POST['caridd'];


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


			 	$sql = "UPDATE `p_brand` SET `brand_name`='".$cbn."',`brand_model`='".$scm."',`brand_image`='".$newname."',`brand_description`='".$cbd."',`brand_price`='".$cbp."',`brand_quantity`='".$cbq."' WHERE `brand_id`='".$caridd."'";
				
				$query = mysqli_query($db , $sql);

				if ($query) {
       				echo "<script>window.location.replace('../viewcarbrand.php')</script>";
       			}else{
       				echo "Error while Inserting Information";
       			}
       		}		
		}else{
			$sql = "UPDATE `p_brand` SET `brand_name`='".$cbn."',`brand_model`='".$scm."',`brand_description`='".$cbd."',`brand_price`='".$cbp."',`brand_quantity`='".$cbq."' WHERE `brand_id`='".$caridd."'";
			$query = mysqli_query($db , $sql);

			if ($query) {
       			echo "<script>window.location.replace('../viewcarbrand.php')</script>";
       		}else{
       			echo "Error while Updating Information";
       		}
		}

	}

?>