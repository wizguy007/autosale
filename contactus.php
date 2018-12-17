<?php
	$name = $_POST['emailname'];
 	$add = $_POST['emailadd'];
 	$text = $_POST['emailtext'];
	echo "yes";

	$to = 'bob@example.com';

$subject = 'Contact Form';

$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $subject, $text, $headers);
?>