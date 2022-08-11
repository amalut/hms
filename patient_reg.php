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
        <form method="post" action="index.php">
	    <h2>Registration</h2>
	      <div class="form-group">
	        <label for="usr">Full Name:</label>
	        <input type="text" class="form-control" name="rfullname" required>
	      </div>
        
        <div class="form-group">
	        <label for="usr">Email:</label>
	        <input type="email" class="form-control" name="remail" required>
	      </div>
	          
        <div class="form-group">
	        <label for="pwd">Password:</label>
	        <input type="password" class="form-control"  name="rpassword" required>
	      </div>
          <div>
		  <div class="form-group">
              <label for="pwd">Age: (in years)</label>
              <input type="number" class="form-control" id="pwd" name="rAge" min="1" max="200" required>
            </div>
			<div class="form-group">
              <label for="pwd">Gender:</label>
              <input type="text" class="form-control" id="pwd" name="rgender" required>
            </div>
            <div class="form-group">
              <label for="pwd">Weight (in kgs):</label>
              <input type="tel" class="form-control" id="pwd" name="rweight" min="1" max="300" required>
            </div>
            <div class="form-group">
              <label for="pwd">Phone No:</label>
              <input type="tel" class="form-control" id="pwd" name="rphone_no" required>
            </div>
            <div class="form-group">
              <label for="pwd">Address:</label>
              <textarea class="form-control" id="pwd" name="raddress" required></textarea>
            </div>
        Already an user?
        <a href="patient_log.php">Click here to Login</a>
        </div>
	      <div class="form-group">
	        <input type="submit" class="btn btn-primary">
	        <input type="reset" class="btn btn-danger"></button>
	      </div>
    </form>
</div>
<div class="col-4 col-xl-4 col-sm-4 col-md-4">
</div>
</div></div>
<?php include("footer.php"); ?>