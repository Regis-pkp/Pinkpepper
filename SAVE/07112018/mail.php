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
$to = 'contact@pinkpepper-studio.com, caroline@pinkpepper-studio.com, thomas@pinkpepper-studio.com';
$email_subject = "Formulaire de contact de www.pinkpepper-studio.com:  $sujet";
$email_body = "Nouveau message depuis le site www.pinkpepper-studio.com.\n\n"."Voici les détails:\n\nEmail: $email_address\n\nMessage:\n$message";


if(mail($to,$email_subject,$email_body)){
    echo 'Votre message a bien été envoyé';
}else {
    echo "Erreur lors de l'envoi du message";
}
return true;

?>