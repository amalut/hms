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
  noAccessForAdmin();
  noAccessIfNotLoggedIn();
  include("nav-bar.php");
?>
<div class="container">
  <h2>Welcome, <?php echo $_SESSION['fullname'];?>!</h2>
      <div class='alert alert-info'>
              <strong>Info!</strong> Appointment will be booked only for today - <? echo date("d/m/y"); ?>. Appointment time will be between 10:30 to 3:30 or 4:30 to 9:30 once appointment is booked.</div>
                <?php
                  if(isset($_POST['apSpecialist'])){
                    appointment_booking($_SESSION['patient_id'], $_POST['apSpecialist'], $_POST['apCondition']);
                    unset($_POST['apSpecialist']);
                    if (isset($_POST['apSpecialist'])){
                      echo '<script type="text/javascript">location.reload();</script>';
                    }

                  }
  
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
Book a new appoiment?
<a href="add_apmnt.php">Click here.</a>
<?php
  include("footer.php");
?>
