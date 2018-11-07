<?php



// Ma clé privée pour le captcha
$secret = "6LcM23UUAAAAANVY_KVAbZpEmwxfJ4hMz0ElYNeJ";
// Paramètre renvoyé par le recaptcha
$response = $_POST['g-recaptcha-response'];
// On récupère l'IP de l'utilisateur
$remoteip = $_SERVER['REMOTE_ADDR'];

$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
    . $secret
    . "&response=" . $response
    . "&remoteip=" . $remoteip ;

$decode = json_decode(file_get_contents($api_url), true);

// Check for empty fields
if(empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['message']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) || $decode['success'] == false) {
    echo "No arguments Provided!";
    return false;
}

$sujet = $_POST['sujet'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$to = 'contact@pinkpepper-studio.com, caroline@pinkpepper-studio.com, thomas@pinkpepper-studio.com, bastien@pinkpepper-studio.com, support@pinkpepper-studio.com';
//$to = 'regis@pinkpepper-studio.com';
$email_subject = "Formulaire de contact de www.pinkpepper-studio.com:  $sujet";
$email_body = stripslashes("Nouveau message depuis le site www.pinkpepper-studio.com"."<br><br>"."Voici les détails:" .  "<br><br>" . " Email: $email_address" . "<br><br>" . " Message:" . "<br>" ."$message");

if(mail($to,$email_subject,$email_body,$headers)){
    echo 'Votre message a bien été envoyé';
}else {
    echo "Erreur lors de l'envoi du message";
}
return true;

?>