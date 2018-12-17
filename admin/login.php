<?php
  session_start();
  include_once '../server/connection.php';
  if (isset($_POST['login'])) {
      $uname = $_POST['uname'];
      $pass =  $_POST['pass'];

      $sql = "SELECT * FROM `admin` WHERE `admin_username`='".$uname."' AND `admin_password`='".$pass."'";
      $query = mysqli_query($db , $sql);
      $row = mysqli_num_rows($query);
      if($row == 1){
         $fetch = mysqli_fetch_assoc($query);
         $_SESSION['admin_id'] = $fetch['admin_id'];
         echo "<script>window.location.replace('index.php')</script>";
      }else{
        $errormsg = "Wrong Admin Credentials";
      }
     

  }

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>AutoSale - Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="shortcut icon" href="../assest/img/tilog.png">
  

    <style type="text/css">
    	.form-signin {
		    max-width: 330px;
		    padding: 15px;
		    margin: 0 auto;
		    text-align: center;  

		}

		#logoimg{
			max-width: 150px;
		}

		#ptext{
			margin-bottom: 20px;
		}

    </style>
</head>
   
<body >
 
    <div class="container">
      <div class="tab-content">
          <div id="login" class="tab-pane active">

              <form action="login.php" method="post" class="form-signin">
              		<div class="text-center">
				        <img src="logo.png" id="logoimg" alt=" Logo" />
				    </div>

                  <p id="ptext" class="text-muted text-center btn-block btn btn-primary btn-rect"> 
                    <?php 
                      if (isset($errormsg)) {
                        echo $errormsg;
                      }else{
                        echo 'Enter your username and password';
                      }
                    ?>
                  </p>
                  <div class="form-group">
                  	<input type="text" placeholder="Username" name="uname" class="form-control" />
                  </div>
                  
                <div class="form-group">
                  	<input type="password" placeholder="Password" name="pass" class="form-control" />
                </div>
                  <button name="login" class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
              </form>
          </div>
	</div>
   
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
