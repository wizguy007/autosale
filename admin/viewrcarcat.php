<?php
    include_once 'header.php';
?>
        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small> View Rent Car Categories</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / View Rent Car Categories
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
                        <th>Category Name</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM `rent_cat` ORDER BY `rentcat_name` ASC ";
    $query = mysqli_query($db , $sql);
    $x = 1;
    while($fetch = mysqli_fetch_assoc($query)){
        $rcat_id = $fetch['rentcat_id'];
        $rcat_name = $fetch['rentcat_name'];

           echo "<tr>
                <td>$x</td>
                <td>$rcat_name</td>
                <td><a class='btn btn-default' href='#'>Delete</a> </td>
                <td><a class='btn btn-default' href='addrcarcat.php?rcatid=$rcat_id'>Update</a> </td>
                </tr>";

        $x++;
        //server/deletemodel.php?modelid=$model_id
    }
?>

                    </tbody>
                  </table>
                  </div>
                </div>




<?php
    include_once 'footer.php';
?>