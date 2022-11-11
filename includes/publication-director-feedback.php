<?php
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	$id = $_GET['id'];

	$feedback = mysqli_real_escape_string($conn, $_POST['director-feedback']);
	$sql = "UPDATE publication SET pub_feedback_direc=?
			 WHERE pub_id='$id';";

		$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "s", $feedback);
		mysqli_stmt_execute($stmt);
	}
	header("Location:../pages/director/d-publication-view.php?id=".$_GET['id']."");
}
?>