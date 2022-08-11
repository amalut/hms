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
  noAccessForAdmin();
  noAccessIfNotLoggedIn();
?>
<div class="container">
<h2>Book an appoinment now.</h2>
<?php
  $id=$_SESSION['patient_id'];
  $query="select * from patients where patient_id='$id'";
	$result =mysqli_query($connection,$query);
	$row =mysqli_fetch_array($result);
  ?> <table class="table"> <?php
	  $link = "<tr><th>";
    $mid = "</th><td>";
    $endingTag = "</td></tr>";
    echo "<tr>";

    echo "$link Patient Id $mid". $row['patient_id'] . "$endingTag";
    echo "$link Full Name $mid" . $row['fullname'] . "$endingTag";
    echo "$link Email Id $mid" . $row['email'] . "$endingTag";
    echo "$link Age (in years) $mid" . $row['age'] . "$endingTag";
    echo "$link Gender $mid" . $row['gender'] . "$endingTag";
    echo "$link Weight $mid" . $row['weight'] . "$endingTag";
    echo "$link Phone No $mid" . $row['phone_no'] . "$endingTag";
    echo "$link Address $mid" . $row['address'] . "$endingTag";
  
?>
</table>
<form action="patient_home.php" method="POST">
            <div class="form-group">
              <label for="pwd">Doctor Needed:</label>
              <select required value=1 name="apSpecialist">
                <option value="Audiologist" class="option">Audiologist - Ear Expert</option>
                <option value="Allergist" class="option">Allergist - Allergy Expert</option>
                <option value="Anesthesiologist" class="option">Anesthesiologist - Anesthetic Expert</option>
                <option value="Cardiologist" class="option">Cardiologist - Heart Expert</option>
                <option value="Dentist" class="option">Dentist - Oral Care Expert</option>
                <option value="Dermatologist" class="option">Dermatologist - Skin Expert</option>
                <option value="Endocrinologist" class="option">Endocrinologist - Endocrine Expert</option>
              </select>
            </div>
            <div class="form-group">
              <label for="pwd">Medical Condition / Purpose of visit:</label>
              <textarea class="form-control" id="pwd" name="apCondition" required></textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="Book" class="btn btn-primary" >
              <input type="reset" name="" class="btn btn-danger">
            </div>
          </form>
</div>
