<?php
session_start();
?>
<link href="bootstrap.min.css" rel="stylesheet">

<?php 
  include("header.php");
  include("library.php");
  noAccessIfLoggedIn();
  echo "<br>";
  include("nav-bar.php");
?>
<div class="container">
 	<h1>Welcome ABS Hospital's Official Website</h1>
    <p class="block-quote">Our aim has always been to bring world–class medical care within the reach of common man.</p>
    <p><?php include('slideshow.php');?></p>
  <?php 
    if(isset($_POST['lemail'])){
      $i = login($_POST['lemail'],$_POST['lpassword'],"patients");
      if($i==1){
        echo '<script type="text/javascript"> window.location = "patient_home.php" </script>';
      }
    }else if(isset($_POST['remail'])){
        global $connection,$error_flag;
        $email = secure($_POST['remail']);
			  $password = secure($_POST['rpassword']);
      	$fullname = ucfirst(secure($_POST['rfullname']));
      	$age = secure($_POST['rAge']);
        $gender= secure($_POST['rgender']);
      	$weight = secure($_POST['rweight']);
      	$phone = secure($_POST['rphone_no']);
      	$address = secure($_POST['raddress']);
        
        
        $sql = "INSERT INTO patients (email,password,fullname,age,gender,weight,phone_no,address) VALUES ('$email','$password','$fullname', $age,'$gender',$weight,'$phone','$address');";

        if ($connection->query($sql) === true) {
            echo status('record-success');
            if ($error_flag == 0) {
                $i=login($email,$password);
                if($i==1){
                  echo '<script type="text/javascript"> window.location = "patient_home.php"</script>';
                }
                else{
                  echo "<div class='alert alert-info'>
                        <strong>Info!</strong> Login or Register to be able to book your appointment.</div>";
                }
            }
          else {
              echo status('record-fail');
          }
      }
      unset($_POST);
    }
  ?>
<div class="row">
  <div class="col col-xl-6 col-sm-6">
      <a href="patient_log.php"><h2 align="center"><button>Login as Patient</button></h2></a>
  </div>   
  <div class="col col-xl-6 col-sm-6" id="register1">
      <a href="hms-staff.php"><h2 align="Center"><button>Login as Staff</button></h2></a>
  </div>
</div>
</div>
<?php include("footer.php"); ?>


