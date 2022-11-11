  <!-- Navbar content -->
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  		<nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark" style="background-color: #090998;">
        <img class="navbar-seal"src="../../images/seal.png">
  <a class="navbar-brand" href="#">A R C</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin-login.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pending Requests
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="director-publication.php">Publication</a>
          <a class="dropdown-item" href="director-presentation.php">Presentation</a>
        </div>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Requests
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="d-pub-view-all.php">Publication</a>
          <a class="dropdown-item" href="d-prs-view-all.php">Presentation</a>
        </div>
      </li>
    </ul>
    </ul>
        <ul class="nav navbar-nav ml-auto">
        <span class="navbar-text mr-3">
        Hello,
        <?php
            echo $_SESSION['userFirst'];
        ?>
        </span>
      <li class="nav-item m-auto">
      	<form action="../../includes/logout.inc.php" method="POST">
        <button type="submit" value="submit" class="btn btn-info btn-sm">Logout</button>
    	</form>
      </li>
    </ul>
  </div>
</nav>
  <!--End of navbar-->