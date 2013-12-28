<?php
$to = "deep.7178@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.".date('y/m/d h:i:s');
$from = "deep.7178@gmail.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>

