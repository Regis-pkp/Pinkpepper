<?php
// Check for empty fields
if(empty($_POST['email'])  		||
   empty($_POST['sujet']) 		||
   !empty($_POST['subject']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$sujet = $_POST['sujet'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'contact@pinkpepper-studio.com, caroline@pinkpepper-studio.com, thomas@pinkpepper-studio.com'; 
$email_subject = "Formulaire de contact de www.pinkpepper-studio.com:  $sujet";
$email_body = "Nouveau message depuis le site www.pinkpepper-studio.com.\n\n"."Voici les détails:\n\nEmail: $email_address\n\nMessage:\n$message";


if(mail($to,$email_subject,$email_body)){
	echo 'Votre message a bien été envoyé';
}else{
	echo "Erreur lors de l'envoi du message";
}
return true;			
?>