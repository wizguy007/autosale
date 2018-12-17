<?php
	include_once "header.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}

	$cartid = $_GET['cartid'];

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
<div class="col-md-6">
<form id="checkout_form" method="POST" action="check.php">

	<input type="hidden" value="<?php echo $cartid ;?>" name="cartid">
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

		<div class="form-group col-md-12" style="height: 60px;">
			<div class="col-md-5 col-xs-6" style="padding-left: 0px; float: left;">
				<label for="edate">Expire Date</label>
				<input id="edate" class="form-control" type="text" name="edate" readonly="readonly" placeholder="Expire Date" required="required">
			</div>
		


			<div class="col-md-5 col-xs-4" style="padding-left: 0px;float: right;">
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
	$("#edate").datepicker({
	 viewMode: 'years',
     format: 'mm/yy'
	});



</script>