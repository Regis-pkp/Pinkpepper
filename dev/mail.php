<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'contact@pinkpepper-studio.com, caroline@pinkpepper-studio.com, sebastien@pinkpepper-studio.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulaire de contact de www.pinkpepper-studio.com:  $name";
$email_body = "Nouveau message depuis le site www.pinkpepper-studio.com.\n\n"."Voici les détails:\n\nNom: $name\n\nEmail: $email_address\n\nMessage:\n$message";


if(mail($to,$email_subject,$email_body)){
	echo 'Votre message à bien été envoyé';
}else{
	echo "Erreur lors de l'envoi du message";
}
return true;			
?>