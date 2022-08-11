<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<?php
include("header.php");
  include 'library.php';
  noAccessIfNotLoggedIn();
  noAccessForNormal();
  noAccessForClerk();
  noAccessForAdmin();
  include 'nav-bar.php';
?>
<div class = 'container'>
<h2> <?php echo ($_SESSION['fullname']); ?> - <?php echo $_SESSION['speciality']; ?> Expert </h2>
<h3>Upcomming Appointments</h3>
<table class='table table-striped text-center '>
  <thead class="thead-inverse">
				<tr>
				<th><center>Appointment No</center></th>
                <th><center>Appointment Date</center></th>
				<th><center>Patient's Full Name</center></th>
				<th><center>Medical Condition</center></th>
				</tr>
	</thead>
<?php
    $specialist=$_SESSION['speciality'];
    $result = getPatientsFor($specialist);
    while ($row = $result->fetch_array()) {
        $status = ' ';
        if (appointment_status((int) $row['appointment_no']) == 1) {
            $status = 'table-active';
        } elseif (appointment_status((int) $row['appointment_no']) == 2) {
            $status = 'table-success';
        }
        $link = "<td ><a href= 'update_info.php?appointment_no=".$row['appointment_no']."'>";
        $endingTag = '</a></td>';
        echo '<tr class="'.$status.'"> ';
        echo "$link".$row['appointment_no']."$endingTag";
        echo "$link".$row['ap_date']."$endingTag";
        echo "$link".$row['fullname']."$endingTag";
        echo "$link".$row['medical_condition']."$endingTag";
        echo '</tr>';
    }
?>
</table>
</div>
<?php include 'footer.php'; ?>
