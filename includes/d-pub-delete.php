<?php 
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	$id = $_GET['id'];

	$sql = "DELETE FROM publication WHERE pub_id='$id';";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "s", $feedback);
		mysqli_stmt_execute($stmt);
	}
	header("Location:../pages/director/d-pub-view-all.php");
}

?>