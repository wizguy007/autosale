<?php
	include_once "header.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}
?>

<section id="main">
	<section class="container">
		<div class="ordersent">
			<img  src="assest/img/003.png">
			<p><b>Your Order Has Been Sent Successfully. Wait For 24 hrs Before It Is Been Approved</b></p>
		</div>
	</section>
</section>

<?php
	include_once "footer.php";
?>