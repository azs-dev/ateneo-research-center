<?php
session_start();
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
<div class="w3-container w3-center w3-animate-top">
<div class="container-fluid">
  <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        <h2>Ateneo Research Center</h2>
        <img src="../../images/arc.jpg">
        <section>
        <h3>Background</h3>
          <p>The Ateneo de Zamboanga University, “recognizing its responsibility to keep the educational community in touch with its internal and external realities,” continuously energizes the Ateneo Research Center (ARC).
          </p>
          <p>In furtherance of its vision-mission-goals, ARC “commits itself to foster a culture of research within and beyond the institution it serves”. It would accomplish this by taking an active role in the generation of research projects and by collaborating in and/or supporting significant research endeavors whether initiated by members of the school community or by its various constituencies.
          </p>
        </section>
        <section>
        <h3>Vision:</h3>
          <p>In light of engaged citizenship and inspired by the university’s vision and mission, the Ateneo Research Center (ARC)
            , guided by the principle of leadership through partnership, envisions to becoming a premier institution in the generation of new knowledge through research that responds to the realities of Mindanao and beyond.
          </p>
        </section>
        <section>
        <h3>Mission:</h3>
        <p>The  Ateneo  Research  Center aims to establish a dynamic research culture rooted on sound scientific inquiry  committed  to quality research and publication; genuine partnerships within and across disciplines and institutions; providing
         extensive support for research endeavors geared towards addressing critical issues concerning the environment, peace and development, education, health, governance, entrepreneurship, and information technology.
       </p>
        </section>
        <section>
        <h3>Goals</h3>
          <p>Within and beyond Ateneo de Zamboanga University, ARC seeks to:</p>
          <p>
          1. Strengthen Research capabilities of faculty and staff<br>
          2. Increase Quality of Research Output<br>
          3. Enhance research partnership with external agencies and institutions<br>
          4. Promote Research and Development<br>
          5. Strengthen ARC Staff development<br>
          6. Dedicate research endeavors towards knowledge building in Mindanao<br>
        </p>
        </section>
      </div>
      <div class="col-2">
      </div>   
  </div>
  <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8 footz">
    </div>
    <div class="col-2">
    </div>
  </div>
</div>
</div>

</body>
</html>