<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">

<?php 
  include("header.php");
  include("nav-bar.php");
  include("library.php");

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();
  noAccessIfNotLoggedIn();

?>
<div class="container">
<form method="post" action="admin_home.php">
      <h2>Clerk Registration</h2>
        <div class="form-group">
          <label for="usr">Full Name:</label>
          <input type="text" class="form-control" name="afullname" required>
        </div>
        
        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="email" class="form-control" name="aemail" required>
        </div>
            
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control"  name="apassword" required>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Register">
          <input type="reset" name="" class="btn btn-danger"></button>
        </div>
    </form>
</div>