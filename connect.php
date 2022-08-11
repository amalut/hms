<?php
$l="localhost";
$u="root";
$p="";
$db="hmsdb";
$con=mysqli_connect($l,$u,$p,$db);
if (!$con)
{
    die("Not connected:");
}
?>