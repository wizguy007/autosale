<?php
	include_once "header.php";
?>


<section id="main">
<div class="container">

<div id="showrent" class="container-fluid submain" >
	<div class="tittle col-md-12">Pick your favourate</div>
	<div class="col-md-12" style="margin-top: 25px;">
	<?php
		$sql = "SELECT * FROM `rent_cat` ORDER BY `rent_cat`.`rentcat_name` ASC ";
		$query = mysqli_query($db , $sql);
		while ($fetch = mysqli_fetch_assoc($query)) {
			$id = $fetch['rentcat_id'];
			$rcat_name = $fetch['rentcat_name'];
			$rcat_img = $fetch['rentcat_image'];

			$image = "<img class='rcarlogo' src='assest/img/rent_cat/".$rcat_img ."' />";
			echo"	<div class='col-md-3 col-xs-6 crentbox'>
						<a href='javascript:;' data-value='".$id."' class='rentanchor'>".
							$image."<p id='carloganme'>".$rcat_name." Cars</p>
						</a>
					</div>
				";
		}

	?>	
	</div>
</div>


<div  class="showall">
	
</div>

</section>
</div>

<?php
	include_once "footer.php";
?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".rentanchor").click(function(){
			var id = $(this).data("value");
			

			$.ajax({
				url:"server/fetchrentcar.php",
				method:"POST",
				data:{rcarid:id},
				success:function(data){
					$("div.showall").html(data);
				}
			});
		});
	});

</script>