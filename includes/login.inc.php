<?php
	session_start();
	
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
						$_SESSION['userId'] = $row['user_id'];
						$_SESSION['userUid'] = $row['user_uid'];
						if ($_SESSION['userId']=='1') {
							$_SESSION['userUid'] = $row['user_uid'];
							$_SESSION['userFirst'] = $row['user_first'];
						echo "<script type='text/javascript'> document.location= '../pages/director/admin-login.php?login=success'; </script>";
						}
						elseif ($_SESSION['userId']=='2') {
							$_SESSION['userUid'] = $row['user_uid'];
							$_SESSION['userFirst'] = $row['user_first'];
						echo "<script type='text/javascript'> document.location= '../pages/secretary/secretary-login.php?login=success'; </script>";
						}
						else
						{
							$_SESSION['userUid'] = $row['user_uid'];
							$_SESSION['userFirst'] = $row['user_first'];
							$_SESSION['userLast'] = $row['user_last'];
							$_SESSION['userEmail'] = $row['user_email'];
							$_SESSION['userPhone'] = $row['user_phone'];	
						echo "<script type='text/javascript'> document.location= '../pages/guest/guest.php?login=success'; </script>";
						}
					
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