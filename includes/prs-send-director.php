<?php 
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	$id = $_GET['id'];

	$sql = "UPDATE presentation SET prs_visibility='1', prs_status='Sent to Director' WHERE prs_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "s", $feedback);
		mysqli_stmt_execute($stmt);
	}
	header("Location:../pages/secretary/secretary-presentation.php");
}
?>