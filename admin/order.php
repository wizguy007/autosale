<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>New Order</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / New Order
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
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM `orders` WHERE `status`='NO'";
    $query = mysqli_query($db , $sql);
    $x = 1;
    while($fetch = mysqli_fetch_assoc($query)){
        $order_id = $fetch['order_id'];
        $customer_name = username($db , $fetch['user_id']);
        $product_name = productname($db , $fetch['product_id']);
        $quantity = $fetch['quantity'];
        $price = $fetch['price'];
        $pymthd = $fetch['payment_method'];

           echo "<tr>
                <td>$x</td>
                <td>$customer_name</td>
                <td>$product_name</td>
                <td>$quantity</td>
                <td>$$price</td>
                <td>$pymthd</td>
                <td><a class='btn btn-default' href='server/approveorder.php?orderid=".$order_id."'>Approve</a> </td>
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