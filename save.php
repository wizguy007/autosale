<?php
//save.php code
 
//Show the image
	echo '<div style="text-align:center;">';
echo '<img src="'.$_POST['img_val'].'" />';
	echo '</div>';
 
//Get the base-64 string from data
$filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);
 
//Decode the string
$unencodedData=base64_decode($filteredData);
 
 $date = date('d-m-y');
 $t=time();

 $date = $date."-".$t;
//Save the image
file_put_contents('C:/Users/PALMER ADEKUNLE/Pictures/receipt-'.$date.'.png', $unencodedData);
?>