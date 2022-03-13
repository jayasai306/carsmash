<?php
// Mysql settings
$user   = "root";
$password = "";
$database = "my_facemash";
$host   = "localhost";
$con = mysqli_connect($host,$user,$password,$database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>