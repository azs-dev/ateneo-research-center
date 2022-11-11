<?php
session_start();
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
  <div class="w3-container w3-animate-top">
  <div class="wrapper-form">
    <h2>Publication Application Form</h2>
       <form action="../../includes/publication.inc.php" method="POST" enctype="multipart/form-data">
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
          echo '<input type="text" class="form-control" id="inputApplicant" placeholder="Applicant" required="required" name="applicant" value="'.$_SESSION['userFirst']; echo ' ' .$_SESSION['userLast']; echo '"readonly>';
          ?>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Unit/Department</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Unit/Department" required="required" name="department">
      </div>
      <div class="form-group col-md-6">
        <label for="inputTitle">Title of Publication</label>
        <input type="text" class="form-control" id="inputTitle" placeholder="Title of Publication" required="required" name="title">
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputVolume">Volume/Edition</label>
          <input type="text" class="form-control" id="inputVolume" placeholder="Volume/Edition" name="volume">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPublisher">Publisher</label>
          <input type="text" class="form-control" id="inputPublisher" placeholder="Publisher" name="publisher">
        </div>
    </div>
<!--Check box-->


<div class="check-only"><h3>Check only 1 per category</h3></div>
<div class="form-row">
  <div class="col-md-3">
  <h3>Books</h3>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="books[]" id="book-national" value="national">
  <label class="form-check-label" for="book-national">
    National
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="books[]" id="book-international" value="international">
  <label class="form-check-label" for="book-international">
    International
  </label>
</div>
</div>
<div class="col-md-3">
   <h3>Chapter of a Book</h3>
<div class="form-check">
  <input class="form-check-input" type="radio" name="chapter[]" id="chapter-national" value="national" >
  <label class="form-check-label" for="chapter-national">
    National
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="chapter[]" id="chapter-international" value="international">
  <label class="form-check-label" for="chapter-international">
    International
  </label>
</div>
</div>
<div class="col-md-3">
<h3>Original Literary Works</h3>
<div class="form-check">
  <input class="form-check-input" type="radio" name="literary[]" id="literary-national" value="national">
  <label class="form-check-label" for="literary-national">
    National
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="literary[]" id="literary-international" value="international">
  <label class="form-check-label" for="literary-international">
    International
  </label>
</div>
</div>
</div>
<div class="form-row">

<div class="col-md-3">
<h3>Journal Articles</h3>
<div class="form-check">
  <input class="form-check-input" type="radio" name="journal[]" id="Isi" value="isi articles">
  <label class="form-check-label" for="Isi">
    ISI Articles
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="journal[]" id="article-national" value="international non-isi">
  <label class="form-check-label" for="article-national">
    International Non-ISI
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="journal[]" id="article-international" value="national non-isi">
  <label class="form-check-label" for="article-international">
    National Non-ISI
  </label>
</div>
</div>

<div class="col-md-3">
<h3>Cash Gifts</h3>
  <div class="form-group">
    <label for="cashgifts"></label>
    <textarea class="form-control" id="cashgifts" rows="1" placeholder="Leave blank if none" name="cashgifts"></textarea>
  </div>
</div>

<div class="col-md-3">
  <h3>Add an Attachment</h3>
  <div class="form-group">
      <input type="file" name="file">
  </div>
</div>

<!--end of checkbox-->
<div class="form-group col-md-7">
  <h3>Other Important Details</h3>
    <textarea class="form-control important-publication" id="exampleFormControlTextarea1" rows="3" placeholder="Other Imporant Details" name="important"></textarea>
  </div>
</div>
      <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</body>
</html>
