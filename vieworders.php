<?php
	include_once "header.php";
	if (!isset($_SESSION['id'])) {
		echo "<script>window.location.replace('index.php')</script>";
	}
?>

<section id="main">
	<section class="container orderclass" style="text-align: center;">
		<?php	
			$sql = "SELECT * FROM `orders` WHERE `user_id`='".$_ID."'  ORDER BY `orders`.`order_id` DESC";
			$query = mysqli_query($db , $sql);
			$row = mysqli_num_rows($query);
			if($row > 0){

				echo '
				<div class="table-responsive" style="margin-top:20px;margin-left:10px;text-transform: capitalize;">          
				  <table class="table">
				    <thead>
				      <tr>
				        <th>S/N</th>
				        <th class="capi">Product Name</th>
				        <th>Quantity</th>
				        <th>Total Price</th>
				        <th class="capi">Payment Method</th>
				        <th>Status</th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
			';
			$x = 1;

				while($fetch = mysqli_fetch_assoc($query)){
			        $order_id = $fetch['order_id'];
			        $customer_name = username($db , $fetch['user_id']);
			        $product_name = productname($db , $fetch['product_id']);
			        $quantity = $fetch['quantity'];
			        $price = $fetch['price'];
			        $pymthd = $fetch['payment_method'];
			        $status = $fetch['status'];

			         echo "<tr>
				                <td>$x</td>				
				                <td>$product_name</td>
				                <td>$quantity</td>
				                <td>$$price</td>
				                <td>$pymthd</td>";
				                if($status == 'YES'){

				                	echo "<td><span class='fa fa-fw fa-circle' style='color:green;'></span></td>";
				                	echo "<td><a class='btn btn-default' href='template.php?order_id=".$order_id."'>Print Slip</a> </td>";

				                }else{
				                	echo "<td><span class='fa fa-fw fa-circle' style='color:red;'></span></td>";
				                }
			                echo "</tr>";


			        $x++;
			    }

			    echo ' </tbody>
                  </table>
                  </div>
                </div>';

			}else{

			}
		?>
	</section>
</section>

<?php
	include_once "footer.php";
?>