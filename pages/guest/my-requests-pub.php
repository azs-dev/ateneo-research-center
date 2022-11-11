<?php
session_start();
include_once '../../includes/mydbhandler.inc.php';
if (!isset($_SESSION['userUid'])) {
    session_unset();
    session_destroy();
    header("Location:../../index.php?error=nologin");
}
elseif ($_SESSION['userId'] == 2) {
  session_unset();
  session_destroy();
  header("Location:../../index.php?error=noaccess");
}
elseif ($_SESSION['userId'] == 1) {
  session_unset();
  session_destroy();
  header("Location:../../index.php?error=noaccess");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ateneo Research Center</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../images/seal.png"/>
	<!--Jquery-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<!--Boostrap-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">


</head>
<body>
  <!--navbar-->
<?php include("../../elements/aaNavbar.php") ?>
  <!--navbar-->
<!-- table -->
<div class="w3-container w3-animate-top">
<div class="container">
  <h2 class="title">My Publication Requests</h2>         
  <table class="table table-light table-striped">
    <thead>
      <tr>
        <th>Applicant</th>
        <th>Title</th>
        <th>Date Submitted</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $id_link = $_SESSION['userId'];
        $sql = "SELECT * FROM publication WHERE pub_link= '$id_link' ";
        $result = $conn->query($sql);

        if($result-> num_rows > 0){
          while ($row = $result-> fetch_assoc()) {
            echo "<tr><td>". $row['pub_applicant']."</td><td><a href='my-publication-view.php?id=".$row['pub_id']."'>". $row['pub_title']."</td><td>". $row['pub_date_sub']."</td><td>". $row['pub_status']."</td></tr>";
          }
        }
        else{
          echo "<h2>0 results</h2>";
        }

        $conn -> close();
        ?>
    </tbody>
  </table>
</div>
</div>

<!-- end of table -->
</body>
</html>