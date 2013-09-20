<?php
// recaptcha validation
require_once('recaptchalib.php');
  $privatekey = "your_private_key_goes_here";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification
  
// set date/time
date_default_timezone_set('America/New_York');
$datereceived = date('F j, Y, g:i a');

// set headers
$EmailTo = "put_email_recipient_address_here";
$Subject = "Contact Form Submission";
$Headers = 	"From: <noreply@email_domain.com> \r\n" .
			"MIME-Version: 1.0\r\n" .
			"Content-Type: text/html; charset=ISO-8859-1\r\n";
// get posted data into local variables

$name = Trim(stripslashes($_POST['contact-name'])); 
$phone = Trim(stripslashes($_POST['contact-phone'])); 
$email = Trim(stripslashes($_POST['contact-email'])); 
$message = Trim(stripslashes($_POST['contact-message'])); 

// prepare email body text
$Body .= "<h1>Contact Form Submission</h1>";
$Body .= "<table width='600' border='0' cellspacing='2' cellpadding='2'>";
$Body .= "<tr><td width='200px'><b>Date Received:</b> </td><td>" . $datereceived . "</td></tr>";
$Body .= "<tr><td><b>Name:</b> </td><td>" . $name . "</td></tr>";
$Body .= "<tr><td><b>Phone:</b> </td><td>" . $phone . "</td></tr>";
$Body .= "<tr><td><b>Email:</b> </td><td>" . $email . "</td></tr>";
$Body .= "<tr><td><b>Additional Information:</b> </td><td>" . $message . "</td></tr>";
$Body .= "</table>";

// send email 
$success = mail($EmailTo, $Subject, $Body, $Headers);

// redirect on success/fail
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/contact.php#success\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/error.php\">";
}
  }
?>
