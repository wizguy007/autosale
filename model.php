<?php
	include_once "header.php";
?>

<section id="main">
<section class="container-fluid modelmain">
		<div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li style="text-transform: capitalize;" class="active">
                        <i class="fa fa-dashboard"></i> Model > <?php echo $_GET['carmodel']; ?>
                    </li>
                </ol>
            </div>
        </div>

	<div id="alert-holder" class="alrthold"></div>
	<?php
		$carmodel = $_GET['carmodel'];
		$sql = "SELECT * FROM `p_model` WHERE `model_name`='".$carmodel."'";
		$query = mysqli_query($db , $sql);
		
			if($fetch = mysqli_fetch_assoc($query)){
				$makeid = $fetch['model_id'];
				//echo $makeid;

				$sql = "SELECT * FROM `p_brand` WHERE `brand_model`='".$makeid."'";
				$query = mysqli_query($db , $sql);
				if(mysqli_num_rows($query) > 0){
					while($fetch = mysqli_fetch_assoc($query)){
						$carid = $fetch['brand_id'];
						$carimage = $fetch['brand_image'];
						$carname = $fetch['brand_name'];
						$carquantity = $fetch['brand_quantity'];
						$carprice = $fetch['brand_price'];
						$cardesc = $fetch['brand_description'];	
						$cardesc = substr_word( $cardesc , 80);

						$imagelink = "<img class='modimg zmimg' src='assest/img/brand/".$carimage."'/> ";
						$moredet = "<div class='btn btn-default' style='float:left'><a href='detail.php?carid=".$carid."'>More details <span class='glyphicon glyphicon-book'></span></a></div>";
						$addcart = "<div class='btn btn-default' style='float:right'><a class='addtocart' data-index=".$carid.">Add to cart <span class='glyphicon glyphicon-shopping-cart'></span></a></div>";

						echo "<div class='col-md-3 modelbox'>
								<div class='media'>
									<div class='media-center'>
										$imagelink
									</div>

									<div class='media-body' style='padding-top:20px;padding-bottom:20px;'>
									<p class='carname'><b> $carname <span class='carprice'>$ $carprice </span></b></p>
									<p style='padding-bottom:20px;'><b>$cardesc</b></p>
									<p> $moredet $addcart  </p>

									</div>
								</div>
							</div>";
					}
				}else{
					echo "<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
					echo "<p><b>Sorry no details available for the car</b></p></div>";
				}
			}else{
				echo "<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
				echo "<p><b>Sorry Car not Available yet</b></p></div>";
			}
		
	?>
	</section>
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

