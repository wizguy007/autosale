<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="plugins/font/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker.css">
	 <link href="plugins/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="style/genstyle.css">
	<link rel="shortcut icon" href="assest/img/tilog.png">
	<title>AutoSale</title>
</head>
<body>
<header>
	<nav class="navbar navbar-default" data-spy="affix" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       				<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
      			</button>

				<a style="padding-top:0px;" class="navbar-brand" href="index.php"><img src="assest/img/logo.png" height="50"></a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php#search"> Search </a></li>
					<li><a href="renthp.php"> Rent A Car </a></li>
					<li><a href="index.php#contactus"> Contact Us </a></li>

					<?php
						if(!isset($_ID)){
							echo '
							<li class="dropdown">
		          				<a class="dropdown-toggle" data-toggle="dropdown" href="accdetails.php"> Account <span class="caret"></span></a>
		          				<ul class="dropdown-menu">
		            				<li><a href="login.php"> Login </a></li>
		            				<li><a href="login.php"> Create Account</a></li>
		         				</ul>
		       				</li>
		       				';
		       			}
		       		?>

					<li><a href="cart.php"> Cart <span class="glyphicon glyphicon-shopping-cart"></span> </a></li>

					<?php
						if(isset($_ID)){
							echo '
							<li class="dropdown">
		          				<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_USERNAME.' <span class="caret"></span></a>
		          				<ul class="dropdown-menu">
		            				<li><a href="accdetails.php"> <span class="glyphicon glyphicon-user"></span> Account Details </a></li>
		            				<li><a href="vieworders.php"> <span class="glyphicon glyphicon-tasks"></span> View Order</a></li>
		            				<li><a href="viewbooking.php"> <span class="glyphicon glyphicon-tasks"></span> View Booking</a></li>
		            				<li class="divider"></li>
		            				<li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
		         				</ul>
		       				</li>
		       				';
		       			}
		       		?>

				</ul>
			</div>
		</div>	
	</nav>
</header>
