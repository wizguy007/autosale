<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>View Car Brand</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / View Car Brand
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="table-responsive" style="margin-top:20px;margin-left:10px;text-transform: capitalize;">          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Brand Name</th>
                        <th>Price</th>
                        <th>Quantity Available</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM `p_brand`  ORDER BY `p_brand`.`brand_id` DESC";
    $query = mysqli_query($db , $sql);
    $x = 1;
    while($fetch = mysqli_fetch_assoc($query)){
        $brand_name = $fetch['brand_name'];
        $brand_id = $fetch['brand_id'];
        $brand_price = $fetch['brand_price'];
        $brand_quantity = $fetch['brand_quantity'];


           echo "<tr>
                <td>$x</td>
                <td>$brand_name</td>
                <td>$$brand_price</td>
                <td>$brand_quantity</td>
                <td><a class='btn btn-default' href='#'>Delete</a> </td>
                <td><a class='btn btn-default' href='updatecarbrand.php?carid=".$brand_id."'>Update</a> </td>
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