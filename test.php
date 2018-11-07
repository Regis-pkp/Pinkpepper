<?php 

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);



// Create the email and send the message
$to = 'jimlefdev@gmail.com, debug@pinkpepper-studio.com'; 
$email_subject = "TEST arduino";
$email_body = print_r($_GET);


if(mail($to,$email_subject,$email_body)){
	echo 'Votre message à bien été envoyé';
}
echo "fin";