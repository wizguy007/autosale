<?php
    include_once 'header.php';
?>
	    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Add Car Brand</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Add Car Brand
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <form method="post" class="col-md-12" action="server/brandinsert.php" enctype="multipart/form-data">
                   
                <div class="col-md-5">

                    <div class="form-group">
                        <label for="scm">Select Car Model</label>
                        <select id="scm" class="form-control" name="scm" required="required">
                            <?php
                                $sql = "SELECT * FROM `p_model` ORDER BY `p_model`.`model_name` ASC ";
                                $query = mysqli_query($db , $sql);

                                $output = "";

                                while($fetch = mysqli_fetch_assoc($query)){
                                    $modelid = $fetch['model_id'];
                                    $modelname = $fetch['model_name'];

                                    $output.= "<option value='".$modelid."'>".$modelname."</option>";
                                }

                                echo $output;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cbn">Enter Car Brand Name</label>
                        <input id="cbn" class="form-control" type="text" name="cbn" placeholder="Enter Car Brand Name" required="required">
                    </div>

                    <div class="form-group">
                        <label for="cbpic">Select Picture</label>
                        <input id="cbpic" type="file" name="cbpic" required="required">
                    </div>

                    <div class="form-group">
                        <label for="cbp">Enter Car Brand Price</label>
                        <input id="cbp" class="form-control" type="text" name="cbp" placeholder="Enter Car Brand Price" required="required">
                    </div>

                    <div class="form-group">
                        <label for="cbq">Enter Car Brand Quantity</label>
                        <input id="cbq" class="form-control" type="text" value="15" name="cbq" placeholder="Enter Car Brand Quantity" required="required">
                    </div>


                    <button class="btn btn-default" id="submit" type="submit" name="insubmit">Submit</button>
                    
                </div>


                <div class="col-md-6" style="float: right;" >
                    <div class="form-group">
                        <label for="cbd">Enter Car Brand Description</label>
                        <textarea style="height: 328px;resize: none;" id="cbd" class="form-control" name="cbd" placeholder="Enter Car Brand Description" required="required"></textarea>
                    </div>    
                </div>

                </form>




<?php
    include_once 'footer.php';
?>