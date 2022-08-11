<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<link href="bootstrap.min.css" rel="stylesheet">
<?php
include("header.php");
  include("library.php");
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();
  include("nav-bar.php");
?>
<div class="container">
<h2>Update Patient </h2>
<table class="table table-striped">
<?php
  if(isset($_POST['upSugg'])){
      $i = update_appointment_info($_POST['appointment_no'], 'doctors_suggestion', $_POST['upSugg']);
      if($i==1){
        $i = update_appointment_info($_POST['appointment_no'], 'case_closed', $_POST['case']);
        if($i==1){
              echo "<script type='text/javascript'>window.location = 'patient_info.php'</script>";
        }
      }
  }
  if(isset($_GET['appointment_no'])){
    $appointment_no = $_GET['appointment_no'];
    $result = getAllPatientDetail($appointment_no);
    while($row = $result->fetch_array())
    {
      $link = "<tr><th>";
      $mid = "</th><td>";
      $endingTag = "</td></tr>";
      $sug=$row['doctors_suggestion'];
      $date=$row['address'];
      echo "<tr>";
      echo "$link Appointment No $mid". $row['appointment_no'] . "$endingTag";
      echo "$link Appoiment Date  $mid" . $row['ap_date'] . "$endingTag";
      echo "$link Full Name $mid" . $row['fullname'] . "$endingTag";
      echo "$link Age (in years) $mid" . $row['age'] . "$endingTag";
      echo "$link Gender $mid" . $row['gender'] . "$endingTag";
      echo "$link Weight $mid" . $row['weight'] . "$endingTag";
      echo "$link Phone No $mid" . $row['phone_no'] . "$endingTag";
      echo "$link Address $mid" . $row['address'] . "$endingTag";
      echo "$link Medical Condition  $mid" . $row['medical_condition'] . "$endingTag";
      echo "$link Payment Status  $mid" . $row['payment_status'] . "$endingTag";
      echo "$link Case closed $mid" . "<form action='update_info.php' method='post'>
            <select name='case'>
            <option value='No'>No</option>
            <option value='Yes'>Yes</option>
            </select>" . "$endingTag";
      echo "$link Doctor's Suggestions  $mid" . "<textarea class='form-group form-control' name='upSugg' style='resize: none;' >$sug</textarea><input type='number' style='visibility: hidden; width; 1px;' name='appointment_no' value =". $appointment_no . "><input type='submit' class='btn btn-primary' action='update_info.php'></form>" . "$endingTag";
      echo "</tr>";
    }
  }
?>
</table>
</div>
<?php include("footer.php");?>
