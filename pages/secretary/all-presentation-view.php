<?php
session_start();
include_once '../../includes/mydbhandler.inc.php';
if (!isset($_SESSION['userUid'])) {
    header("Location:../../index.php?error=nologin");
    session_unset();
    session_destroy();
}
elseif ($_SESSION['userId']!='2') {
  header("Location:../../index.php?error=noaccess");
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
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
<?php include("../../elements/aaNavbar-secretary.php") ?>
<!--navbar-->
<br>
<br>
<br>
  <!--End of navbar-->
  <!-- table -->
<div class="w3-container w3-animate-top">
  <div class="contz">
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM presentation WHERE prs_id='$id'";
    $sql2 = "SELECT * FROM presentation WHERE prs_id='$id' AND prs_file!=0";
    $result2 = $conn->query($sql2);
    $result = $conn->query($sql);
    if($result-> num_rows > 0){
        $row = $result-> fetch_assoc();
        }
    ?>
<div class="w3-container w3-animate-top">
  <div class="wrapper-form">
     <?php echo'<h2>'.$row['prs_papertitle'].'</h2>'; ?>
       <form action="../../includes/presentation.inc.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <?php
          echo '<input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required" name="email" value="'.$row['prs_email']; echo '"readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputApplicant">Applicant</label>
          <?php
          echo '<input type="text" class="form-control" id="inputApplicant" placeholder="Applicant" required="required" name="applicant" value="'.$row['prs_applicant'].'"readonly>'
          ?>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Unit/Department</label>
        <?php
        echo '<input type="text" class="form-control" id="inputAddress" placeholder="Unit/Department" required="required" name="department" value='.$row['prs_department'].' readonly>';
        ?>
      </div>
      <div class="form-group col-md-6">
        <label for="inputTitle">Title of Paper</label>
        <?php
        echo '<input type="text" class="form-control" id="inputTitle" placeholder="Title of Paper" name="titleofpaper" value='.$row['prs_papertitle'].' readonly>';
        ?>
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputConference">Conference Title</label>
          <?php
          echo '<input type="text" class="form-control" id="inputConference" placeholder="Conference Title" name="conferencetitle" value='.$row['prs_conftitle'].' readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputDate">Date of Conference</label>
          <?php
          echo '<input type="date" class="form-control" id="inputDate" name="conferencedate" value='.$row['prs_confdate'].' readonly>';
          ?>
        </div>

    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Date Submitted</label>
          <?php
          echo '<input type="text" class="form-control" value="'.$row['prs_date_sub'].'"readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Phone Number</label>
          <?php
          echo '<input type="text" class="form-control" value="'.$row['prs_phone'].'"readonly>';
          ?>
        </div>
      </div>
<!--Check box-->

<div class="check-only"><h3>Check as Many</h3></div>
<div class="form-row">

<div class="col-md-3">
  <h3>Registration</h3>
  <div class="form-group">
    <div class="form-check">
    </div>
    <label for="registration-amount"></label>
    <?php
    echo '<textarea class="form-control amount" id="registration-amount" rows="1" name="regamount" readonly>'.$row['prs_reg_amount'].'</textarea>';
    ?>
  </div>
</div>

<div class="col-md-3">
  <h3>Airfare Local</h3>
  <div class="form-group">
    <div class="form-check">
    </div>
    <label for="airfare-amount"></label>
    <?php
    echo '<textarea class="form-control amount" id="airfare-amount" rows="1" name="airfareamount" readonly>'.$row['prs_air_amount'].'</textarea>';
    ?>
  </div>
</div>

<div class="col-md-3">
  <h3>Per Diem</h3>
  <div class="form-group">
    <div class="form-check">
    </div>
    <label for="perdiem-amount"></label>
    <?php
    echo '<textarea class="form-control amount" id="perdiem-amount" rows="1" name="peramount" readonly>'.$row['prs_perdiem_amount'].'</textarea>';
    ?>
  </div>
</div>

<div class="col-md-3">
  <h3>Visa Processing Cost</h3>
  <div class="form-group">
    <div class="form-check">
    </div>
    <label for="visa-amount"></label>
    <?php
    echo '<textarea class="form-control amount" id="visa-amount" rows="1" name="visaamount" readonly>'.$row['prs_visa_amount'].'</textarea>';
    ?>
  </div>
</div>

<div class="col-md-4">
  <h3>Others, Please Specify</h3>
  <div class="form-group">
    <div class="form-check">
    </div>
    <label for="others-amount"></label>
    <?php
    echo '<textarea class="form-control amount" id="others-amount" rows="3" name="othersamount" readonly>'.$row['prs_others_amount'].'</textarea>';
    ?>
  </div>
</div>
<?php
if ($result2-> num_rows > 0) {
    if ($row2 = $result2-> fetch_assoc()) {
echo'
<div class="col-md-4">
<h3>Attachments</h3>
  <div class="form-row">
 <div class="form-group">
      <p><a href="../../uploads/'.$row2['prs_file'].'" download>DOWNLOAD ATTACHMENT</a></p>
  </div>
  </div>
</div>';
}
}
?>
</div>

<div class="form-row">
<div class="form-group col-md-6">
  <h3>Other Important Details</h3>
  <?php
    echo '<textarea class="form-control important-presentation" id="exampleFormControlTextarea1" rows="3"  name="important" readonly>'.$row['prs_important'].'</textarea>';
    ?>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
  <h3>Secretary Feedback</h3>
  <?php
    echo '<textarea class="form-control important-presentation" id="exampleFormControlTextarea1" rows="3"  name="important" readonly>'.$row['prs_feedback_sec'].'</textarea>';
    ?>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
  <h3>Director Feedback</h3>
  <?php
    echo '<textarea class="form-control important-presentation" id="exampleFormControlTextarea1" rows="3" name="important" readonly>'.$row['prs_feedback_direc'].'</textarea>';
    ?>
  </div>
</div>

<div class="form-row">
<div class="col-md-3">
  <h3>Status</h3>
  <div class="form-group">
  <?php
  if ($row['prs_status']=="Rejected") {
    echo "<div class='form-check statsred'>";
  }
  elseif ($row['prs_status']=="Approved") {
    echo "<div class='form-check statsgreen'>";
  }
  else {
    echo "<div class='form-check statsyellow'>";
  }
  ?>
  <label class="form-check-label" for="book-national" >
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['prs_status'].'"readonly>';
    ?>
  </label>
</div>
</form>
</div>
</div>
</div>
  <?php
  echo "<div class='form-row ml-3'>";
  echo "<div class='col-md-5'>";
    echo "<form method='POST' action='../../includes/sec-prsdelete-from-all.php?id=".$id."''>
      <button class='btn btn-danger' type='submit' name='submit' value='submit'>Delete Request</button>
    </form>";
  echo "</div></div>";
    ?>
</div>
<!-- end of table -->
</body>
</html>