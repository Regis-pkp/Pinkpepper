<?php
if(!$id) {$id=$_POST['form_id'];} 
if($_POST[$id.'siteURL']) {die('email send failed');}
if($_POST[$id.'name']) {
	
	// * use if using Windows server * phpini_set("sendmail_from", "info@mydomain.com");
	
	$mailTo = str_replace('#','@',$_POST[$id.'emailTo']);
	
	if($_POST[$id.'emailTo'] == '') {
		$eTError = '1';
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$",$mailTo)) {
		$eTError = '1';
	}
	if($_POST[$id.'emailFrom'] == '') {
		$eError = '1';
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $_POST[$id.'emailFrom'])) {
		$eError = '1';
	}
		
	if($_POST[$id.'name'] == '') {
		$nError = '1';
	}
		
	if($_POST[$id.'message'] == '') {
		$mError = '1';
	}
	
	if(!isset($eTError) && !isset($eError) && !isset($nError) && !isset($mError)) {		
		$mailFrom = $_POST[$id.'emailFrom'];
		$name = stripslashes(trim($_POST[$id.'name']));
		$subject = $_POST[$id.'subject'].$name;
		$fields= explode('|',$_POST[$id.'fields']);
		$message = stripslashes(trim($_POST[$id.'message']));
		$body = $fields[1] .": $name\n\n". $fields[2] .": $mailFrom\n\n". $fields[3] .": $message";			
		$headers = "Content-type: text/plain; charset=UTF-8;\n";
		$headers .= "From: ".$fields[0]." <".$mailTo.">" . "\r\n" . "Reply-To: " . $mailFrom;		
		mail($mailTo, $subject, $body, $headers);
	} else {
		die('email failed to send');	
	}
}
?>