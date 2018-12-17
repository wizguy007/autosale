<?php
    include_once 'header.php';

    if (isset($_POST['subform'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        if ($gender == 'none') {
            $errormsg = "Select Gender";
        }else{

            $sql = "SELECT * FROM `admin` WHERE `admin_username`='".$username."' OR `admin_email`='".$email."'";
            $query = mysqli_query($db , $sql);
            $row = mysqli_num_rows($query);

            if ($row > 0) {
               $errormsg = "Username Or Email Already Exist";
            }else{
                $sql = "INSERT INTO `admin`(`admin_id`, `admin_fullname`, `admin_username`, `admin_email`, `admin_password`, `admin_gender`) VALUES ('','".$fullname."','".$username."','".$email."','".$password."','".$gender."')";
                $query = mysqli_query($db , $sql);

                if($query){
                    echo "<script>window.location.replace('viewadmins.php')</script>";
                }else{
                    $errormsg = "An Error Occur While Creating New Account";
                }
            }

        }
    }

?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Add New Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Add New Admin
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="col-md-6">
    <form id="checkout_form" method="POST" action="">

        <div class="form-group">
            <label for="fullname">Admin Fullname</label>
            <input id="fullname" class="form-control" type="text" name="fullname" placeholder="Enter Fullname" required="required">
        </div>

        <div class="form-group">
            <label for="username">Admin Username</label>
            <input id="username" class="form-control" type="text" name="username" placeholder="Enter Username" required="required">
        </div>

        <div class="form-group">
            <label for="email">Admin Email</label>
            <input id="email" class="form-control" type="email" name="email" placeholder="Enter E-mail" required="required">
        </div>

        <div class="form-group">
            <label for="password">Admin password</label>
            <input id="password" class="form-control" type="password" name="password" placeholder="Enter password" required="required">
        </div>

        <div class="form-group">
            <label for="gender">Admin Gender</label>
            <select id="gender" class="form-control" name="gender" required="required">
            <option value="none">---------Select Gender---------</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select>
        </div>



        <button type="Submit" name="subform" class="btn btn-default">Submit</button>
        <p id="msg">
            <?
                if (isset($errormsg)) {
                    echo $errormsg;
                }
            ?>
        </p>

    </form>
</div>
                





<?php
    include_once 'footer.php';
?>