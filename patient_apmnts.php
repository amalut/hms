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
<div class = 'container'>
<h2>All Appointments for <?php echo $_SESSION['fullname']; ?></h2>

<table class='table table-striped text-center '>
  <thead class="thead-inverse">
				<tr>
				<th><center>Appointment No</center></th>
                <th><center>Appointment Date</center></th>
				<th><center>Doctor Needed</center></th>
				<th><center>Medical Condition</center></th>
				<th><center>Dr's Suggestion</center></th>
                <th><center>Payment Amount</center></th>
                <th><center>Payment Status</center></th>
                <th><center>Case Closed</center></th>
                

				</tr>
				</thead>
<?php
    $id=$_SESSION['patient_id'];
	$q="select * from appointments,patients where patients.patient_id=appointments.patient_id and patients.patient_id='$id'";
    $result =mysqli_query($connection,$q);
	while($row = mysqli_fetch_array($result))
	{
		$status = ' ';
		if(appointment_status((int) $row['appointment_no']) == 1){
			$status= "table-active";
		}else if (appointment_status((int) $row['appointment_no']) == 2){
			$status= "table-success";
		}

		$link = "<td >";
		$endingTag = "</td>";
		echo "<tr class=\"" . $status . "\"> ";
		echo "$link". $row['appointment_no'] . "$endingTag";
        echo "$link" . $row['ap_date'] . "$endingTag";
        echo "$link" . $row['speciality'] . "$endingTag";
		echo "$link" . $row['medical_condition'] . "$endingTag";
        echo "$link" . $row['doctors_suggestion'] . "$endingTag";
		echo "$link" . $row['payment_amount'] . "$endingTag";
        echo "$link" . $row['payment_status'] . "$endingTag";
        echo "$link" . $row['case_closed'] . "$endingTag";
		echo "</tr>";
	}
?>
</table>
Book a new appoiment?
<a href="add_apmnt.php">Click here.</a>
</div>
<?php include("footer.php"); ?>