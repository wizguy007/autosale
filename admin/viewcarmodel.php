<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>View Car Model</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / View Car Model
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
                        <th>Model Name</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

<?php
    $sql = "SELECT * FROM `p_model` ORDER BY `model_name` ASC";
    $query = mysqli_query($db , $sql);
    $x = 1;
    while($fetch = mysqli_fetch_assoc($query)){
        $model_name = $fetch['model_name'];
        $model_id = $fetch['model_id'];

           echo "<tr>
                <td>$x</td>
                <td>$model_name</td>
                <td><a class='btn btn-default' href='#'>Delete</a> </td>
                <td><a class='btn btn-default' href='addcarmodel.php?modelid=$model_id'>Update</a> </td>
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