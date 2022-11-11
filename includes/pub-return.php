<?php 
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	require '../mail/mail-func.php';
	$id = $_GET['id'];
	$email_array = $_SESSION['pub_email_array3'];

	$sql = "UPDATE publication SET pub_visibility='3', pub_status='Returned to Applicant' WHERE pub_id='$id';";
	//"DELETE FROM publication WHERE pub_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_execute($stmt);
		smtpmailer($email_array['pub_email'],'140482@adzu.edu.ph', 'Ateneo Research Center', ' Your Application Form ', 'Your application for publication titled '.$email_array['pub_title'].' has been returned for some reason, please check your account for more details or stop by the office.');
	}
	header("Location:../pages/secretary/secretary-publication.php");
}

?>