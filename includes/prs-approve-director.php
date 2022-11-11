<?php 
session_start();
if (isset($_POST['submit'])) {
include_once 'mydbhandler.inc.php';
require '../mail/mail-func.php';
$id = $_GET['id'];
$email_array = $_SESSION['prs_email_array'];

$sql = "UPDATE presentation SET prs_status='Approved' , prs_visibility='3' 
		WHERE prs_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_execute($stmt);
		smtpmailer($email_array['prs_email'],'140482@adzu.edu.ph', 'Ateneo Research Center', ' Your Application Form ', 'Congratulations! Your application for presentation titled '.$email_array['prs_papertitle'].' has been approved! Please stop by the office.');
	}
	header("Location:../pages/director/director-presentation.php");
}
?>