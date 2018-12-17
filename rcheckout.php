<?php
	include_once "header.php";
	if(!isset($_SESSION['id'])){

		echo "<section id='main'>
				<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
		echo "<p><b>Please login. Click here to login  ---> <a style='color:blue;' href='login.php'>LOGIN</a> </b></p></div>
				</section>";
		include_once "footer.php";

		exit();
	}


	$rcarid = $_GET['rcarid'];

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

	$sql = "SELECT * FROM `r_cars` WHERE `rcar_id`='".$rcarid."'";
	$query = mysqli_query($db , $sql);
	$fetch = mysqli_fetch_assoc($query);
	$pr = $fetch['rcar_price'];

?>

<section id="main">

<div class="container" style="margin-top: 20px;margin-bottom: 20px;">
<div class="col-md-6">
<form id="checkout_form" method="POST" action="rcheck.php">


		<div class="form-group" style="height: 60px;">
			<div style="width: 25%; padding-left: 0px; float: left;">
				<label for="nod">Select No of Days</label>
				<input id="nod" class="form-control" type="number" name="nod" value="1" min="1" max="7" required="required">
			</div>
		


			<div style="width: 25%; padding-left: 0px;float: right;">
				<label for="price">Price</label>
				<input id="price" disabled="disabled" class="form-control" type="text" value="<?php echo $pr ;?>" name="price" required="required">
			</div>
		</div>




	<input type="hidden" id="pricetocal" value="<?php echo $pr ;?>" required="required">
	<input type="hidden" value="<?php echo $rcarid ;?>" name="rcarid">





	<div class="checkbox">
		<div id="pmeth">Select Payment Method</div>
		<label>
			<input type="radio" value="master" id="paymethod" class="paymethod" name="paymethod" required="required"><i class="fa fa-cc-mastercard fa-3x" aria-hidden="true"></i>
		</label>

		<label>
			<input type="radio" value="visa" id="paymethod" class="paymethod" name="paymethod" required="required"><i class="fa fa-cc-visa fa-3x" aria-hidden="true"></i>
		</label>

		<label style="min-width: 117px;">
			<input type="radio" value="google" id="paymethod" class="paymethod" name="paymethod" required="required"><i class="fa fa-google-wallet fa-3x" aria-hidden="true"></i>
		</label>

		<label>
			<input type="radio" value="paypal" id="paymethod" class="paymethod" name="paymethod" required="required"><i class="fa fa-paypal fa-3x" aria-hidden="true"></i>
		</label>
		
	</div>




	<div class="payment">
		<div class="form-group">
			<label for="cnumber">Card Number</label>
			<input id="cnumber" class="form-control" type="text" name="cnumber" placeholder="Enter Card Number" required="required">
		</div>

		<div class="form-group" style="height: 60px;">
			<div class="col-md-5 col-xs-6" style=" padding-left: 0px; float: left;">
				<label for="edate">Expire Date</label>
				<input id="edate" class="form-control" type="text" readonly="readonly" name="edate" placeholder="Expire Date" required="required">
			</div>
		


			<div class="col-md-5 col-xs-4" style=" padding-left: 0px;float: right;">
				<label for="cvc">CVC</label>
				<input id="cvc" class="form-control" type="text" name="cvc" placeholder="Enter CVC" required="required">
			</div>
		</div>

		<div class="form-group">
			<label for="cholder">Card Holder</label>
			<input id="cholder" class="form-control" type="text" name="cholder" placeholder="Enter Card Holder" required="required">
		</div>
	</div>





	<div class="billing">

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
	</div>

	<button type="Submit" class="btn btn-default">Submit</button>
	<p id="msg"></p>

</form>
</div>

</div>
</section>

<?php
	include_once "footer.php";
?>


<script type="text/javascript">
	$("#nod").change(function(e) {
		var days = $(this).val();
		var price = $("#pricetocal").val();

		var total = (days * price);
		$("#price").val(total);


	});

	$("#edate").datepicker({
	 viewMode: 'years',
     format: 'mm/yy'
	});



</script>