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
  noAccessForNormal();
  noAccessForAdmin();
  noAccessForDoctor();
  include('nav-bar.php');
?>
<div class="container">
<h2>Update Payment Information</h2>
<p>Enter information below</p>
<table class="table table-striped">
<?php



  if(isset($_POST['payment'])){
      $i = update_appointment_info($_POST['appointment_no'], 'payment_amount', $_POST['payment']);
      if($i==1){
        $i = update_appointment_info($_POST['appointment_no'], 'payment_status', $_POST['status']);
        if($i==1){
          echo "<script type='text/javascript'>window.location = 'all_appointments.php'</script>";
        }
      }
      
  }

  if(isset($_GET['appointment_no'])){
    $appointment_no = $_GET['appointment_no'];
    $result = getAllPatientDetail($appointment_no);

	$row = $result->fetch_array();
  
    $link = "<tr><th>";
    $mid = "</th><td>";
    $endingTag = "</td></tr>";
    echo "<tr>";

    echo "$link Appointment No $mid". $row['appointment_no'] . "$endingTag";
    echo "$link Appoiment Date - $mid" . $row['ap_date'] . "$endingTag";
    echo "$link Full Name $mid" . $row['fullname'] . "$endingTag";
    echo "$link Age (in years) $mid" . $row['age'] . "$endingTag";
    echo "$link Gender $mid" . $row['gender'] . "$endingTag";
    echo "$link Weight $mid" . $row['weight'] . "$endingTag";
    echo "$link Phone No $mid" . $row['phone_no'] . "$endingTag";
    echo "$link Address $mid" . $row['address'] . "$endingTag";
    echo "$link Medical Condition $mid" . $row['medical_condition'] . "$endingTag";
    echo "$link Payment amount $mid" . "<form action='payment.php' method='post'>
          <input type='number' name='payment' value=" . $row['payment_amount'] . ">
          <input type='number' style='visibility: hidden; width; 1px;' name=\"appointment_no\" value =" . $appointment_no . ">" . "$endingTag";
    echo "$link Payment status $mid" . "<select name='status'>
    <option value='Not done'>Not done</option>
    <option value='Done'>Done</option>
    </select>
    <input type='submit' class='btn btn-primary' action='payment.php'></form>" . "$endingTag";
    echo "</tr>";
  
  }
?>
</table>

</div>


<?php include("footer.php"); ?>


