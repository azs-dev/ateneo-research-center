<?php
	session_start();
	if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
	$prs_link = $_SESSION['userId'];
	$prs_date_sub = date("d/m/Y");
	$prs_phone = $_SESSION['userPhone'];
	

	//upload attachment
	$fileToDb = 0;
	$file = $_FILES['file'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png', 'pdf','doc','txt','docx');

	if (in_array($fileActualExt, $allowed)) 
		{
			if ($fileError === 0) {
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = '../uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$fileToDb = $fileNameNew;
			}
			else {
			header("Location:/pages/guest/guest.php?failed");	
			}
	}
	else{
		header("Location:/pages/guest/guest.php?errorfiletype");
	}
	//end of upload

	$applicant = mysqli_real_escape_string($conn, $_POST['applicant']); 
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$department = mysqli_real_escape_string($conn, $_POST['department']); 
	$titleofpaper = mysqli_real_escape_string($conn, $_POST['titleofpaper']);
	$conftitle = mysqli_real_escape_string($conn, $_POST['conferencetitle']);
	$confdate = mysqli_real_escape_string($conn, $_POST['conferencedate']);
	$reg = mysqli_real_escape_string($conn, $_POST['regamount']);
	$airfaire = mysqli_real_escape_string($conn, $_POST['airfareamount']);
	$per = mysqli_real_escape_string($conn, $_POST['peramount']);
	$visa = mysqli_real_escape_string($conn, $_POST['visaamount']);
	$others = mysqli_real_escape_string($conn, $_POST['othersamount']);
	$important = mysqli_real_escape_string($conn, $_POST['important']);

	$sql = "INSERT INTO presentation (prs_applicant,prs_email, prs_phone, prs_department,prs_papertitle,prs_conftitle,prs_confdate,
			prs_reg_amount,prs_air_amount,prs_perdiem_amount,prs_visa_amount,prs_others_amount,prs_important,prs_link,prs_date_sub,prs_file)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "SQL error";
	} else {
		mysqli_stmt_bind_param($stmt, "sssssssddddsssss", $applicant, $email, $prs_phone, $department, $titleofpaper, $conftitle, $confdate,$reg,$airfaire,$per,$visa,$others,$important,$prs_link,$prs_date_sub,$fileToDb);
		mysqli_stmt_execute($stmt);
	}

	header("Location:../pages/guest/my-requests-prs.php?application=submitted");
}						
	else {
		header("Location:../index.php?submitting=failed");
		session_unset();
		session_destroy();
		exit();
	}
?>