<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Approved Booking</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Approved Booking
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="table-responsive" style="margin-top:20px;margin-left:10px;text-transform: capitalize;text-align: center;">          
                  <table class="table">
                    <thead>
                      <tr style="text-align: center;">
                        <th>S/N</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>No of Days</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th>Customer Address</th>
                      </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM `booking` WHERE `status`='YES'";
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
                <td>$customer_name</td>
                <td>$product_name</td>
                <td>$nod</td>
                <td>$$price</td>
                <td>$pymthd</td>
                <td>$add</td>
                </tr>";

        $x++;
    }
?>

                    </tbody>
                  </table>
                  </div>
                </div>




<?php
    include_once 'footer.php';
?>