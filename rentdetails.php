<?php
	include_once "header.php";



	$rcarid = $_GET['rcarid'];
	$sql = "SELECT * FROM `r_cars` WHERE `rcar_id`='".$rcarid."'";
	$query = mysqli_query($db , $sql);
	if(mysqli_num_rows($query) == 1){
		while($fetch = mysqli_fetch_assoc($query)){
			$carid = $fetch['rcar_id'];
			$carname = $fetch['rcar_name'];
			$carimage = $fetch['rcar_img'];
			$carprice = $fetch['rcar_price'];
			$cardesc = $fetch['rcar_desc'];
			$cardesc = substr_word( $cardesc , 80);	

			$imagelink = "<img class='modimg zmimg' src='assest/img/r_car/".$carimage."'/> ";
			$addcart = "<div class='btn btn-default' style='float:right'><a href='rcheckout.php?rcarid=".$carid."' class='addtocart'>Book for Car <span class='glyphicon glyphicon-shopping-cart'></span></a></div>";
		}
	}else{
		echo "<script>window.location.replace('index.php')</script>";
	}
?>

<section id="main">
	<div class="container" id="undermain">
		<div class="col-md-7" id="imgdiv">
			<?php
				echo $imagelink;
			?>
		</div>

		<div class="col-md-5">
		<div class="tittle cartitle col-md-12" style="text-transform: capitalize;"><?php echo $carname ?></div>
		<p> <?php echo $cardesc ?> </p>
		<p><b style='float:left'>Price per day : <?php echo "$". $carprice ?> </b> 
		<?php echo $addcart;?>
		 </p>
		<div style="margin-top: 60px;" id="alert-holder"></div>
		</div>
	</div>
</section>


<?php
	include_once "footer.php";
?>
