<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
  $beginning = '<div class="container"><nav class="navbar  navbar-default "><div class="navbar-header">
      <a class="navbar-brand">ABS HOSPITAL</a>
    </div><ul class="nav navbar-nav justified">';
  $frontLink = '<li class="nav-item"> <a class="" href="';
  $endLink = '</a></li>';

  if (isset($_SESSION['user-type'])) {
      echo $beginning;

      switch ($_SESSION['user-type']) {
      case 'doctor':
        echo $frontLink.'patient_info.php"> Home '.$endLink;
        echo $frontLink.'patient_info.php"> Upcomming Appointments '.$endLink;
        echo $frontLink.'logout.php"> Logout '.$endLink;
        break;
      case 'clerk':
        echo $frontLink.'patient_info.php"> All Appointments '.$endLink;
        echo $frontLink.'logout.php"> Logout '.$endLink;
        break;
      case 'normal':
        echo $frontLink.'patient_home.php"> Home '.$endLink;
        echo $frontLink.'add_apmnt.php"> Book a new Appointment '.$endLink;
        echo $frontLink.'patient_apmnts.php"> Your Appointments '.$endLink;
        echo $frontLink.'logout.php"> Logout '.$endLink;
        break;
      case 'admin':
         echo $frontLink.'patient_home.php"> Home '.$endLink;
         echo $frontLink.'logout.php"> Logout '.$endLink;
         break;
      default:
        break;
    }
  }
    else{
      echo $beginning;
      echo $frontLink.'index.php"> Home '.$endLink;
    }
      echo '</ul> </nav></div>';

?>
