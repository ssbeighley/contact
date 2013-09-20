<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Form</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/south-street/jquery-ui.css" type="text/css" />
</head>

<body>
<h1>Contact Form</h1>
<p>Fill out the form below to send a message.<br>
  <span class="required">*</span> indicates a required field.</p>
<form name="contact-form" method="post" action="bin/contact.php">
  <label for="contact-name">Name: <span class="required">*</span></label>
  <input type="text" name="contact-name" id="contact-name" autofocus required />
  <label for="contact-email">Email Address: <span class="required">*</span></label>
  <input type="email" name="contact-email" id="contact-email" required />
  <label for="contact-phone">Phone: <span class="required">*</span></label>
  <input type="tel" name="contact-phone" id="contact-phone" required />
  <label for="contact-message">Message: <span class="required">*</span></label>
  <textarea name="contact-message" id="contact-message" required></textarea>
  <?php
		  require_once('bin/recaptchalib.php');
//		  $publickey = "your_public_key_goes_here";
		  echo recaptcha_get_html($publickey);
	    ?>
  <input type="submit" value="Submit" />
</form>

<!-- Success Messages -->
<div id="dialog-message" title="Thank You" style="display:none">
  <p> <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span> Your message was submitted successfully. We will contact you shortly.</p>
</div>

<!-- Scripts --> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script> 
<script>
  if ( document.location.href.indexOf('#success') > -1 ) {
  $( "#dialog-message" ).dialog({
		dialogClass: "no-close",
		modal: true,
		buttons: {
		  Ok: function() {
			$( this ).dialog( "close" );
		  }
		}
  });		
  }  
</script>
</section>
</body>
</html>
