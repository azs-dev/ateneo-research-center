<?php 
session_start();
if (isset($_POST['submit'])) {
include_once 'mydbhandler.inc.php';
require '../mail/mail-func.php';
$id = $_GET['id'];
$email_array = $_SESSION['pub_email_array'];
$email_array2 = $_SESSION['pub_email_array2'];

$sql = "UPDATE publication SET pub_status='Approved' , pub_visibility='3' 
		WHERE pub_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_execute($stmt);
	/*email function*/
		smtpmailer($email_array['pub_email'],'140482@adzu.edu.ph', 'Ateneo Research Center', ' Your Application Form ', 'Congratulations! Your application for publication titled '.$email_array['pub_title'].' has been approved! Please stop by the office.');
	/*text function
				require('../php-uk/textlocal.class.php');
				require '../sms/credentials.php';

				$textlocal = new Textlocal(false, false, API_KEY);

				$numbers = array(MOBILE);
				$sender = 'Ateneo Research Center';
				$message = 'Hello, '.$email_array['pub_applicant'].' this is to inform you that there is already a result for your application, please check our website and your email';

				try {
				    $result = $textlocal->sendSms($numbers, $message, $sender);
				} catch (Exception $e) {
				    die('Error: ' . $e->getMessage());
				}
				*/
	/*end of text function*/

	}
	header("Location:../pages/director/director-publication.php");
}
?>