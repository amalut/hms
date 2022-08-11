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
  include("library.php");
  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();
  noAccessIfNotLoggedIn();
  include("nav-bar.php");

?>
<div class="container">
<form method="post" action="admin_home.php">
      <div class="form-group">
                <h2>Delete Clerks</h2>
            <select class='form-control' required value=1 name="ClDelEmail">
            <?php 
                $result = getListOfEmails('clerks');

                if(is_bool($result)){
                  echo "No clerks found in database";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                  }
                }

            ?>
            </select>
            </div>
            <div class="form-group">

            <input type="submit" class="btn btn-primary" style="padding: 10px;" value="Delete">
            </div>
          </form>
</div>