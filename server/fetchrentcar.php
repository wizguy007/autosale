<?php
	include_once '../head.php';
	$rcar = $_POST['rcarid'];
	

	$sql = "SELECT * FROM `r_cars` WHERE `rcat_id`='".$rcar."'";
	$query = mysqli_query($db , $sql);
	$row = mysqli_num_rows($query);

	if($row == 0){
		echo "<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
		echo "<p><b> Sorry no cars available for this Category </b></p></div>";
	}else{

		while ($fetch = mysqli_fetch_assoc($query)) {
			$carid = $fetch['rcar_id'];
			$carname = $fetch['rcar_name'];
			$carimage = $fetch['rcar_img'];
			$carprice = $fetch['rcar_price'];
			$cardesc = $fetch['rcar_desc'];
			$cardesc = substr_word( $cardesc , 80);

			$imagelink = "<img class='modimg zmimg' src='assest/img/r_car/".$carimage."'/> ";
			$moredet = "<div class='btn btn-default' style='float:left'><a href='rentdetails.php?rcarid=".$carid."'>More details <span class='glyphicon glyphicon-book'></span></a></div>";
			$addcart = "<div class='btn btn-default' style='float:right'><a href='rcheckout.php?rcarid=".$carid."' class='addtocart'>Book for Car <span class='glyphicon glyphicon-shopping-cart'></span></a></div>";

			


			echo "<div class='col-md-3 modelbox'>
					<div class='media'>
						<div class='media-center'>
							$imagelink
						</div>

						<div class='media-body' style='padding-top:20px;padding-bottom:20px;'>
						<p class='priceword'>price per day</p>
						<p class='carname'><b> $carname <span class='carprice'>$$carprice </span></b></p>
						<p style='padding-bottom:20px;'><b>$cardesc</b></p>
						<p> $moredet $addcart  </p>

						</div>
					</div>
				</div>";


		}
	}

?>