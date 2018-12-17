<?php
	$db = new mysqli("localhost" , "mario" , "mariogotze" , "my_autosale");
	if ($db) {
		//echo "connect successfully";
	} else {
		die("Unable to connect");
	}
	
?>
