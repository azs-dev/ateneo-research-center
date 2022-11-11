

<form method="POST" enctype="multipart/form-data">
	<p>
		Send to:
		<input type="text" name="receiver"/>
	</p>
	<p>
		Subject:
		<input type="text" name="subject"/>
	</p>
	<p>
		Message:
		<textarea name="message"></textarea>
	</p>
	<p>
		Select file:
		<input type="file" name="file"/>
	</p>
	
	<input type="submit" name="submit" value="Send Mail"/>
</form>
<?php

function smtpmailer($to, $from, $from_name, $subject, $body, $filehere) { 
    global $error;
    define ('GUSER','140482@adzu.edu.ph');
	define ('GPWD','lilycollinss');
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

	$mail->addAttachment($filehere);
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}

	if (isset($_POST["submit"])) {
		require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
//function smtpmailer($to, $from, $from_name, $subject, $body)
smtpmailer('azomndr@gmail.com','140482@adzu.edu.ph', 'Ateneo Research Center', 'inser subject here', 'hello thsi is the body', 'file address which is variable of prs/pub_file');
}


// make a separate file and include this file in that. call this function in that file.



?>