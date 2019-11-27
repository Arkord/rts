<?php
if (isset($_POST['rtm'])) {
	$to = "username@gmail.com";
	$subject = "Hi!";
	$body = "<html><head></head><body style='background:#FFF'><br />";
	$body .= "<div id='wrap' style='margin:10px auto;border:1px solid #F2F2F2;padding:10px; width:550px; font-family:Georgia'>";
	$body .= "<p style='color:#168EB4; font-size:11px'>Your page</p>";
	$body .= "<p class='main' style=' padding: 0px 20px; background: #EBEBEB; color:#3A3A3A !important; font-size: 25px; font-style: italic'>Your contact form title</p><p>Message from your page</p>";
	$body .= "<p class='name' style='padding: 0 20px; height: 15px; color: #999; font-family: Verdana; font-size: 10px; text-transform: uppercase'>" . strip_tags($_POST['name']) . "</p>";
	$body .= "<p class='date' style='padding: 0 20px; height: 15px; color: #999; font-family: Verdana; font-size: 10px; text-transform: uppercase; text-align: right;'>" . date("d/m/Y") ."</p>";
	$body .= "<p class='subject' style='padding: 0px 20px; color:#3A3A3A !important; font-size: 10px; font-weight: bold;'>" . strip_tags($_POST['subject']) . "</p>";
	$body .= "<p class='content' style='padding: 12px; background: #168EB4; color:#FFF !important; font-size: 14px; line-height: 1.5;text-align:justify'>
				" . strip_tags($_POST['message']) . " 
			</p>";
	$body .= "<hr style='border: 1px solid #D8D8D8' />";
	$body .= "<div class='footer' style='margin-left:20px; font-size:10px'>";
	$body .= "<p class='links' style='border: 1px solid #E7E7E7; background: #EBEBEB; color:#999'>footer content</p>";
	$body .= "</div>";
	$body .= "</div></body></html>";
	
    $headers = "From: " . strip_tags($_POST['name']) . "\r\n"; 
	$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if (mail($to, $subject, $body, $headers)) {
		echo "Thanks for taking the time to send your message";
	} 
	else 
	{
		echo("Message delivery failed...");
	}
 }
 ?>