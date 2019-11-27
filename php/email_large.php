<?php
// example on using PHPMailer with GMAIL
if (isset($_POST['rtm'])) {
	include("class.phpmailer.php");
	include("class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

	$mail = new PHPMailer();

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
	$body .= "<table style='width:100%'><tr>";
	$body .= "<td style='width:50%'><p><span class='address' style='text-align:left'><strong>Address: </strong>". strip_tags($_POST['address']) ."</span><p></td>";
	$body .= "<td><p style='width:50%'><span class='company' style='text-align:right'><strong>Company: </strong>". strip_tags($_POST['company']) ."</span></p></td></tr>";
	$body .= "<tr><td style='width:50%'><p><span class='phone' style='text-align:left'><strong>Phone: </strong>". strip_tags($_POST['phone']) ."</span><p></td>";
	$body .= "<td style='width:50%'><p><span class='url' style='text-align:right'><strong>Url: </strong>". strip_tags($_POST['url']) ."</span></p></div><p></td></tr></table>";
	$body .= "</div></body></html>";

	$mail->IsSMTP();
	$mail->SMTPAuth   = true;                 // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                  // set the SMTP port

	$mail->Username   = "username@gmail.com";  // GMAIL username
	$mail->Password   = "password@";      // GMAIL password

	$mail->From       = $_POST['email'];
	$mail->FromName   = $_POST['name'];
	$mail->Subject    = $_POST['subject'];
	$mail->WordWrap   = 50; // set word wrap

	$mail->MsgHTML($body);

	$mail->AddReplyTo("username@gmail.com","Webmaster");

	$mail->AddAddress("username@gmail.com","First Last");

	$mail->IsHTML(true); // send as HTML

	if(!$mail->Send()) {
		echo "Error: " . $mail->ErrorInfo;
	} 
	else {
		echo "Thanks for taking the time to send your message";
	}
}
?>