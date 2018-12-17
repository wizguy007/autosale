<?php
    include_once 'header.php';
    if(isset($_GET['modelid'])){
        $sql = "SELECT * FROM `p_model` WHERE `model_id`='".$_GET['modelid']."'";
        $query = mysqli_query($db , $sql);
        $fetch = mysqli_fetch_assoc($query);
        $model_name = $fetch['model_name'];
        $model_id = $fetch['model_id'];
    }else{
        $model_name = '';
    }
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>
                                <?php 
                                    if(isset($_GET['modelid'])){
                                        echo'Update Car Model';
                                    }else{
                                        echo'Add Car Model';
                                    }
                                ?>
                            </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / 
                                <?php 
                                    if(isset($_GET['modelid'])){
                                        echo'Update Car Model';
                                    }else{
                                        echo'Add Car Model';
                                    }
                                ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <form method="post" class="col-md-6" action="server/modelinsert.php" enctype="multipart/form-data">
                <?php
                    if(isset($_GET['modelid'])){
                          echo "<input type='hidden' value='".$_GET['modelid']."' name='cmid'/>";  
                    }
                ?>
                    <div class="form-group">
                        <label for="cmn">Car Model Name</label>
                        <input id="cmn" class="form-control" value="<?php echo $model_name?>" type="text" name="cmn" placeholder="Enter Car Model Name" required="required">
                    </div>

                   <div class="form-group">
                        <label for="cmpic">Select Picture</label>
                        <input id="cmpic" type="file" name="cmpic" 
                             <?php
                                if(!isset($_GET['modelid'])){
                                      echo "required='required'";  
                                }
                            ?>
                        >
                    </div>

                    <?php 
                        if(isset($_GET['modelid'])){
                            echo'<button class="btn btn-default" id="submit" type="submit" name="update">Update</button>';
                        }else{
                            echo'<button class="btn btn-default" id="submit" type="submit" name="add">Submit</button>';
                        }
                     ?>

                </form>




<?php
    include_once 'footer.php';
?>