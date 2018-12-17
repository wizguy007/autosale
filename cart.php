<?php
	include_once "header.php";
?>

<section id="main">
<?php
	if(!isset($_ID)){
		echo "<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
		echo "<p><b>Please login to see your cart details. Click here to login  ---> <a style='color:blue;' href='login.php'>LOGIN</a> </b></p></div>";
	}else{

		$sql = "SELECT * FROM `cart` WHERE `user_id`=".$_ID."";
		$query = mysqli_query($db,$sql);
		$row = mysqli_num_rows($query);

		if($row>0){

			echo '
				<div class="table-responsive" style="margin-top:20px;margin-left:10px;">          
				  <table class="table">
				    <thead>
				      <tr>
				        <th>S/N</th>
				        <th>Product Name</th>
				        <th>Quantity</th>
				        <th>Price</th>
				        <th>Total Price</th>
				        <th></th>
				        <th></th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
			';
			$x = 1;
			while ($fetch = mysqli_fetch_assoc($query)) {

				$pname = $fetch['product_id'];

				$sqll = "SELECT * FROM `p_brand` WHERE `brand_id`='".$pname."'";
				$queryy = mysqli_query($db , $sqll);
				$get = mysqli_fetch_assoc($queryy);

				$pname = $get['brand_name'];

				$cartid = $fetch['cart_id'];
				$pquan = $fetch['quantity'];
				$pprice = $fetch['price'];
				$totalprice = $pquan * $pprice;

				echo "
					<tr>
				        <td>$x</td>
				        <td><span class='cartpname'>$pname</span></td>
				        <form method='post' action='updatecart.php'>
				        <td>
				        <input type='hidden' name='cartid' value='".$cartid."'/>
				        <input id='num' type='number' name='newquan' value='".$pquan."' min='0' max='15'/>

				        </td>
				        <td>$$pprice</td>
				        <td>$$totalprice</td>
				        <td><button id='submit' class='btn btn-default'><i class='glyphicon glyphicon-refresh'></i> Update</button></td>
				        </form>
				    	<td><div class='btn btn-default'><a href='delfromcart.php?cartid=".$cartid."'> <i class='glyphicon glyphicon-remove'></i> Delete</a></div></td>
				    	<td><div class='btn btn-default'><a href='checkout.php?cartid=".$cartid."'>Checkout <i class='glyphicon glyphicon-chevron-right'></i></a></div></td>
				    </tr>
				"; 	

				$x++;
			}

			echo '
					</tbody>
				  </table>
				  </div>
				</div>
			';

		}else{
			echo "<div style='text-align:center;'><img class='oops' src='assest/img/oops-error.png' />";
			echo "<p><b> Sorry your cart is empty </b></p></div>";
		}
	}

?>






</section>


<?php
	include_once "footer.php";
?>