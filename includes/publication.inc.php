<?php
    session_start();
    if (isset($_POST['submit'])) {
	include_once 'mydbhandler.inc.php';
    $pub_link = $_SESSION['userId'];
    $pub_date_sub = date("d/m/Y");
    $pub_phone = $_SESSION['userPhone'];

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

    $applicant = mysqli_real_escape_string($conn,$_POST['applicant']); 
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$department = mysqli_real_escape_string($conn,$_POST['department']); 
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$publisher = mysqli_real_escape_string($conn,$_POST['publisher']); 
    $volume = mysqli_real_escape_string($conn,$_POST['volume']);
    $gifts = mysqli_real_escape_string($conn,$_POST ['cashgifts']);
    $important = mysqli_real_escape_string($conn,$_POST ['important']);

    $books = $_POST ['books'];
    foreach ($books as $value) {
    	if ($value !="") {
    		$books = mysqli_real_escape_string($conn,$value);
    	}
    } 

    $chapter = $_POST ['chapter']; 
    foreach ($chapter as $value) {
    	if ($value !=''){
    		$chapter = mysqli_real_escape_string($conn,$value);
    	}
    }

    $literary = $_POST ['literary'];
    foreach ($literary as $value) {
    	if ($value !=''){
    		$literary = mysqli_real_escape_string($conn,$value);
    	}
    }
    $journal = $_POST ['journal'];
    foreach ($journal as $value) {
    	if ($value !=''){
    		$journal = mysqli_real_escape_string($conn,$value);
    	}
    }

    $sql = "INSERT INTO publication (pub_applicant, pub_email, pub_phone, pub_department, pub_title, pub_publisher, 							pub_volume, pub_books, pub_chapter, pub_literary, pub_journal, pub_gifts, pub_important,pub_link,pub_date_sub,pub_file)
     		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt,"ssssssssssssssss",$applicant,$email, $pub_phone, $department,$title,$publisher,$volume,
            $books,$chapter,$literary,$journal,$gifts,$important,$pub_link,$pub_date_sub,$fileToDb);
        mysqli_stmt_execute($stmt);
    }

     	header("Location:../pages/guest/my-requests-pub.php?application=submitted");

}   else {
        header("Location:../index.php?submitting=failed");
        session_unset();
        session_destroy();
        exit();
    }
?>