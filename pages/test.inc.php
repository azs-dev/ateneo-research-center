<?php
	if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png', 'pdf','doc');

	if (in_array($fileActualExt, $allowed)) 
		{
			if ($fileError === 0) {
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = '../uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$fileToDb = $fileNameNew;
				echo $fileToDb;
			}
			else {
			header("Location:/pages/guest/guest.php?failed");	
			}
	}
	else{
		header("Location:/pages/guest/guest.php?errorfiletype");
	}
	}

?>