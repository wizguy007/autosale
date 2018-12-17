<?php
  include_once "header.php";
  $odid = $_GET['order_id'];
  $sql = "SELECT * FROM `orders` WHERE `order_id`='".$odid."'";
  $query = mysqli_query($db , $sql);
  $fetch = mysqli_fetch_assoc($query);

  $order_id = $fetch['order_id'];
  $customer_name = username($db , $fetch['user_id']);
  $product_name = productname($db , $fetch['product_id']);
  $fullname = fullname($db , $fetch['user_id']);
  $email = email($db , $fetch['user_id']);

  $quantity = $fetch['quantity'];
  $price = $fetch['price'];
  $pymthd = $fetch['payment_method'];

  if ($pymthd == 'master') {
      $pymthd = 'mastercard';
  }

  $status = $fetch['status'];

  $billadd = $fetch['billing_add'];
  $pcode = $fetch['postal_code'];
  $pno = $fetch['phone_number'];


?>

<section id="main">

  <link rel="stylesheet" href="css/template.css">
  <style type="text/css">
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  </style>


  <div>
        


    <div id="container" class="target" style="overflow: auto; background: #ebebe0;margin-bottom:20px;margin-top:20px;min-height:400px;max-width: 820px;box-shadow:0px 0px 3px 3px rgba(12,13,14,0.15);" >
      <section id="memo">
        <div class="company-name">
          <span>AutoSale<small style="font-size: 14px;margin-top: 5px;margin-left: 5px;"> Purchase</small></span>
        </div>

        <div class="logo">
          <img src="assest/img/tilog.png" width="150" height="150" />
        </div>
        
        <div class="company-info">
          <div>
            <span>227 Cobblestone Road</span>
          </div>
          <div>www.autosales.com</div>
          <div>744 789 1234 </div>
        </div>

     
      
	      <section id="client-info">
	        <span>Bill to : </span>
	        <div>
	          <span class="bold"><?php echo $fullname ;?></span>
	        </div>
	        
	        <div>
	          <span><?php echo $billadd ;?></span>
	        </div>
	        
	        <div>
	          <span><?php $pno ;?></span>
	        </div>
	        
	        <div>
	          <span><?php echo $email ;?></span>
	        </div>
	        
	        <div>
	          <span>Attn: <?php echo $customer_name ;?></span>
	        </div>
	      </section>
       </section>
      


      <div class="clearfix"></div>
      
      <section id="invoice-title-number">
      
        <span id="title">Invoice </span>
        <span id="number">#<?php echo $odid ;?></span>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="items">
        
        <table cellpadding="0" cellspacing="0">
        
          <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Payment Method</th>
            <th>Total Price</th>
          </tr>
          
          <tr >
            <td><?php echo $product_name ;?></td>
            <td><?php echo $quantity ;?></td>
            <td><?php echo $pymthd ;?></td>
            <td><?php echo "$".$price ;?></td>
          </tr>
          
        </table>
        
      </section>

      <div class="currency">
        <span>* All prices are in</span> <span>USD</span>
      </div>
      
      <section id="sums">
      
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Subtotal:</th>
            <td><?php echo "$".$price ;?></td>
          </tr>
          
          <tr>
            <th>VAT:</th>
            <td>$10.00</td>
          </tr>
          
          <tr data-hide-on-quote="true">
            <th>Amount Due:</th>
            <td><?php 
                  $price = $price + 10;
              echo "$".$price;
            ?></td>
          </tr>
          
        </table>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="terms">
      
        <span>Terms & Notes</span>
        <div><?php echo $fullname?>, thank you very much. We really appreciate your business.</div>
        
      </section>
    </div>
    </div>

    <div class="container" style="text-align: center; margin-bottom: 20px;"> 
    <button class="btn btn-default" onclick="capture();" > <span class="glyphicon glyphicon-picture"></span> Save Reciept</button>


    <button style="margin-left: 20px;" id="print_button1" class="btn btn-default"> <span class="glyphicon glyphicon-print"></span> Print Reciept</button>
    

        <form method="POST" enctype="multipart/form-data" action="save.php" id="myForm"  target="_blank">
        <input type="hidden" name="img_val" id="img_val" value="" />
        </form>
    </div>
    

<?php
  include_once "footer.php";
?>

 <script>
    $(document).ready(function(){
        $("#print_button1").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.target").printArea( options );
        });
        //  $("#print_button2").click(function(){
        //     var mode = 'iframe'; // popup
        //     var close = mode == "popup";
        //     var options = { mode : mode, popClose : close};
        //     $("div.content").printArea( options );
        // });
    });
  </script>

