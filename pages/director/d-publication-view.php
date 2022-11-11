<?php
session_start();
include_once '../../includes/mydbhandler.inc.php';
if (!isset($_SESSION['userUid'])) {
    header("Location:../../index.php?error=nologin");
    session_unset();
    session_destroy();
}
elseif ($_SESSION['userId']!='1') {
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
<?php include("../../elements/aaNavbar-director.php") ?>
<!--end of navbar-->
<br>
<br>
<br>
<br>
  <!-- table -->
  <div class="contz">
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM publication WHERE pub_id='$id'";
    $sql2 = "SELECT * FROM publication WHERE pub_id='$id' AND pub_file!=0";
    $result2 = $conn->query($sql2);
    $result = $conn->query($sql);
    if($result-> num_rows > 0){
        $row = $result-> fetch_assoc();
        $_SESSION['pub_email_array'] = $row;

    }
    ?>
<div class="w3-container w3-animate-top">
  <div class="wrapper-form">
    <?php echo'<h2>'.$row['pub_title'].'</h2>'; ?>
       <form action="../../includes/publication.inc.php" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <?php
          echo '<input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required" name="email" value="'.$row['pub_email']; echo '"readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputApplicant">Applicant</label>
          <?php
          echo '<input type="text" class="form-control" id="inputApplicant" placeholder="Applicant" required="required" name="applicant" value="'.$row['pub_applicant'].'"readonly>';
          ?>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Unit/Department</label>
        <?php
        echo '<input type="text" class="form-control" id="inputAddress" placeholder="Unit/Department" required="required" name="department" value="'.$row['pub_department'].'"readonly>';
        ?>
      </div>
      <div class="form-group col-md-6">
        <label for="inputTitle">Title of Publication</label>
        <?php
        echo '<input type="text" class="form-control" id="inputTitle" placeholder="Title of Publication" required="required" name="title" value="'.$row['pub_title'].'" readonly>';
        ?>
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputVolume">Volume/Edition</label>
          <?php
          echo '<input type="text" class="form-control" id="inputVolume" placeholder="Volume/Edition" name="volume" value="'.$row['pub_volume'].'" readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPublisher">Publisher</label>
          <?php
          echo '<input type="text" class="form-control" id="inputPublisher" placeholder="Publisher" name="publisher" value="'.$row['pub_publisher'].'" readonly>';
          ?>
        </div>
    </div>
          <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Date Submitted</label>
          <?php
          echo '<input type="text" class="form-control" value="'.$row['pub_date_sub'].'"readonly>';
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Phone Number</label>
          <?php
          echo '<input type="text" class="form-control" value="'.$row['pub_phone'].'"readonly>';
          ?>
        </div>
      </div>
<!--Check box-->

<div class="form-row">
  <div class="col-md-3">
  <h3>Books</h3>
  <div class="form-check">
  <label class="form-check-label" for="book-national" >
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['pub_books'].'"readonly>';
    ?>
  </label>
</div>
</div>
<div class="col-md-3">
   <h3>Chapter of a Book</h3>
<div class="form-check">
  <label class="form-check-label" for="chapter-national">
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['pub_chapter'].'"readonly>';
    ?>
  </label>
</div>
</div>
<div class="col-md-3">
<h3>Original Literary Works</h3>
<div class="form-check">
  <label class="form-check-label" for="literary-national">
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['pub_literary'].'"readonly>';
    ?>
  </label>
</div>
</div>
</div>
<div class="form-row">

<div class="col-md-3">
<h3>Journal Articles</h3>
<div class="form-check">
  <label class="form-check-label" for="Isi">
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['pub_journal'].'"readonly>';
    ?>
  </label>
</div>
<div class="form-check">
</div>
<div class="form-check">

</div>
</div>

<div class="col-md-3">
<h3>Cash Gifts</h3>
  <div class="form-check">
    <label for="cashgifts" class="form-check-label"></label>
    <?php
    echo '<input class="form-control" id="cashgifts" rows="1" placeholder="" name="cashgifts" value="'.$row['pub_gifts'].'" readonly>';
    ?>
  </div>
</div>

<?php
    if ($result2-> num_rows > 0) {
      if ($row2 = $result2-> fetch_assoc()) {
        $_SESSION['pub_email_array2'] = $row2;
echo '<div class="col-md-3">
  <h3>Attachment</h3>
  <div class="form-group">
      <p><a href="../../uploads/'.$row2['pub_file'].'" download>Download Attached File</a></p>
  </div>
</div>';
          }
      }
?>
<!--end of checkbox-->
<div class="form-group col-md-7">
  <h3>Other Important Details</h3>
  <?php
    echo '<textarea class="form-control important-publication" id="exampleFormControlTextarea1" rows="3" name="important"readonly>'.$row['pub_important'].'</textarea>';
    ?>
</div>
<div class="form-group col-md-7">
  <h3>Secretary Feedback</h3>
  <?php
    echo '<textarea class="form-control important-publication" id="exampleFormControlTextarea1" rows="3" name="important"readonly>'.$row['pub_feedback_sec'].'</textarea>';
    ?>
</div>
<div class="form-group col-md-7">
  <h3>Director Feedback</h3>
  <?php
    echo '<textarea class="form-control important-publication" id="exampleFormControlTextarea1" rows="3" name="important"readonly>'.$row['pub_feedback_direc'].'</textarea>';
    ?>
</div>
</div>
<div class="form-row">
  <div class="col-md-3">
  <h3>Status</h3>
  <?php
  if ($row['pub_status']=="Rejected") {
    echo "<div class='form-check statsred'>";
  }
  elseif ($row['pub_status']=="Approved") {
    echo "<div class='form-check statsgreen'>";
  }
  else {
    echo "<div class='form-check statsyellow'>";
  }

  ?>
  <label class="form-check-label" for="book-national" >
    <?php 
    echo '<input type="text" class="form-control" value="'.$row['pub_status'].'"readonly>';
    ?>
  </label>
</div>
</div>
</div>
  </form>


    <!--buttons-->
  <?php
  echo "<div class='form-row ml-3'>";
  echo "<div class='col-md-3'>";
    echo "<form method='POST' action='../../includes/publication-director-feedback.php?id=".$id."''>
      <textarea placeholder='Director Feedback' name='director-feedback' required></textarea><br>
      <button class='btn btn-dark' type='submit' name='submit' value='submit'>Add Feedback</button>
    </form>";
  echo "</div>";
  echo "</div>";
    ?>
    <?php
  echo "<div class='form-row ml-3'>";
  echo "<div class='col-md-2'>";
     echo "<form method='POST' action='../../includes/pub-approve-director.php?id=".$id."''>
      <button class='btn btn-success' type='submit' name='submit' value='submit'>Approve</button>
    </form>";
  echo "</div>"
    ?>
    <?php
  echo "<div class='col-md-2'>";
     echo "<form method='POST' action='../../includes/pub-reject-director.php?id=".$id."''>
      <button class='btn btn-danger' type='submit' name='submit' value='submit'>Reject</button>
    </form>";
  echo "</div>";
    ?>
    <?php
  echo "<div class='col-md-2'>";
    echo "<form method='POST' action='../../includes/d-pub-delete.php?id=".$id."''>
      <button class='btn btn-danger' type='submit' name='submit' value='submit'>Delete</button>
    </form>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
    ?>
  </div>
<!-- end of table -->
</body>
</html>