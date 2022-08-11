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

  noAccessForClerk();
  noAccessForDoctor();
  noAccessForNormal();
  noAccessIfNotLoggedIn();

?>
<div class="container">
 	<h2 align=center>Admin page of ABS Hospital</h2>
  
  <?php 
    if(isset($_POST['demail'])){
      $i = register($_POST['demail'],$_POST['dpassword'],$_POST['dfullname'],$_POST['dSpecialist'],"doctors");
    }
    if(isset($_POST['aemail'])){
      $i = register($_POST['aemail'],$_POST['apassword'],$_POST['afullname'],'non',"clerks");
    }
    if(isset($_POST['DrDelEmail'])){
      $i = delete("doctors",$_POST['DrDelEmail']);
    }
    if(isset($_POST['ClDelEmail'])){
      $i = delete("clerks",$_POST['ClDelEmail']);
    }
    
  ?>

<div class="col col-xl-6 col-sm-6 col-md-12 " id="register1">
  <a  href="add_doctor.php"><h4 align="center">ADD DOCTOR</h4></a>
</div>
<div class="col col-xl-6 col-sm-6 col-md-12" id="register1">
  <a  href="rm_doctor.php"><h4 align="center">REMOVE DOCTOR</h4></a>
</div>
<div class="col col-xl-6 col-sm-6 col-md-12" id="register1">
  <a  href="add_clerk.php"><h4 align="center">ADD CLERK</h4></a>
</div>
<div class="col col-xl-6 col-sm-6 col-md-12" id="register1">
  <a  href="rm_clerk.php"><h4 align="center">REMOVE CLERK</h4></a>
</div>
<?php include("footer.php"); ?>


