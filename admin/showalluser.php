<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>View All Users</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / View All Users
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                            </tr>
                        </thead>
                        <tbody>

<?php

$sql = "SELECT * FROM `user`";
$query = mysqli_query($db , $sql);

$x = 1;
while($fetch = mysqli_fetch_assoc($query)){
    $fullname = $fetch['user_fullname'];
    $username = $fetch['user_username'];
    $email = $fetch['user_email'];
    $dob = $fetch['user_dob'];
    $gender = $fetch['user_gender'];

    echo "<tr>
    <td>$x</td>
    <td class='capi'>$fullname</td>
    <td class='capi'>$username</td>
    <td class='capi'>$email</td>
    <td class='capi'>$gender</td>
    <td class='capi'>$dob</td>
    </tr>";

    $x++;
}




?>
                        </tbody>
                             </table>
                        </div>

<?php
    include_once 'footer.php';
?>