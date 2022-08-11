<?php
$l="localhost";
$u="root";
$p="";
$db="hospital";
$con=mysqli_connect($l,$u,$p,$db);
if (!$con)
{
    die("Not connected:");
}
?>