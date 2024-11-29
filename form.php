<?php if(isset($_POST["contactsEmail"]))
{
	// Read the form values
	$success = false;
	$name = isset( $_POST['contactsName'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['contactsName'] ) : "";
	$subject = isset( $_POST['contactsSubject'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['contactsSubject'] ) : "";
	$senderTel = isset( $_POST['contactsTel'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['contactsTel'] ) : "";
	$senderEmail = isset( $_POST['contactsEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['contactsEmail'] ) : "";
	$message = isset( $_POST['contactsMessage'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contactsMessage'] ) : "";

	//Headers
	$to = "name@domain.com";
    $subject = 'Contact Us';
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	//body message
	$message = "Name: ". $name . "<br>Subject: ". $subject . "<br>Email: ". $senderEmail . "<br>Phone: ". $senderTel . "<br> Message: " . $message . "";

	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
}
else
{
	echo '<div class="failed">Failed: Email not Sent.</div>';
}
?>