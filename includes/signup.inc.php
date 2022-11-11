<?php

	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$username = mysqli_real_escape_string($conn, $_POST['uid']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);

	if (empty($first) || empty($last) || empty($email) || empty($phone) || empty($username) ||  empty($password)) {
		header("Location: ../pages/signup.php?error=emptyfields&first=".$first."&last=".$last."&email=".$email);
		exit();
	} else {
		$sql = "SELECT user_uid FROM users WHERE user_uid=?";
		$sql2 = "SELECT user_email FROM users WHERE user_email=?";
		$stmt2 = mysqli_stmt_init($conn);
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql) || !mysqli_stmt_prepare($stmt2,$sql2)) {
			header("Location:../index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_bind_param($stmt2, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			$resultCheck2 = mysqli_stmt_num_rows($stmt2);
			if ($resultCheck > 0) {
				header("Location: ../index.php?error=usernametaken");
				exit();
			}
			else if ($resultCheck2 > 0) {
				header("Location: ../index.php?error=emailtaken");
				exit();
			}
			 else {
					$sql = "INSERT INTO users (user_first, user_last, user_email,user_phone, user_uid, user_pwd)
					VALUES (?,?,?,?,?,?);";

					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "SQL error";
					} else {
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $email, $phone, $username, $hashedPwd);
						mysqli_stmt_execute($stmt);
					}

					header("Location:../index.php?signup=success");
					exit();
			}
		}	
	}

} else{
		header("Location:../index.php?signup=failed");
		exit();
}

?>