<?php
    include_once 'header.php';
?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->




                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                $sql = "SELECT * FROM `user`";
                                                $query = mysqli_query($db , $sql);
                                                $row = mysqli_num_rows($query);
                                                echo $row;
                                            ?>
                                        </div>
                                        <div>Registered User</div>
                                    </div>
                                </div>
                            </div>
                            <a href="showalluser.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                $sql = "SELECT * FROM `booking` WHERE `status`='NO'";
                                                $query = mysqli_query($db , $sql);
                                                $row = mysqli_num_rows($query);
                                                echo $row;
                                            ?>
                                        </div>
                                        <div>New Booking</div>
                                    </div>
                                </div>
                            </div>
                            <a href="booking.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                $sql = "SELECT * FROM `orders` WHERE `status`='NO'";
                                                $query = mysqli_query($db , $sql);
                                                $row = mysqli_num_rows($query);
                                                echo $row;
                                            ?>
                                        </div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="order.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                   <!--  <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
                <!-- /.row -->



                <div class="row">
                   
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Rental Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>NOD</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM `booking` WHERE `status`='YES' LIMIT 5";
                                                    $query = mysqli_query($db , $sql);
                                                    $x = 1;
                                                    while($fetch = mysqli_fetch_assoc($query)){
                                                        $order_id = $fetch['booking_id'];
                                                        $customer_name = username($db , $fetch['user_id']);
                                                        $product_name = rprodname($db , $fetch['rprod_id']);
                                                        $nod = $fetch['nod'];
                                                        $price = $fetch['price'];
                                                        $pymthd = $fetch['payment_method'];
                                                        $add = $fetch['billing_add'];

                                                           echo "<tr>
                                                                <td>$x</td>
                                                                <td class='capi'>$customer_name</td>
                                                                <td class='capi'>$product_name</td>
                                                                <td>$nod</td>
                                                                <td>$$price</td>
                                                                </tr>";

                                                        $x++;
                                                    }
                                                ?>



                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="apporder.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Sales Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM `orders` WHERE `status`='YES' LIMIT 5";
                                                    $query = mysqli_query($db , $sql);
                                                    $x = 1;
                                                    while($fetch = mysqli_fetch_assoc($query)){
                                                        $order_id = $fetch['order_id'];
                                                        $customer_name = username($db , $fetch['user_id']);
                                                        $product_name = productname($db , $fetch['product_id']);
                                                        $quantity = $fetch['quantity'];
                                                        $price = $fetch['price'];
                                                        $pymthd = $fetch['payment_method'];
                                                        $add = $fetch['billing_add'];

                                                           echo "<tr>
                                                                <td>$x</td>
                                                                <td class='capi'>$customer_name</td>
                                                                <td class='capi'>$product_name</td>
                                                                <td>$quantity</td>
                                                                <td>$$price</td>
                                                                </tr>";

                                                        $x++;
                                                    }
                                                ?>



                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="apporder.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                
<?php
    include_once 'footer.php';
?>