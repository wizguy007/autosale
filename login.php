<?php
	include_once "header.php";
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `user` WHERE `user_username`='".$username."' OR `user_email`='".$username."'";
		$query = mysqli_query($db , $sql);
		$row = mysqli_num_rows($query);
		if($row == 1){
			$fetch = mysqli_fetch_assoc($query);
				$_id = $fetch['user_id'];
				$_password = $fetch['user_password'];

			if($_password == $password){
				$_SESSION['id'] = $_id;
				echo "<script>window.location.replace('index.php')</script>";
			}else{
				$login_error_msg = "Account Details is Incorrect";
			}
			
		}else{
			$login_error_msg = "Account Details is Incorrect";
		}
	}


	if(isset($_POST['create'])){
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];

		$sql = "SELECT * FROM `user` WHERE `user_username`='".$username."'";
		$query = mysqli_query($db , $sql);
		$row = mysqli_num_rows($query);
		if($row == 0){
			$sql = "SELECT * FROM `user` WHERE `user_email`='".$email."'";
			$query = mysqli_query($db , $sql);
			$row = mysqli_num_rows($query);
			
			if($row == 0){
				$sql = "INSERT INTO `user`(`user_id`, `user_fullname`, `user_username`, `user_email`, `user_password`, `user_dob`, `user_gender`) VALUES ('','".$fullname."','".$username."','".$email."','".$password."','".$dob."','".$gender."')";
				$query = mysqli_query($db , $sql);
				if($query){
					
					$sql = "SELECT * FROM `user` WHERE `user_username`='".$username."' OR `user_email`='".$username."'";
					$query = mysqli_query($db , $sql);
					$row = mysqli_num_rows($query);
					if($row == 1){
						$fetch = mysqli_fetch_assoc($query);
							$_id = $fetch['user_id'];
							$_password = $fetch['user_password'];

						if($_password == $password){
							$_SESSION['id'] = $_id;
							echo "<script>window.location.replace('index.php')</script>";
						}else{
							$login_error_msg = "Account Details is Incorrect";
						}
						
					}else{
						$login_error_msg = "Account Details is Incorrect";
					}
				}else{
					$signup_error_msg = "An error occur while signing up, try again later";
				}
			}else{
				$signup_error_msg = "OOPS! Sorry E-mail already exist";
			}
		}else{
			$signup_error_msg = "OOPS! Sorry Username already exist";
		}

	}
?>



























<section id="main">
	<section class="container" style="margin-top: 15px;">
		<div class="col-md-4" id="loginform">
		<div class="tittle col-md-12">Login</div>
			<p>
				<?php
					if(isset($login_error_msg)){
						echo $login_error_msg;
					}
				?>
			</p>
			<form method="post" autocomplete="off">
				<div class="form-group">
					<label for="username">Username or E-mail</label>
					<input class="form-control" id="username" type="text" name="username" placeholder="Enter username or password" required="required" pattern="[A-Za-z@?.?]{8,}" title="Only letters min 0f 8">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Enter password" required="required" pattern=".{6,}" title="Six or more characters">
				</div>

				<div class="form-group">
					<div class="col-md-5">
						<button type="submit" class="form-control btn btn-default" name="login">Login</button>
					</div>
				</div>
			</form>
		</div>







		<div class="col-md-6" id="signupform">
			<div class="tittle col-md-12">Create New Account</div>
			<p>
				<?php
					if(isset($signup_error_msg)){
						echo $signup_error_msg;
					}
				?>
			</p>
			<form method="post">

				<div class="form-group">
					<label for="fullname">Fullname</label>
					<input class="form-control" id="fullname" type="text" name="fullname" placeholder="Enter Your Fullname" required="required" pattern="[A-Za-z ]{8,}" title="Only letters min 0f 8 with whitespace">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" id="username" type="text" name="username" placeholder="Enter Your username" required="required" pattern="[A-Za-z]{8,}" title="Only letters min 0f 8">
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" id="email" type="E-mail" name="email" placeholder="Enter Your E-mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				</div>

				<div class="form-group">
					<label for="signpassword">Password</label>
					<input class="form-control" id="signpassword" type="password" name="password" placeholder="Enter password" required="required" pattern=".{6,}" title="Six or more characters">
				</div>

				<div class="form-group">
					<label for="sign_conpassword">Re-Enter Password</label>
					<input class="form-control" id="sign_conpassword" type="password" name="conpassword" placeholder="Re-Enter password" required="required">
				</div>

				<div class="form-group">
					<label for="dob">Date of birth</label>
					<input class="form-control" id="dob" type="text" readonly="readonly" name="dob" placeholder="Enter Date of Birth" required="required">
				</div>

				<div class="form-group">
					<label for="gender">Select Gender</label>
					<select class="form-control" id="gender" name="gender" required="required">
						<option value="none">---Select Gender---</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>

				<div class="form-group">
					<div class="col-md-5">
						<button type="submit" class="form-control btn btn-default" name="create">Create Account</button>
					</div>
					
				</div>
			</form>
		</div>
	</section>
</section>

<?php
	include_once "footer.php";
?>

<script type="text/javascript">
	$("#dob").datepicker({ format: 'yyyy-mm-dd', startDate: '-3d' });

	var password = document.getElementById("signpassword");
    var confirm_password = document.getElementById("sign_conpassword");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

</script>