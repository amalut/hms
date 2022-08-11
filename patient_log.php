<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">

<?php 
include("header.php");
  include("library.php");
  noAccessIfLoggedIn();
  include("nav-bar.php");
?>

<div align="center">
<div class="row">
  <div class="col-4 col-xl-4 col-sm-4 col-md-4">
</div>
  <div class="col-4 col-xl-4 col-sm-4 col-md-4">
<form method="post" action="index.php">
        <h2>Login</h2>
      <form action="index.php" method="POST">
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="lemail" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="lpassword" required>
        </div>
        <div>
        New user?
        <a href="patient_reg.php">Click here to register</a>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
          <input type="reset" class="btn btn-danger">
        </div>
          
      </form>
</div>
<div class="col-4 col-xl-4 col-sm-4 col-md-4">
</div>
</div></div>
<?php include("footer.php"); ?>