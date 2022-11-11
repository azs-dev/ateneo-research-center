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
  <!--navbar-->
<?php include("../../elements/aaNavbar.php") ?>
  <!--navbar-->
  <div class="w3-container w3-animate-top">
  <div class="wrapper-form">
     <h2>Presentation Application Form</h2>
       <form action="../../includes/presentation.inc.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <?php
          echo '<input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required" name="email" value="'.$_SESSION['userEmail']; echo '"readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputApplicant">Applicant</label>
          <?php
          echo '<input type="text" class="form-control" id="inputApplicant" placeholder="Applicant" required="required" name="applicant" value="'.$_SESSION['userFirst']; echo ' ' .$_SESSION['userLast']; echo '"readonly>'
          ?>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Unit/Department</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Unit/Department" required="required" name="department">
      </div>
      <div class="form-group col-md-6">
        <label for="inputTitle">Title of Paper</label>
        <input type="text" class="form-control" id="inputTitle" placeholder="Title of Paper" required="required" name="titleofpaper">
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputConference">Conference Title</label>
          <input type="text" class="form-control" id="inputConference" placeholder="Conference Title" required="required" name="conferencetitle">
        </div>
        <div class="form-group col-md-6">
          <label for="inputDate">Date of Conference</label>
          <input type="date" class="form-control" id="inputDate" name="conferencedate">
        </div>

    </div>
<!--Check box-->

<div class="check-only"><h3>Check as Many</h3></div>
<div class="form-row">

<div class="col-md-3">
  <h3>Registration</h3>
  <div class="form-group">
    <div class="form-check">
       <input class="form-check-input" type="checkbox" name="registration[]" id="presentation-registration" value="checked">
        <label class="form-check-label presentation" for="presentation-registration">
     Registration
    </label>
    </div>
    <label for="registration-amount"></label>
    <textarea class="form-control amount" id="registration-amount" rows="1" placeholder="Enter Amount" name="regamount" ></textarea>
  </div>
</div>

<div class="col-md-3">
  <h3>Airfare Local</h3>
  <div class="form-group">
    <div class="form-check">
       <input class="form-check-input" type="checkbox" name="airfare[]" id="presentation-airfare" value="checked">
        <label class="form-check-label presentation" for="presentation-airfare">
     Airfare Local
    </label>
    </div>
    <label for="airfare-amount"></label>
    <textarea class="form-control amount" id="airfare-amount" rows="1" placeholder="Enter Amount" name="airfareamount"></textarea>
  </div>
</div>

<div class="col-md-3">
  <h3>Per Diem</h3>
  <div class="form-group">
    <div class="form-check">
       <input class="form-check-input" type="checkbox" name="perdiem[]" id="presentation-perdiem" value="checked">
        <label class="form-check-label presentation" for="presentation-perdiem">
     Per Diem
    </label>
    </div>
    <label for="perdiem-amount"></label>
    <textarea class="form-control amount" id="perdiem-amount" rows="1" placeholder="Enter Amount" name="peramount"></textarea>
  </div>
</div>

<div class="col-md-3">
  <h3>Visa Processing Cost</h3>
  <div class="form-group">
    <div class="form-check">
       <input class="form-check-input" type="checkbox" name="visa[]" id="presentation-visa" value="checked">
        <label class="form-check-label presentation" for="presentation-visa">
     Visa Processing Cost
    </label>
    </div>
    <label for="visa-amount"></label>
    <textarea class="form-control amount" id="visa-amount" rows="1" placeholder="Enter Amount" name="visaamount"></textarea>
  </div>
</div>

<div class="col-md-3">
  <h3>Others, Please Specify</h3>
  <div class="form-group">
    <div class="form-check">
       <input class="form-check-input" type="checkbox" name="others[]" id="presentation-others" value="checked">
        <label class="form-check-label presentation" for="presentation-others">
     Others, Please Specify with Amount
    </label>
    </div>
    <label for="others-amount"></label>
    <textarea class="form-control amount" id="others-amount" rows="1" placeholder="Enter Amount" name="othersamount"></textarea>
  </div>
</div>


<div class="form-group col-md-6">
  <h3>Other Important Details</h3>
    <textarea class="form-control important-presentation" id="exampleFormControlTextarea1" rows="3" placeholder="Other Imporant Details" name="important"></textarea>
  </div>
</div>  
<h3>Add an Attachment</h3>
  <div class="form-row">
    <div class="col-md-3">
      <input type="file" name="file">
    </div>
  </div>
  <div class="form-group col-md-3">
    <button type="submit" name="submit" value="submit" class="btn btn-primary button-presentation">Submit</button>
</div>
      </form>

</div>
</body>
</html>
