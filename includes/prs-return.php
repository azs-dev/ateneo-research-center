<?php 
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	require '../mail/mail-func.php';
	$id = $_GET['id'];
	$email_array = $_SESSION['prs_email_array4'];

	$sql = "UPDATE presentation SET prs_visibility='3', prs_status='Returned to Applicant' WHERE prs_id='$id';";
	//"DELETE FROM presentation WHERE prs_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_execute($stmt);
		smtpmailer($email_array['prs_email'],'140482@adzu.edu.ph', 'Ateneo Research Center', ' Your Application Form ', 'Your application for presentation titled '.$email_array['prs_papertitle'].' has been returned for some reason please check your account for more details or stop by the office.');
	}
	header("Location:../pages/secretary/secretary-presentation.php");
}

?>