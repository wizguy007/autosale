<?php
	include_once "header.php";

	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}


	if(isset($_POST['bill'])){
		echo "yes";

		$address = $_POST['address'];
		$pcode = $_POST['pcode'];
		$pnumber = $_POST['pnumber'];
		$user_id = $_ID;

		$sql = "SELECT * FROM `billing_info` WHERE `user_id`='".$user_id."'";
		$query = mysqli_query($db , $sql);
		$row = mysqli_num_rows($query);

		if($row == 1){
			$sql = "UPDATE `billing_info` SET `billing_add`='".$address."',`postal_code`='".$pcode."',`phone_number`='".$pnumber."' WHERE `user_id`='".$user_id."'";
			$query = mysqli_query($db , $sql);

			if($query){
				$billmsg = "Information Updated Successfully" ;
			}else{
				$billmsg = "Error Occur While Updating Information" ;
			}

		}else{

			$sql = "INSERT INTO `billing_info`(`billing_id`, `user_id`, `billing_add`, `postal_code`, `phone_number`) 
					VALUES
			 		('','".$user_id."','".$address."','".$pcode ."','".$pnumber."')";
			$query = mysqli_query($db , $sql);

			if($query){
				$billmsg = "Information Inserted Successfully" ;
			}else{
				$billmsg = "Error Occur While Inserting Information" ;
			}

		}
	$passmsg = "";

	}else if(isset($_POST['pass'])){

		$cpass = $_POST['cpass'];
		$npass = $_POST['npass'];
		$user_id = $_ID;

		$sql = "SELECT * FROM `user` WHERE `user_id`='".$user_id."'";
		$query = mysqli_query($db , $sql);
		$fetch = mysqli_fetch_assoc($query);

		$ppass = $fetch['user_password'];
		
			if($cpass == $ppass){

				$sql = "UPDATE `user` SET `user_password`='".$npass."' WHERE `user_id`='".$user_id."'";
				$query = mysqli_query($db , $sql);
				if($query){
					$passmsg = "Password Updated Successfully";
				}else{
					$passmsg = "An error occur while Updating password";
				}

			}else{
				$passmsg = "Incorrect Password";
			}

		$billmsg = "";
	}else{
		$billmsg = "";
		$passmsg = "";
	}







	$sql = "SELECT * FROM `billing_info` WHERE `user_id`='".$_ID."'";
	$query = mysqli_query($db , $sql);
	$row = mysqli_num_rows($query);

	if($row == 1){
		$fetch = mysqli_fetch_assoc($query);

		$billing_add = $fetch['billing_add'];
		$postal_code = $fetch['postal_code'];
		$phone_number =$fetch['phone_number'];
	}else{
		$billing_add = "";
		$postal_code = "";
		$phone_number = "";
	}
?>

<section id="main">
	<div class="container" style="margin-top: 20px;margin-bottom: 20px;">
		<div class="col-md-12 update">
			<div class="col-md-5" style="margin-bottom: 20px;">
			<form id="checkout_form" method="POST">
				<input type="hidden" name="bill">
				<div class="billing">
					<div class="tittle col-md-12">Update Billing Information</div>
						<div class="form-group">
							<label for="address">Billing Address</label>
							<textarea style="height: 90px;resize: none;" id="address" class="form-control" type="text" name="address" placeholder="Enter billing address" required="required"><?php echo $billing_add ;?></textarea>
						</div>

						<div class="form-group">
							<label for="pcode">Postal code</label>
							<input style="width: 135px;" id="pcode" class="form-control" type="text" name="pcode" placeholder="Postal Code" value="<?php echo $postal_code;?>" required="required">
						</div>

						<div class="form-group">
							<label for="pnumber">Phone Number</label>
							<input id="pnumber" class="form-control" type="text" name="pnumber" placeholder="Enter Phone Number" value="<?php echo $phone_number ;?>" required="required">
						</div>

						<div class="col-md-5">
							<button type="Submit" class="form-control btn btn-default">Update Billing Info</button>
							<?php echo $billmsg?>
						</div>
				</div>
			</form>
			</div>




			<div class="col-md-5 deldel">
			<form id="pass_form" method="POST" autocomplete="off">
			<input type="hidden" name="pass">
			<div class="password">
					<div class="tittle col-md-12"> Update Password</div>
						<div class="form-group">
							<label for="cpass">Enter Current Password</label>
							<input id="cpass" class="form-control" type="password" name="cpass" placeholder="Enter Old Password"  required="required" autocomplete="off">
						</div>

						<div class="form-group">
							<label for="npass">Enter new Password</label>
							<input id="npass" class="form-control" type="password" name="npass" placeholder="Enter New Password"  required="required">
						</div>

						<div class="col-md-5">
							<button type="Submit" class="form-control btn btn-default">Update Password</button>
							<?php echo $passmsg;?>
						</div>
				</div>
			</form>
			</div>


		</div>
	</div>
</section>


<?php
	include_once "footer.php";
?>