<?php
	include_once "header.php";

	$makeid = $_GET['carid'];
	$sql = "SELECT * FROM `p_brand` WHERE `brand_id`='".$makeid."'";
	$query = mysqli_query($db , $sql);
	if(mysqli_num_rows($query) == 1){
		while($fetch = mysqli_fetch_assoc($query)){
			$carid = $fetch['brand_id'];
			$carimage = $fetch['brand_image'];
			$carname = $fetch['brand_name'];
			$carquantity = $fetch['brand_quantity'];
			$carprice = $fetch['brand_price'];
			$cardesc = $fetch['brand_description'];	

			$imagelink = "<img src='assest/img/brand/".$carimage."'/> ";
			$addcart = $addcart = "<div class='btn btn-primary' style='float:right'><a class='addtocart' data-index=".$carid.">Add to cart</a></div>";
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
		<p><b style='float:left'>Price : <?php echo "$". $carprice ?> </b> 
		<?php echo $addcart;?>
		 </p>
		<div style="margin-top: 60px;" id="alert-holder"></div>
		</div>
	</div>
</section>


<?php
	include_once "footer.php";
?>


<script type="text/javascript">
$(document).ready(function(){
	$('.addtocart').click(function(e){
		//e.preventDefault();
		 var a = $(this).data("index");
		$.ajax({
			url:"addtocart.php",
			method:"POST",
			data:{proid:a},
			success:function(data){
				if(data == 1 || data == 2){
					$('#alert-holder').html('<div class="alert alert-success">Item added successfully</div> ');
				}else if(data == 0){
					alert('Please login first');
				}else{
					$('#alert-holder').html('<div class="alert alert-danger"> OOPS! Something went wrong while adding to cart.Try again</div> ');
				}
				
				setTimeout(function(){
					$("div.alert").remove();
				},1000)
			}
		});
	});
});

</script>