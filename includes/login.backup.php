<?php
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($uid) || empty($pwd)) {
			header("Location:../index.php?emptyfields");
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE user_uid=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location:../index.php?error=sqlerror");
				exit();
			} 
			else {
				mysqli_stmt_bind_param($stmt, "s", $uid);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					$pwdCheck = password_verify($pwd, $row['user_pwd']);
					if ($pwdCheck == NULL) {
						echo "<script type='text/javascript'> document.location = '../index.php?invalidpwduid'; </script>";
						exit();
					}
					else if ($pwdCheck = 'true') {
						echo "true";
						session_start();
						$_SESSION['userId'] = $row['user_id'];
						$_SESSION['userUid'] = $row['user_uid'];
						echo "<script type='text/javascript'> document.location = '../pages/admin-login.php'; </script>";
						exit(); 
					}
					else {
						header("Location../index.php?=invalidpwduid");
						exit();						
					}
				}
				else {
					header("Location:../index.php?error=nouser");
					exit();
				}
			}
		}

} 
	else {
		header("Location:../index.php");
		exit();
	}
?>