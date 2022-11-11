<!DOCTYPE html>
<html>
<head>
	<title>Ateneo Research Center</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/seal.png"/>
	<!--Jquery-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<!--Boostrap-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">

</head>
<body>

<form action="../includes/signup.inc.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Fill up this form to create an account for Ateneo Research Center.</p>
    <hr>

    <label for="first"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first" required>

    <label for="last"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>Contact Number</b></label>
    <input type="text" value="0064" name="phone" maxlength="14" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uid" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
    <div class="clearfix">
      <a href="../index.php"><button type="button" class="cancelbtn" value="Go to Home">Cancel</button></a>
      <button type="submit" value="submit" name="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>