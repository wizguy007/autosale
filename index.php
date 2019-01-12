<?php
	include_once "header.php";
?>


<section id="main">

<section id="header-img">
	

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="assest/img/slide/1.jpg" alt="0">
    </div>

    <div class="item">
      <img src="assest/img/slide/2.jpg" alt="1">
    </div>

    <div class="item">
      <img src="assest/img/slide/3.jpg" alt="2">
    </div>

    <div class="item">
      <img src="assest/img/slide/4.jpg" alt="3">
    </div>

    <div class="item">
      <img src="assest/img/slide/5.jpg" alt="4">
    </div>

    <div class="item">
      <img src="assest/img/slide/6.jpg" alt="5">
    </div>

    <div class="item">
      <img src="assest/img/slide/7.jpg" alt="6">
    </div>

    <div class="item">
      <img src="assest/img/slide/8.jpg" alt="7">
    </div>


  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>









</section>

	<div class="container">
		<div id="search" style="padding-top: 70px;" class="container-fluid submain">
			<div class="tittle col-md-12">Search for Cars</div>

			<div class="col-md-12" id="searchmid" style="padding-top: 15px;">
				<form method="GET" action="detail.php">
					<div class="col-md-5">
						<div class="form-group">
							<select id="carmodel" style="text-transform: capitalize;" class="form-control" required="required">
								<?php include_once "fetchmodellist.php"; ?>
							</select>
						</div>	
					</div>

					<div class="col-md-5">
						<div class="form-group">
							<select id="carbrand" style="text-transform: capitalize;" class="form-control" name="carid" required="required">
							</select>
						</div>
					</div>

					<div class="col-md-2">
						<button class="btn btn-primary form-control"> Submit </button>
					</div>
					
				</form>
			</div>
		</div>


		<div id="favourate" style="text-align:center;" class="container-fluid submain" >
			<div class="tittle col-md-12" >Pick your favourate</div>
			<div class="col-md-12">
				<?php
					include_once "server/fetchmodel.php";
				?>
			</div>
		</div>

		<div id="deal_of_the_week" class="container-fluid submain">
			<div class="tittle col-md-12">Best Deal of the week</div>
			<div class="col-md-12" style="margin-top: 10px;">
			<?php 
				include_once "weekdeal.php";
			?>
			</div>	
		</div>	


		<div id="contactus" class="container-fluid submain">
			<div class="tittle col-md-12">Contact Us</div>
			<div class="col-md-12">
				<form id="contactus_form">
					<div class="col-md-5">
						<div class="form-group">
							<label for="name">Name</label>
							<input id="name" class="form-control" type="text" name="emailname" placeholder="Enter Your Fullname" required="required" pattern="[A-Za-z ]{8,}" title="Only letters min 0f 8 with whitespace">
						</div>

						<div class="form-group">
							<label for="add">E-mail</label>
							<input id="add" class="form-control" type="e-mail" name="emailadd" placeholder="Enter Your Address">
						</div>
					</div>

					<div class="col-md-7">

						<div class="form-group">
							<label for="text">Text</label>
						<textarea style="height: 110px;resize: none;" id="text" class="form-control" name="emailtext" placeholder="Enter Your Address" required="required" pattern="[A-Za-z0-9 ]{10,}" title="Enter Your Message. Must be more than 10 character"></textarea>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-3" ><button type="Submit" class="form-control btn btn-default">Submit</button></div>

						<div class="col-md-9">
							<div class="contact-alert-holder">
								<div class="alerth"></div>
							</div>
						</div>
					</div>

				</form>
			</div>	
		</div>

	</div>
</section>

<?php
	include_once "footer.php";
?>

<!-- PushAlert -->
        <script type="text/javascript">
                (function(d, t) {
                        var g = d.createElement(t),
                        s = d.getElementsByTagName(t)[0];
                        g.src = "https://cdn.pushalert.co/integrate_9d2891e36b0a17e3525b37c28a4c618d.js";
                        s.parentNode.insertBefore(g, s);
                }(document, "script"));
        </script>
        <!-- End PushAlert -->

<script type="text/javascript">
$(document).ready(function(){
	$("#carmodel").change(function(){
		var id = $(this).val();
		$.ajax({
			url:"fetchbrandlist.php",
			method:"POST",
			data:{id:id},
			success:function(data){
				$("#carbrand").html(data)
			}
		});
	});



	$('.addtocart').click(function(e){
		//e.preventDefault();
		 var a = $(this).data("index");
		$.ajax({
			url:"addtocart.php",
			method:"POST",
			data:{proid:a},
			success:function(data){
				if(data == 1 || data == 2){
					alert('Item added successfully');
				}else if(data == 0){
					alert('Please login first');
				}else{
					
					alert('OOPS! Something went wrong while adding to cart.Try again');
				}
				
				setTimeout(function(){
					$("div.alert").remove();
				},1000)
			}
		});
	});



	$("#contactus_form").submit(function(e) {

	    $.ajax({
	           type: "POST",
	           url: "contactus.php",
	           data: $("#idForm").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	             
	               $('.contact-alert-holder').html('<div class="alert alert-success">Message sent successfully</div> ');

	               setTimeout(function(){
					$("div.alerth").remove();
					},1000)
	           }
	         });

	    e.preventDefault(); // avoid to execute the actual submit of the form.
	});

});



</script>