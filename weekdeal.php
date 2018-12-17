<?php
	$z = 1;
	$a =2;
	$x= 0;
	while($z != 4){

		$sql = "SELECT * FROM `p_brand` WHERE `brand_model`='".$a."' ORDER BY `p_brand`.`brand_id` ASC LIMIT 1 ";
		$query = mysqli_query($db , $sql);

		$fetch = mysqli_fetch_assoc($query);
		$carid = $fetch['brand_id'];
		$carimage = $fetch['brand_image'];
		$carname = $fetch['brand_name'];
		$carprice = $fetch['brand_price'];
		$x++;	

		if($x == 1){
			$y = 50;
		}else if($x == 2){
			$y = 25;
		}else{
			$y = 15;
		}


		$newprice = (($y/100) * $carprice);





		$imagelink = "<img class='dealimg zmimg' src='assest/img/brand/".$carimage."'/> ";
		$disimage = "<img class='disimg' src='assest/img/discount/".$x.".gif'/> ";

		$moredet = "<div class='btn btn-primary' style='float:left'><a href='detail.php?carid=".$carid."'>More details <span class='glyphicon glyphicon-book'></span></a></div>";
		$addcart = "<div class='btn btn-primary' style='float:right'><a class='addtocart' data-index=".$carid.">Add to cart <span class='glyphicon glyphicon-shopping-cart'></span></a></div>";


		echo "<div class='col-md-4' id='dealweek'>
			<div class='media'>
				<div class='media-center'>
				$disimage
					$imagelink
				</div>

				<div class='media-body' style='padding-top:20px;padding-bottom:20px;'>
				<p class='carname'><b> $carname <span class='carprice'><span class='dis'><strike style='color:red;'>$$carprice</strike></span> $$newprice </span></b></p>
				<p> $moredet $addcart  </p>

				</div>
			</div>
		</div>";

		$z++;
		$a++;
	}
?>